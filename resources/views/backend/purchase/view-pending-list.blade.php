
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
              <li class="breadcrumb-item active">Purchase</li>
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
                <h3>Pending Purchase List
                  <!-- <a href="{{route('purchase.add')}}" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-plus-circle"></i>Add Purchase</a> -->
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

              <table id="example1" class="table table-bordered table-hover">

               <thead>
                <tr>
                  <th>SL.</th>
                  <th>Purchase No</th>
                  <th>Date</th>
                  <th>Supplier Name</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Buying Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>

                <tbody>
                  @foreach($allData as $key => $purchase)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$purchase->purchase_no }}</td>
                    <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                    <td>{{$purchase['supplier']['name']}}</td>
                    <td>{{$purchase['category']['name']}}</td>
                    <td>{{$purchase['product'] ['name']}}</td>
                    <td>{{$purchase->description}}</td>
                    <td>{{$purchase->buying_qty}} {{$purchase['product'] ['unit']['name']}}</td>
                    <td>{{$purchase->unit_price}}</td>
                    <td>{{$purchase->buying_price}}</td>
                    <td>@if($purchase->status=="0")
                      <span style="background:#FF0303;padding:5px;">Pending</span>
                      @elseif($purchase->status=="1")
                      <span style="background:#2A9247;padding:5px;">Approved</span>
                      @endif
                    </td>
                    <td>
                  
                 
                   @if($purchase->status=='0')
                  <a href="{{route('purchase.approve.product',$purchase->id)}}" id="approveBtn" title="approve" class="btn btn-success "><i 
                 
                  class="fa fa-check-circle"></i></a>
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