
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">slider</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Slider List

                
                  <a href="{{route('sliders.add')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-plus-circle"></i>Add Slider</a>
               
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <table id="example1" class="table table-bordered table-hover">

               <thead>
                <tr>
                  <th>SL.</th>
                  <th>Image</th>
                  <th>Short Title</th>
                  <th>Long Title</th>
                  <th>Action</th>
                 
                </tr>

                <tbody>
                  @foreach($allData as $key => $slider)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{(!empty($slider->image)) ? asset('upload/slider_images/'.$slider->image):
                        asset('upload/no_image.png')}}" width="120px" height="130px" alt=""></td>
                    
                    <td>{{$slider->short_title}}</td>
                    <td>{{$slider->long_title}}</td>

                    <td>
                    <a href="{{route('sliders.edit',$slider->id)}}"title="edit" class="btn btn-primary "><i 
                  
                  class="fa fa-edit"></i></a>

                  <a href="{{route('sliders.delete',$slider->id)}}" id="delete" title="delete" class="btn btn-danger "><i 
                  
                  class="fa fa-trash"></i></a>
                    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
           
          
              </thead>

              </table>
              
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
           
            <!--/.direct-chat -->

            <!-- TO DO List -->
          
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection