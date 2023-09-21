<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Payment;
use App\Models\PaymentDetails;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Customer;
use Auth;
use DB;
use PDF;
class InvoiceController extends Controller
{
    public function view(){
        $data['allData']=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',1)->get();
        return view('backend.invoice.view-invoice',$data);
       }
    
       public function add(){

        $data['categories']=Category::all();
        $invoice_data=Invoice::orderBy('id','desc')->first();

        if($invoice_data==null){
          $firstReg="0";
          $data['invoice_no']=$firstReg+1;
          
        }
        else{
          $invoice_data=Invoice::orderBy('id','desc')->first()->invoice_no;

          $data['invoice_no']=$invoice_data+1;
         
        }
        $data['customers']=Customer::all();
        $data['date']=date('Y-m-d');
        
        return view('backend.invoice.add-invoice',$data);
       }
    
    
       
       public function store(Request $request){

       
        
        if($request->category_id == null){
          return redirect()->back()->with('error',"sorry you do not select any Item");
        }
        else{

         if($request->paid_amount>$request->estimated_amount)
         {
          return redirect()->back()->with('error',"sorry! paid amount is maximus from totoal");

         }
         else{
          $invoice=new Invoice();
          $invoice->invoice_no=$request->invoice_no;
          $invoice->date=date('Y-m-d',strtotime($request->date));
          $invoice->description=$request->description;
          $invoice->status=0;
          $invoice->created_by=Auth::user()->id;
          $invoice->save();
          DB::transaction(function() use($request,$invoice){
            if($invoice != null){
              $count_category=count($request->category_id);
              for($i=0;$i<$count_category;$i++){
                $invoice_details=new InvoiceDetails();
                $invoice_details->date=date('Y-m-d',strtotime($request->date));
                $invoice_details->invoice_id=$invoice->id;
                $invoice_details->category_id=$request->category_id[$i];
                $invoice_details->product_id=$request->product_id[$i];
                $invoice_details->selling_qty=$request->selling_qty[$i];
                $invoice_details->unit_price=$request->unit_price[$i];
                $invoice_details->selling_price=$request->selling_price[$i];
                $invoice_details->status=0;
                $invoice_details->save();
              }
              if($request->customer_id=="0"){
                $customer=new Customer();
                $customer->name=$request->name;
                $customer->mobile_no=$request->mobile_no;
                $customer->address=$request->address;
                $customer->save();
                $customer_id=$customer->id;
              }
              else{
                $customer_id=$request->customer_id;
              }
              $payment=new Payment();
              $payment_details=new PaymentDetails();
              $payment->invoice_id=$invoice->id;
              $payment->customer_id=$customer_id;
              $payment->paid_status=$request->paid_status;
              $payment->discount_amount=$request->discount_amount;
              $payment->total_amount=$request->estimated_amount;
              if($request->paid_status=='full_paid'){

                $payment->paid_amount=$request->estimated_amount;
                $payment->due_amount=0;
                $payment_details->current_paid_amount=$request->estimated_amount;
              }
              elseif($request->paid_status=="full_due"){
                $payment->paid_amount=0;
                $payment->due_amount=$request->estimated_amount;
                $payment_details->current_paid_amount=0;
              }
              elseif($request->paid_status=='partial_paid'){

                $payment->paid_amount=$request->paid_amount;
                $payment->due_amount=$request->estimated_amount-$request->paid_amount;
                $payment_details->current_paid_amount=$request->paid_amount;
               

              }
              $payment->save();
              $payment_details->invoice_id=$invoice->id;
              $payment_details->date=date('Y-m-d',strtotime($request->date));
              $payment_details->save();
              
              
            }
          });
         }
        }
        
     
      return redirect()->route('invoice.pending.list')->with('success','Data Inserted successfully');     
      
    }
    
    public function pendinglist(){

      $data['allData']=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',0)->get();
      return view('backend.invoice.view-pending-list',$data);
     
    }

    

    public function purchaseapprove($id){

      $invoice=Invoice:: with(['invoice_details'])->find($id);
      return view('backend.invoice.invoice-approve',compact('invoice'));
     
    }
    
       public function delete( $id){
        $invoice=Invoice::find($id);
       //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
       //    unlink('public/upload/user_images/'.$user->image);
       //  }
        $invoice->delete();
        InvoiceDetails::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetails::where('invoice_id',$invoice->id)->delete();
        return redirect()->route('invoice.view')->with('success','Data Deleted successfully');  
    
       }

       public function approvestore(Request $request,$id){
        foreach($request->selling_qty as $key=>$val){
          $invoice_details=InvoiceDetails::where('id',$key)->first();
          $product=Product::where('id',$invoice_details->product_id)->first();
          if($product->quantity<$request->selling_qty[$key]){

            return redirect()->back()->with('error','Sorry! You approve maximum value');
          }
        }
        $invoice=Invoice::find($id);
        $invoice->approved_by=Auth::user()->id;
        $invoice->status=1;
        DB::transaction(function() use($request,$invoice,$id)
        {
          foreach($request->selling_qty as $key=>$val)
          {
            $invoice_details=InvoiceDetails::where('id',$key)->first();
            $invoice_details->status=1;
            $invoice_details->save();
            $product=Product::where('id',$invoice_details->product_id)->first();
            $product->quantity=((float)$product->quantity)-((float) $request->selling_qty[$key]);
            $product->save();
          }
          $invoice->save();
        });

        return redirect()->route('invoice.pending.list')->with('success','Invoice successfully Approved');

       }

      //  Print Invoice
      public function printlist(){

        $data['allData']=Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',1)->get();
        return view('backend.invoice.pos-invoice-list',$data);
       
      }

      

function printinvoice($id) {

	$data['invoice']=Invoice:: with(['invoice_details'])->find($id);
	
	$pdf = PDF::loadView('backend.pdf.invoice-pdf', $data);
	return $pdf->stream('webappfix.pdf');
}
public function dailyreport()
{
 return view('backend.invoice.daily-invoice-report');
}

public function dailyreportpdf(Request $request){
 $sdate=date('Y-m-d',strtotime($request->start_date));
 $edate=date('Y-m-d',strtotime($request->end_date));
 $data['start_date']=date('Y-m-d',strtotime($request->start_date));
 $data['end_date']=date('Y-m-d',strtotime($request->end_date));
 $data['allData']=Invoice::whereBetween('date',[$sdate,$edate])->where('status',1)->get();
 $pdf = PDF::loadView('backend.pdf.daily-invoice-report-pdf', $data);
	return $pdf->stream('webappfix.pdf');

}
}
