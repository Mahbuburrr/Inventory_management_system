
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3>Update Product
                  <a href="{{route('products.view')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>Product List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <form action="{{route('products.update',$editData->id)}}" method="POST" id="myForm" enctype="multipart-data/form" >
                @csrf

                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="supplier_id">supplier name</label>
                    <select name="supplier_id" id="supplier_id"  class="form-control">
                    <option value="">Select Role</option>
                    @foreach($supplier as $supplier)
                    <option value="{{$supplier->id}}" {{($editData->supplier->id==$supplier->id)?"selected":''}} >{{$supplier->name}}</option>
                    @endforeach


                    </select>
                    
                    </div>

                    <div class="form-group col-md-6">
                    <label for="units_id">Unit</label>
                    <select name="units_id" id="units_id" class="form-control">
                    <option value="">Select Role</option>
                    @foreach($units as $units)
                    <option value="{{$units->id}}" {{($editData->unit->id==$units->id)?"selected":''}}>{{$units->name}}</option>
                    @endforeach


                    </select>
                    
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="name">Categories</label>
                        <select name="categories_id" id="categories_id" class="form-control">
                    <option value="">Select Categories</option>
                    @foreach($categories as $categories)
                    <option value="{{$categories->id}}" {{($editData->category->id == $categories->id) ?"selected":''}}>{{$categories->name}}</option>
                    @endforeach


                    </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" value="{{$editData->name}}" class="form-control" >

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
         
          name:{
            required:true,
          },
          supplier_id: {
            required: true,
          
          },
          categories_id:{
            required:true,
            
          },
          units_id:{
            required:true,
           
          }
          
        },
        messages: {
         
          
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