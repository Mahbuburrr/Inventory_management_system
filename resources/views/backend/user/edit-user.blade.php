
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3>Edit User
                  <a href="{{route('users.view')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>User List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <form action="{{route('users.update',$editData->id)}}" method="POST" id="myForm" enctype="multipart-data/form" >
                @csrf

                <div class="form-row">
                   <div class="form-group col-md-4">
                    <label for="usertype">User Role</label>
                    <select name="usertype" id="usertype" class="form-control">
                    <option value="">Select Role</option>
                    <option value="" >Select Role</option>
                    <option value="Admin" {{($editData->usertype=='Admin')?"selected":""}}>Admin</option>
                    <option value="User" {{($editData->usertype=='User')?"selected":""}}>User</option>


                    </select>
                    
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$editData->name}}" class="form-control" >
                        <font style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{$editData->email}}" class="form-control" >
                        <font style="color:red;">{{($errors->has('email'))?($errors->first('email')):''}}</font>

                    </div>

                   
                    <div class="form-group col-md-6">
                        <input type="submit" value="Update" class="btn btn-primary">
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
          usertype:{
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
          usertype:{
            required:"please select user role"
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