<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;

class UnitController extends Controller
{
    public function view(){
        $allData=Unit::all();
        return view('backend.unit.view-unit',compact('allData'));
       }
    
       public function add(){
    
        return view('backend.unit.add-unit');
       }
    
    
       
       public function store(Request $request){

        $this->validate($request,[
  
            'name'=>'required',
            // 'email'=>'required|unique:users,email'
        ]);
  
      $data=new Unit();
      $data->created_by=Auth::user()->id;
      $data->name=$request->name;
     
      $data->save();
     
      return redirect()->route('units.view')->with('success','Data Inserted successfully');     
      
    }
    
      public function edit( $id){
       $editData=Unit::find($id);
       return view('backend.unit.edit-unit',compact('editData'));
      }
    
      public function update(Request $request, $id){
       $data= Unit::find($id);
       $data->updated_by=Auth::user()->id;
       $data->name=$request->name;
       
        $data->save();
       
        return redirect()->route('units.view')->with('success','Data updated successfully');  
       }
    
       public function delete( $id){
        $supplier=Unit::find($id);
       //  if(file_exists('public/upload/user_images/'.$user->image) AND ! empty($user->image)){
       //    unlink('public/upload/user_images/'.$user->image);
       //  }
        $supplier->delete();
        return redirect()->route('units.view')->with('success','Data Deleted successfully');  
    
       }
}
