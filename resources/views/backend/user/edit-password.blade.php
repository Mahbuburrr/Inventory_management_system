
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Password</li>
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
                <h3>Password
                  
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <form action="{{route('profiles.password.update')}}" method="POST" id="myForm" enctype="multipart-data/form" >
                @csrf

                <div class="form-row">
                  
                    <div class="form-group col-md-4">
                        <label for="password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="password">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="password">Again new Password</label>
                        <input type="password" name="again_new_password" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
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
         
          current_password:{
            required:true,
           
          },

          new_password:{
            required:true,
            minlength:6
          },
         again_new_password:{
            required:true,
            equalTo:'#new_password'
          }
          
        },
        messages: {
        
            current_password: {
            required: "Please input current password",
            minlength: "Your password must be at least 6 characters long characters or numbers"
          },

          new_password: {
            required: "Please enter a new password",
            minlength: "Your password must be at least 6 characters long characters or numbers"
          },
          again_new_password:{
            required: 'please enter again your new password',
            equalTo: 'again new  password does not match',
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