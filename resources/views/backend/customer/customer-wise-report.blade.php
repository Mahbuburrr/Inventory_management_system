
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customer Wise</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                  <!-- <a href="{{route('stock.report.pdf')}}" target="_blank" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-download"></i>Stock Download</a> -->
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <strong>Customer Wise Credit Report</strong>
                        <input type="radio" name="customer-wise-report" value="customer_wise_credit" class="search_value"> &nbsp;&nbsp;
                        <strong>Customer Wise Paid Report</strong>
                        <input type="radio" name="customer-wise-report" value="customer_wise_paid" class="search_value">
                        </div>
                      </div>
                    <div class="show_credit" style="display:none">
                      <form action="{{route('customers.wise.credit.report')}}" target="_blank" method="GET" id="customerCreditForm">
                        <div class="form-row">
                            <div class="col-md-8">
                                <label for="">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-control select2">
                                    <option value="">Select Customer</option>
                                    @foreach($customer as $customer)
                                     <option value="{{$customer->id}}">{{$customer->name}}({{$customer->mobile_no}}-{{$customer->address}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top:29px;">
                              <button type="submit" class="btn btn-primary btn-sm">Search </button>
                            

                            </div>
                        </div>
                      </form>
                    </div>

                    <div class="show_paid" style="display:none">
                      <form action="{{route('customers.wise.paid.report')}}" target="_blank" method="GET" id="customerPaidForm">
                          <div class="form-row">
                                <div class="col-md-8">
                                    <label for="">Customer Name</label>
                                    <select name="customer_id" id="customer_id" class="form-control select2">
                                    <option value="">Select Customer</option>
                                    @foreach($paid as $paid)
                                     <option value="{{$paid->id}}">{{$paid->name}}({{$paid->mobile_no}}-{{$paid->address}})</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="col-sm-4" style="padding-top:29px;">
                                <button type="submit" class="btn btn-primary btn-sm">Search </button>
                                

                                </div>
                            </div>
                      </form>
                    </div>
              
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
  

<!-- Criteria selection show hide script -->
  <script>
    $(document).on('change','.search_value',function(){

      $search_value=$(this).val();
      if($search_value=='customer_wise_credit'){
        $('.show_credit').show();
      }else{
        $('.show_credit').hide();
      }if($search_value=='customer_wise_paid'){
        $('.show_paid').show();
      }else{
        $('.show_paid').hide();
      }

    });
  </script>

  <!-- Jquery Validation================ -->
  <script>
    $(function () {
     
      $('#customerCreditForm').validate({

        ignor:[],
        errorPlacement:function(error,element){
          if(element.attr("name")=="customer_id"){
            error.insertAfter(element.next());
          }else{
            error.inserAfter(element);
          }
         
         },
         errorClass:'text-danger',
          validClass:'text-success',
        rules: {
          customer_id:{
            required:true,
          },

        
         
          
        },
        messages: {
         
          
        },
        
      });
    });
</script>

<script>
    $(function () {
     
      $('#customerPaidForm').validate({

        ignor:[],
        errorPlacement:function(error,element){
          if(element.attr("name")=="customer_id"){
            error.insertAfter(element.next());
          }else{
            error.inserAfter(element);
          }
         
         },
         errorClass:'text-danger',
          validClass:'text-success',
        rules: {
          customer_id:{
            required:true,
          },

        
         
          
        },
        messages: {
         
          
        },
        
      });
    });
</script>

  @endsection