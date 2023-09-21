<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;

class SupplierController extends Controller
{
   public function view(){
    $allData=Supplier::all();
    return view('backend.supplier.view-supplier',compact('allData'));
   }

   public function add(){

    return view('backend.supplier.add-supplier');
   }


   
   public function store(Request $request){

      $this->validate($request,[

          'name'=>'required',
          'email'=>'required|unique:users,email'
      ]);

    $data=new Supplier();
    $data->created_by=Auth::user()->id;
    $data->name=$request->name;
    $data->mobile_no=$request->mobile;
    $data->email=$request->email;
    $data->address=$request->address;
    $data->save();
   
    return redirect()->route('suppliers.view')->with('success','Data Inserted successfully');     
    
  }

  public function edit( $id){
   $editData=Supplier::find($id);
   return view('backend.supplier.edit-supplier',compact('editData'));
  }

  public function update(Request $request, $id){
   $data= Supplier::find($id);
   $data->updated_by=Auth::user()->id;
   $data->name=$request->name;
   $data->mobile_no=$request->mobile;
   $data->email=$request->email;
   $data->address=$request->address;
    $data->save();
   
    return redirect()->route('suppliers.view')->with('success','Data updated successfully');  
   }

   public function delete( $id){
    $supplier=Supplier::find($id);
   //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
   //    unlink('public/upload/user_images/'.$user->image);
   //  }
    $supplier->delete();
    return redirect()->route('suppliers.view')->with('success','Data Deleted successfully');  

   }

}
