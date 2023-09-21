<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Auth;

class ProductController extends Controller
{
    public function view(){
        $data['allData']=Product::all();
        return view('backend.product.view-product',$data);
       }
    
       public function add(){

        $data['supplier']=Supplier::all();
        $data['categories']=Category::all();
        $data['units']=Unit::all();
        
        return view('backend.product.add-product',$data);
       }
    
    
       
       public function store(Request $request){

        $this->validate($request,[
  
            // 'name'=>'required',
            // 'email'=>'required|unique:users,email'
        ]);
  
      $data=new Product();
      $data->created_by=Auth::user()->id;
      $data->name=$request->name;
      $data->supplier_id=$request->supplier_id;
      $data->unit_id=$request->units_id;
      $data->quantity="0";
      $data->category_id=$request->categories_id;
     
      $data->save();
     
      return redirect()->route('products.view')->with('success','Data Inserted successfully');     
      
    }
    
      public function edit( $id){
        $data['editData']=Product::find($id);
        $data['supplier']=Supplier::all();
        $data['categories']=Category::all();
        $data['units']=Unit::all();
       return view('backend.product.edit-product',$data);
      }
    
      public function update(Request $request, $id){
       $data= Product::find($id);
       $data->updated_by=Auth::user()->id;
       $data->name=$request->name;
      $data->supplier_id=$request->supplier_id;
      $data->unit_id=$request->units_id;
      $data->category_id=$request->categories_id;
     
      $data->save();
       
        return redirect()->route('products.view')->with('success','Data updated successfully');  
       }
    
       public function delete( $id){
        $supplier=Product::find($id);
       //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
       //    unlink('public/upload/user_images/'.$user->image);
       //  }
        $supplier->delete();
        return redirect()->route('products.view')->with('success','Data Deleted successfully');  
    
       }
}
