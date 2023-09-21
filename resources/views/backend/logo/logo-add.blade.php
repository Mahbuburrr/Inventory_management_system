
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Logo</li>
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
                <h3>Add Logo
                  <a href="{{route('logos.view')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>ALL Logo</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <form action="{{route('logos.store')}}" method="POST" id="myForm" enctype="multipart/form-data" >
                @csrf

                <div class="form-row">
                  
                    
                    <div class="form-group col-md-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" >

                    </div>


                    <div class="form-group col-md-2">
                        <img id="showImage" src="{{
                        asset('upload/no_image.png')}}" style="width:150px;height:160px;
                        border:1px solid #000" alt="">

                    </div>
                    

                   
                    <div class="form-group col-md-6" style="padding-top:30px">
                        <input type="submit" value="submit" class="btn btn-primary">
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
          gender:{
            required:true,
          },

          name:{
            required:true,
          },
          email: {
            required: true,
            email: true,
          },
          password:{
            required:true,
            minlength:6
          },
          password2:{
            required:true,
            equalTo:'#password'
          }
          
        },
        messages: {
          gender:{
            required:"please select user gender"
          },
          name:{
            required:"please enter user name"
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a valid <em> email </em> address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long characters or numbers"
          },
          password2:{
            required: 'please enter confirm password',
            equalTo: 'confirm password does not match',
          }
          
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