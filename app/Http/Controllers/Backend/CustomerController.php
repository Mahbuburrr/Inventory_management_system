<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use PDF;
use App\Models\Payment;
use App\Models\PaymentDetails;

class CustomerController extends Controller
{
    public function view(){
        $allData=Customer::all();
        return view('backend.customer.view-customer',compact('allData'));
       }
    
       public function add(){
    
        return view('backend.customer.add-customer');
       }
    
    
       
       public function store(Request $request){

        $this->validate($request,[
  
            'name'=>'required',
            'email'=>'required|unique:users,email'
        ]);
  
      $data=new Customer();
      $data->created_by=Auth::user()->id;
      $data->name=$request->name;
      $data->mobile_no=$request->mobile;
      $data->email=$request->email;
      $data->address=$request->address;
      $data->save();
     
      return redirect()->route('customers.view')->with('success','Data Inserted successfully');     
      
    }
    
      public function edit( $id){
       $editData=Customer::find($id);
       return view('backend.customer.edit-customer',compact('editData'));
      }
    
      public function update(Request $request, $id){
       $data= Customer::find($id);
       $data->updated_by=Auth::user()->id;
       $data->name=$request->name;
       $data->mobile_no=$request->mobile;
       $data->email=$request->email;
       $data->address=$request->address;
        $data->save();
       
        return redirect()->route('customers.view')->with('success','Data updated successfully');  
       }
    
       public function delete( $id){
        $supplier=Customer::find($id);
       //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
       //    unlink('public/upload/user_images/'.$user->image);
       //  }
        $supplier->delete();
        return redirect()->route('customers.view')->with('success','Data Deleted successfully');  
    
       }

       public function creditCustomer(){
        $allData=Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view("backend.customer.customer-credit",compact('allData'));
       }

       public function creditCustomerPdf(){
        $data['allData']=Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
         
        $pdf = PDF::loadView('backend.pdf.customer-credit-pdf', $data);
	      return $pdf->stream('webappfix.pdf');
       }

       public function editInvoice($invoice_id){
        $payment=Payment::where('invoice_id',$invoice_id)->first();
        return view('Backend.customer.view-edit-invoice',compact('payment'));
       }

       public function updateInvoice(Request $request,$invoice_id){

        if($request->new_paid_amount<$request->paid_amount){
          return redirect()->back()->with('error','sorry you have paid maximum value');
        }
        else{
          $payment=Payment::where('invoice_id',$invoice_id)->first();
          $payment_details=new PaymentDetails();
          $payment->paid_status=$request->paid_status;
          if($request->paid_status=='full_paid'){
            $payment->paid_amount=Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+
            $request->new_paid_amount;
            $payment->due_amount=0;
            $payment_details->current_paid_amount=$request->new_paid_amount;
          }elseif($request->paid_status=='partial_paid'){
            $payment->paid_amount=Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+
            $request->paid_amount;
            $payment->due_amount=Payment::where('invoice_id',$invoice_id)->first()['due_amount']-
            $request->paid_amount;
            $payment_details->current_paid_amount=$request->paid_amount;

        }
        $payment->save();
        $payment_details->invoice_id=$invoice_id;
        $payment_details->date=date('Y-m-d',strtotime($request->date));
        $payment_details->updated_by=Auth::user()->id;
        $payment_details->save();
        return redirect()->route('customers.credit')->with('success','Invoice updated successfully');  

       }
}

public function invoiceDetailsPdf($invoice_id){

  $data['payment']=Payment::where('invoice_id',$invoice_id)->first();
  $pdf = PDF::loadView('backend.pdf.invoice-details-pdf', $data);
  return $pdf->stream('webappfix.pdf');
  
}
public function paidCustomer(){
  $allData=Payment::where('paid_status','!=','full_due')->get();
  return view("backend.customer.customer-paid",compact('allData'));
 }

 public function paidCustomerPdf(){
  $data['allData']=Payment::where('paid_status','!=','full_due')->get();
   
  $pdf = PDF::loadView('backend.pdf.customer-paid-pdf', $data);
  return $pdf->stream('webappfix.pdf');
 }

 public function customerWiseReport()
 {
  $customer=Customer::all();
  $paid=Customer::all();
  return view('backend.customer.customer-wise-report',compact('customer','paid'));
 }
 public function customerWiseCreditReport(Request $request){

        $data['allData']=Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
         
        $pdf = PDF::loadView('backend.pdf.customer-wise-credit-pdf', $data);
	      return $pdf->stream('webappfix.pdf');
 }
 public function customerWisePaidReport(Request $request){

  $data['allData']=Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
   
  $pdf = PDF::loadView('backend.pdf.customer-wise-paid-pdf', $data);
  return $pdf->stream('webappfix.pdf');
 }
}
