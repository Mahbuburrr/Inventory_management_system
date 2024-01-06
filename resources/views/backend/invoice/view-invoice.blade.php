
@extends('backend.layouts.master')
@section('content')
<style>
 
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                <h3>Invoice List
                  <a href="{{route('invoice.add')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-plus-circle"></i>Add Invoice</a>
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                
              
              <table bordered="1" id="example1" class="table table-bordered table-hover">
                
              
               <thead>
                <tr>
                <div class="btn-group" role="group"  aria-label="Basic example" style="float:right; z-index:15000" >
                  <a href="{{route('invoice.view')}}" class="btn btn-secondary">All</a>
                  <a href="{{route('invoice.view',['status' => 'full_paid'])}}" class="btn btn-secondary"> paid</a>
                  <a href="{{route('invoice.view',['status' => 'partial_paid'])}}" class="btn btn-secondary"> partial paid</a>
                  <a href="{{route('invoice.view',['status' => 'full_due'])}}" class="btn btn-secondary"> Due</a>
                </div>
                </tr>
                  <tr width='200px'>
                  
                    <th>SL.</th>
                    <th>Invoice No</th>

                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                  </tr>
               </thead>

                <tbody>
                  @foreach($allData as $key => $payment)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>Invoice No #{{$payment->invoice->invoice_no}} </td>
                      <td> c name #{{$payment->customer->name}}
                        ({{$payment->customer->mobile_no}} - {{$payment->customer->address}})
                      </td>
                      <td>{{date('d-m-Y',strtotime($payment->invoice->date))}}</td>
                      
                      <td>{{$payment->invoice->description}}</td>
                      
                      <td>
                    
                      {{$payment->total_amount }}
                      </td>
                    </tr>
                  @endforeach
                    
                     
                  
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



  <script>
    
  </script>

  @endsection