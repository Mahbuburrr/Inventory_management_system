
@extends('backend.layouts.master')
@section('content')
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
                <h3>Pending Invoice List
                  <!-- <a href="{{route('invoice.add')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-plus-circle"></i>Add Invoice</a> -->
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <table id="example1" class="table table-bordered table-hover">

               <thead>
                <tr>
                  <th>SL.</th>
                  <th>Invoice No</th>

                  <th>Customer Name</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th width="13%">Action</th>
                </tr>

                <tbody>
                  @foreach($allData as $key => $invoice)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>Invoice No #{{$invoice->invoice_no}} </td>
                    <td> {{$invoice['payment']['customer']['name']}}</td>
                    <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                    
                    <td>{{$invoice->description}}</td>
                    <td>{{$invoice['payment']['total_amount']}}</td>
                    
                   
                     
                   <!-- @if($invoice->status=='0')
                  <a href="{{route('invoice.delete',$invoice->id)}}" id="delete" title="delete" class="btn btn-danger "><i 
                 
                  class="fa fa-trash"></i></a>
                  @endif -->
                  <td>@if($invoice->status=="0")
                      <span style="background:#FF0303;padding:5px;">Pending</span>
                      @elseif($invoice->status=="1")
                      <span style="background:#2A9247;padding:5px;">Approved</span>
                      @endif
                    </td>
                    <td>
                    @if($invoice->status=='0')
                  <a href="{{route('invoice.approve',$invoice->id)}}" id="approveBtn" title="approve" class="btn btn-success "><i 
                 
                  class="fa fa-check-circle"></i></a>
                  @endif
                 
                   @if($invoice->status=='0')
                  <a href="{{route('invoice.delete',$invoice->id)}}" id="delete" title="delete" class="btn btn-danger "><i 
                 
                  class="fa fa-trash"></i></a>
                  @endif
                 
                    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
           
          
              </thead>

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