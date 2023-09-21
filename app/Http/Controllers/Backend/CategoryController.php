<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
        $allData=Category::all();
        return view('backend.category.view-category',compact('allData'));
       }
    
       public function add(){
    
        return view('backend.category.add-category');
       }
    
    
       
       public function store(Request $request){

        $this->validate($request,[
  
            'name'=>'required',
            // 'email'=>'required|unique:users,email'
        ]);
  
      $data=new Category();
      $data->created_by=Auth::user()->id;
      $data->name=$request->name;
     
      $data->save();
     
      return redirect()->route('categories.view')->with('success','Data Inserted successfully');     
      
    }
    
      public function edit( $id){
       $editData=Category::find($id);
       return view('backend.category.edit-category',compact('editData'));
      }
    
      public function update(Request $request, $id){
       $data= Category::find($id);
       $data->updated_by=Auth::user()->id;
       $data->name=$request->name;
       
        $data->save();
       
        return redirect()->route('categories.view')->with('success','Data updated successfully');  
       }
    
       public function delete( $id){
        $supplier=Category::find($id);
       //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
       //    unlink('public/upload/user_images/'.$user->image);
       //  }
        $supplier->delete();
        return redirect()->route('categories.view')->with('success','Data Deleted successfully');  
    
       }

      
}

