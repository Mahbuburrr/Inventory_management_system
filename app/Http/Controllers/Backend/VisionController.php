<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vision;
use Auth;

class VisionController extends Controller
{
    public function view(){
        $data['countMission']=Vision::count();
          $data['allData']=Vision::all();
          return view('backend.vision.view-vision',$data);
       }
   
       public function add(){
          return view('backend.vision.add-vision');
        }
   
       
        public function store(Request $request){
   
          
   
         $data=new Vision();
         $data->title=$request->title;
         $data->created_by=Auth::user()->id;
          if($request->file('image')){
          $file=$request->file('image');
          $filename=date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/vision_images'),$filename);
          $data['image']=$filename;
          }
          $data->save();
        
         return redirect()->route('visions.view')->with('success','Data added successfully'); 
         
       }
   
       public function edit( $id){
        $editData=Vision::find($id);
        return view('backend.vision.edit-vision',compact('editData'));
       }
   
       public function update(Request $request, $id){
          
          $data=Vision::find($id);
          $data->title=$request->title;
          $data->updated_by=Auth::user()->id;
          if($request->file('image')){
          $file=$request->file('image');
          @unlink(public_path('upload/vision_images'.$data->image));
          $filename=date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/vision_images'),$filename);
          $data['image']=$filename;
          }
          $data->save();
        
         return redirect()->route('visions.view')->with('success','Vision updated successfully');  
        }
   
        public function delete( $id){
         $vision=Vision::find($id);
         if(file_exists('upload/vision_images/'.$vision->image) AND ! empty($vision->image)){
          unlink('upload/vision_images/'.$vision->image);
        }
         $vision->delete();
         return redirect()->route('visions.view')->with('success','Data Deleted successfully');  
   
        }
}
