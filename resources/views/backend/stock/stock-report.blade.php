
@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock</li>
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
                <h3>Stock List
                  <a href="{{route('stock.report.pdf')}}" target="_blank" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-download"></i>Stock Download</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

          <table id="example1" class="table table-bordered table-hover">

            <thead>
              <tr>
                <th>SL.</th>
                <th>Supplier Name</th>
                <th>Category</th>
                <th>Name</th>
                <th>In.Qty</th>
                <th>Out.Qty</th>
                <th>Stock</th>
                <th>Unit</th>
                
              </tr>

              <tbody>
                @foreach($allData as $key => $product)
                @php 
                $buy_total=App\Models\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)
                ->where('status',1)->sum('buying_qty');
                $selling_qty=App\Models\InvoiceDetails::where('category_id',$product->category_id)->where('product_id',$product->id)
                ->where('status',1)->sum('selling_qty');
                @endphp
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$product['supplier'] ['name'] }}</td>
                  <td>{{$product['category'] ['name']}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$buy_total}}</td>
                  <td>{{$selling_qty}}</td>
                  <td>{{$product->quantity}}</td>

                  <td>{{$product['unit'] ['name']}}</td>
                
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

  @endsection