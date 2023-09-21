<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;
use Auth;

class MissionController extends Controller
{
    public function view(){
      $data['countMission']=Mission::count();
        $data['allData']=Mission::all();
        return view('backend.mission.view-mission',$data);
     }
 
     public function add(){
        return view('backend.mission.add-mission');
      }
 
     
      public function store(Request $request){
 
        
 
       $data=new Mission();
       $data->title=$request->title;
       $data->created_by=Auth::user()->id;
        if($request->file('image')){
        $file=$request->file('image');
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/mission_images'),$filename);
        $data['image']=$filename;
        }
        $data->save();
      
       return redirect()->route('missions.view')->with('success','Data added successfully'); 
       
     }
 
     public function edit( $id){
      $editData=Mission::find($id);
      return view('backend.mission.edit-mission',compact('editData'));
     }
 
     public function update(Request $request, $id){
        
        $data=Mission::find($id);
        $data->title=$request->title;
        $data->updated_by=Auth::user()->id;
        if($request->file('image')){
        $file=$request->file('image');
        @unlink(public_path('upload/mission_images'.$data->image));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/mission_images'),$filename);
        $data['image']=$filename;
        }
        $data->save();
      
       return redirect()->route('missions.view')->with('success','Mission updated successfully');  
      }
 
      public function delete( $id){
       $mission=Mission::find($id);
       if(file_exists('upload/mission_images/'.$mission->image) AND ! empty($mission->image)){
        unlink('upload/mission_images/'.$mission->image);
      }
       $mission->delete();
       return redirect()->route('missions.view')->with('success','Data Deleted successfully');  
 
      }
   
}
