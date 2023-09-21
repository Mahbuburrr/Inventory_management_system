<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Auth;
use DB;
use PDF;

class PurchaseController extends Controller
{
    public function view(){
        $data['allData']=Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.view-purchase',$data);
       }
    
       public function add(){

        $data['supplier']=Supplier::all();
        $data['categories']=Category::all();
        $data['units']=Unit::all();
        
        return view('backend.purchase.add-purchase',$data);
       }
    
    
       
       public function store(Request $request){
        
        if($request->category_id == null){
          return redirect()->back()->with('error',"sorry you do not select any Item");
        }
        else{

          $count_category=count($request->category_id);
          for($i=0; $i<$count_category; $i++){
            $purchase=new Purchase();
            $purchase->date=date('Y-m-d',strtotime($request->date[$i]));
            $purchase->purchase_no=$request->purchase_no[$i];
            $purchase->supplier_id=$request->supplier_id[$i];
            $purchase->category_id=$request->category_id[$i];
            $purchase->product_id=$request->product_id[$i];
            $purchase->buying_qty=$request->buying_qty[$i];
            $purchase->unit_price=$request->unit_price[$i];
            $purchase->buying_price=$request->buying_price[$i];
            $purchase->description=$request->description[$i];
            $purchase->created_by=Auth::user()->id;
            $purchase->status='0';
            $purchase->save();
            
          }
        }
        
     
      return redirect()->route('purchase.view')->with('success','Data Inserted successfully');     
      
    }
    
    public function pendinglist(){

      $data['allData']=Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
      return view('backend.purchase.view-pending-list',$data);
    }

    

    public function purchaseapprove($id){
      $purchase=Purchase::find($id);
      $product=Product::where('id',$purchase->product_id)->first();
      $purchase_qty=((float)($purchase->buying_qty)+(float) ($product->quantity));
      $product->quantity=$purchase_qty;

      if($product->save()){
        DB::table('purchases')
        ->where('id',$id)
        ->update(['status'=>1]);
      }
      return redirect()->route('purchase.pending.list')->with('success',"Data approved successfully");
    }
    
       public function delete( $id){
        $purchase=Purchase::find($id);
       //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
       //    unlink('public/upload/user_images/'.$user->image);
       //  }
        $purchase->delete();
        return redirect()->route('purchase.view')->with('success','Data Deleted successfully');  
    
       }

       public function purchaseReport(Request $request){

       return view('backend.purchase.daily-purchase-report');
       }

       public function purchaseReportPdf(Request $request){

        $sdate=date('Y-m-d',strtotime($request->start_date));
 $edate=date('Y-m-d',strtotime($request->end_date));
 $data['start_date']=date('Y-m-d',strtotime($request->start_date));
 $data['end_date']=date('Y-m-d',strtotime($request->end_date));
 $data['allData']=Purchase::whereBetween('date',[$sdate,$edate])->where('status',1)->get();
 $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
	return $pdf->stream('webappfix.pdf'); 
       }
}
