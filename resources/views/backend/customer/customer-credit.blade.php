
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Credit Customers </h1>
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
                <h3>Credit Customer List
                  <a href="{{route('customers.credit.pdf')}}" target="_blank" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-download"></i>Download</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <table id="example1" class="table table-bordered table-hover">

               <thead>
                <tr>
                  <th>SL.</th>
                  <th>Customer Name</th>
                  <th>Invoice No </th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>

                <tbody>
                    @php 
                     $total_due=0;
                    @endphp
                  @foreach($allData as $key => $payment)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{$payment['customer']['name']}}
                        {{$payment['customer']['mobile_no']}}-{{$payment['customer']['address']}}
                    </td>
                    <td>Invoice No # {{$payment['invoice'] ['invoice_no']}}</td>
                    <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                    <td>{{$payment->due_amount}} TK</td>
                    <td>
                  <a href="{{route('customers.edit.invoice',$payment->invoice_id)}}"title="edit" class="btn btn-primary "><i 
                  
                  class="fa fa-edit"></i></a>

                  <a href="{{route('invoice.details.pdf',$payment->invoice_id)}}" target="_blank" id="details" title="delete" class="btn btn-success "><i 
                  
                  class="fa fa-eye"></i></a>
                    </td>
                    @php 
                      $total_due +=$payment->due_amount;
                    @endphp
                  </tr>
                  @endforeach
                </tbody>
   
              </thead>

              </table>

              <table  class="table table-bordered table-hover">

              

                <tbody>
                  <tr >
                    <td style="text-align:right;" colspan="4"> <strong>Grand Total</strong></td>
                    <td>{{$total_due}} TK</td>
                  </tr>
                </tbody>
   
            

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