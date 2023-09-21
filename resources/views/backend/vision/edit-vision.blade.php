
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Vision</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vision</li>
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
                <h3>Edit Vision
                  <a href="{{route('visions.view')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>ALL Vision</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <form action="{{route('visions.update',$editData->id)}}" method="POST" id="myForm" enctype="multipart/form-data" >
                @csrf

                <div class="form-row">
                  
                    
                    <div class="form-group col-md-12">
                        <label for="short_title">title</label>
                        <textarea name="title" id="title" class="form-control"  rows="4">{{$editData->title}}</textarea>

                    </div>

                    


                    <div class="form-group col-md-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" >

                    </div>


                    <div class="form-group col-md-2">
                        <img id="showImage" src="{{(!empty($editData->image)) ? asset('upload/vision_images/'.$editData->image):
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
  <script>
    $(function () {
     
      $('#myForm').validate({
        rules: {
          short_title:{
            required:true,
          },

          long_title:{
            required:true,
          },

          image:{
            required:true,
          },
        
          
        },
        messages: {
            short_title:{
            required:"please write short title"
          },
          long_title:{
            required:"please write long title"
          },
          image: {
            required: "Please Insert a Image",
            
          },
          
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>

  @endsection