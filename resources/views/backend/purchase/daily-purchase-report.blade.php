
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Report</li>
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
                <h3>Select Criteria
                  <!-- <a href="{{route('purchase.view')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>Invoice List</a> -->
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <!-- <form action="{{route('products.store')}}" method="POST" id="myForm" enctype="multipart-data/form" >
                @csrf -->

               

                <form action="{{route('purchase.report.pdf')}}" method="GET" id="myForm" target="_blank">
                <div class="form-row">
                
                
                <div class="form-group col-md-4">
                 <label for="date">Start Date</label>
                 <input type="text"  name="start_date" id="start_date" class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD" readonly >
                
                 
                 </div>
                 <div class="form-group col-md-4">
                 <label for="date">End Date</label>
                 <input type="text"  name="end_date" id="end_date" class="form-control datepicker1 form-control-sm" placeholder="YYYY-MM-DD" readonly >
                
                 
                 </div>

                 
                 <div class="form-group col-md-1">
                   <button style="margin-top:30px;" class="btn btn-primary btn-sm">
                     search
                   </button>
                 </div>
              
             </div>
                </form>

               <!-- </form> -->

             
              
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
 
<!-- Add purchase Script -->
 
  <!-- Jquery Validation=================== -->
  <script>
    $(function () {
     
      $('#myForm').validate({
        rules: {
         
          start_date:{
            required:true,
          },
          end_date: {
            required: true,
          
          },
         
          
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





<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

  @endsection 