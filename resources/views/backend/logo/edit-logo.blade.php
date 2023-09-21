
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
                <h3>Edit Logo
                  <a href="{{route('logos.view')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>Logo List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <form action="{{route('logos.update',$editData->id)}}" method="POST" id="myForm" enctype="multipart/form-data" >
                @csrf

                <div class="form-row">
                  
                    
                    <div class="form-group col-md-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" >

                    </div>


                    <div class="form-group col-md-2">
                        <img id="showImage" src="{{(!empty($editData->image)) ? asset('upload/logo_images/'.$editData->image):
                        asset('upload/no_image.png')}}" style="width:150px;height:160px;
                        border:1px solid #000" alt="">

                    </div>
                    

                   
                    <div class="form-group col-md-6" style="padding-top:30px">
                        <input type="submit" value="update" class="btn btn-primary">
                    </div>
                </div>

               </form>

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

  <!-- Jquery Validation=================== -->
 

  @endsection