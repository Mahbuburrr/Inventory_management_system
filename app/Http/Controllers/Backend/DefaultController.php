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

class DefaultController extends Controller
{
    public function getcategory(Request $request){
       
      
        $supplier_id=$request->supplier_id;
        $allCategory=Product::with('category')->select('category_id')->where('supplier_id',$supplier_id)->
        groupBy('category_id')->get();
        return response()->json($allCategory);
    }
    public function getproduct(Request $request){

         $category_id=$request->category_id;
         $allProduct=Product::where('category_id',$category_id)->get();
         return response()->json($allProduct);
    }

    public function getstock(Request $request){

        $product_id=$request->product_id;
        $stock=Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }
}
