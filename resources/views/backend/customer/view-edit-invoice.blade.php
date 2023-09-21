
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Credit Customer</h1>
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
                <h3> Edit Invoice
                  <a href="{{route('customers.credit')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-list"></i>Credit Customers List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <table width="100%">
                    <tbody>
                     <tr><td colspan="3"><strong>Customers Info:</strong></td></tr>
                      <tr>
                          <td width="20%"><p><strong>Name:</strong>{{$payment['customer']['name']}}</p></td>
                          <td width="25%"><p><strong>Mobile No:</strong>{{$payment['customer']['mobile_no']}}</p></td>
                          <td width="55%" style="margin-top:55px;"><p><strong>Address:</strong>{{$payment['customer']['address']}}</p></td>
                      </tr>
                   
                     </tbody>
                
              </table>
<form action="{{route('customers.update.invoice',$payment->invoice_id)}}" method="POST" id="myForm">
  @csrf

               
  <table border="1" width="100%" style="margin-bottom:10px;">

    <thead class="text-center">
        <th>SL</th>
        <th>Category</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
    </thead>

    <tbody>
          @php 
          $total_sum=0;
          $invoice_details=App\Models\InvoiceDetails::where('invoice_id',$payment->invoice_id)->get();
          @endphp
          @foreach($invoice_details as $key => $details)
          <tr class="text-center">
          
              <td>{{$key+1}}</td>
              <td>{{$details['category']['name']}}</td>
              <td>{{$details['product']['name']}}</td>
              <td>{{$details->selling_qty}}</td>
              <td>{{$details->unit_price}}</td>
              <td>{{$details->selling_price}}</td>
          </tr>
          @php 
          $total_sum +=$details->selling_price;
          @endphp
          @endforeach

          <tr>
          <td colspan="5" class="text-right"><strong>Subtotal:</strong></td>
          <td  class="text-center"><strong>{{$total_sum}}</strong></td>
          </tr>
          <tr>
          <td colspan="5" class="text-right"><strong>Discount:</strong></td>
          <td  class="text-center"><strong>{{$payment->discount_amount}}</strong></td>
          </tr>
          <tr>
          <td colspan="5" class="text-right"><strong>Paid Amount:</strong></td>
          <td  class="text-center"><strong>{{$payment->paid_amount}}</strong></td>
          </tr>
          <tr>
          <td colspan="5" class="text-right"><strong>Due Amount:</strong></td>
          <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
          <td  class="text-center"><strong>{{$payment->due_amount}}</strong></td>
          </tr>
          <tr>
          <td colspan="5" class="text-right"><strong>Grand Total:</strong></td>
          <td  class="text-center"><strong>{{$payment->total_amount}}</strong></td>
          </tr>
    </tbody>

  </table>


  <div class="row">
    <div class="form-group col-md-3">
      <label >Paid Status</label>
      <select name="paid_status" id="paid_status" class="form-control form-control-sm paid_status">
        <option value="">Select Status</option>
        <option value="full_paid">Full Paid</option>
        <option value="partial_paid">Partial Paid</option>
      </select>
      <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount"
      placeholder="Enter paid amount" style="display:none;">
    </div> 
    <div class="form-group col-md-2">
      <label for="date">Date</label>
      <input type="text"  name="date" id="date" class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD" readonly >

    </div>
    <div class="form-group col-md-3" style="padding-top:31px;">
    <button type="submit" class="btn btn-primary btn-sm">Invoice Update</button>
    </div>

  </div>

</form>
                   
              
              
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
  <script>
     $(document).on("change","#paid_status",function(){
    
    
    var paid_status=$(this).val();
    if(paid_status== 'partial_paid'){
      $('.paid_amount').show();
    }
    else{
      $('.paid_amount').hide();
    }
    

  });
  </script>

   <!-- Jquery Validation=================== -->
   <script>
    $(function () {
     
      $('#myForm').validate({
        rules: {
         
          paid_status:{
            required:true,
          },
          date: {
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
  <!-- Date Picker -->

  <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

  

  @endsection