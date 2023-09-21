<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Auth;
use PDF;

class StockController extends Controller
{
    public function stockreport(){
        $data['allData']=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock-report',$data);
       }
    
       
    
    
       
      public function stockreportpdf(){
        $data['allData']=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('backend.stock.stock-report-pdf', $data);
	      return $pdf->stream('webappfix.pdf');
      }
      public function supplierProductWise(){

        $data['supplier']=Supplier::all();
        $data['categories']=Category::all();
        return view('backend.stock.supplier-product-wise-report',$data);
      }

      public function supplierProductWisePdf(Request $request){

        $data['allData']=Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('backend.stock.supplier-wise-stock-report-pdf', $data);
	      return $pdf->stream('webappfix.pdf');
      }
      public function productWise(Request $request){

        $data['product']=Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        $pdf = PDF::loadView('backend.pdf.product-wise-stock-report-pdf', $data);
	      return $pdf->stream('webappfix.pdf');
      }
}
