
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
                <div id="action" style="display:none" >
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i title="paid-chek" class="fa-regular fa-square-check"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="#"><i title="check-unpaid" class="fa-solid fa-square-xmark"></i></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-gear"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li class="nav-item">
        <a  href="{route('invoice.deleteall')}"  id="DeleteAllSelectedRecord">delete</a>
        </li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
           
            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="" title="download" tabindex="-1" ><i class="fa-solid fa-cloud-arrow-down"></i></a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
                </div>
  
                
              </div><!-- /.card-header -->
              <div class="card-body">
                
              
              <table bordered="1"  class="table table-bordered table-hover">
                
              
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
                    <th><input type="checkbox" id="select_all_ids"></th>
                    <!-- <th>> SL.</th> -->
                    <th>Invoice No</th>

                    <!-- <th>Customer Name</th> -->
                    <th>Paid Status</th>
                    <!-- <th>Description</th> -->
                    <th>Amount</th>
                  </tr>
               </thead>

                <tbody>
                  @foreach($allData as $key => $payment)
                    <tr id="invoice_ids{{$payment->invoice->id}}">
                      <td><input type="checkbox" class="checkbox_ids" value="{{$payment->invoice->id}}"/></td>
                      <!-- <td>{{$key +1}}</td> -->
                      <td><a style="color:black;" href="{{route('invoice.print',$payment->invoice->id)}}"><span style="background:silver;">{{date('d-m-Y',strtotime($payment->invoice->date))}}</span>INV-{{$payment->invoice->invoice_no}}
                    <br>{{$payment->customer->name}}</a> </td>
                      <!-- <td> c name # -->
                        <!-- ({{$payment->customer->mobile_no}} - {{$payment->customer->address}}) -->
                      <!-- </td> -->
                      <td>
                      @if($payment->paid_status=="full_paid")
                         <span  style="background:green; border: 2px solid green;border-radius: 5px;">{{$payment->paid_status}}</span>
                      
                      @else
                        <span style="background:red; border: 2px solid red;border-radius: 5px;">{{$payment->paid_status}}</span>
                      
                      @endif
                      </td>
                      
                      <!-- <td>{{$payment->invoice->description}}</td> -->
                      
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
    
    $(function(e){
      $("#select_all_ids").click(function(){
        $('.checkbox_ids').prop('checked',$(this).prop('checked'))
      });
      
//Delete Buttton Show

          $(document).on('click change','input.checkbox_ids, #select_all_ids',function(e){
            console.log($('input.checkbox_ids:checked').length)
            if($('input.checkbox_ids:checked').length >0){
            $("#action").show();
          }else{
            $("#action").hide();
          }
          })

      $('#DeleteAllSelectedRecord').click(function(e){
        e.preventDefault();
        var all_ids=[];
        
        $('input.checkbox_ids:checked').each(function(){
          all_ids.push($(this).val());
          
          
        });

        console.log(all_ids)


        $.ajax({
          url:"{{route('invoice.deleteall')}}",
          type:"DELETE",
          data:{
            ids:all_ids,
            // 'action' ; 'delete',
            _token:"{{csrf_token()}}"
          },
          success:function(response){
            $.each(all_ids,function(key,val){
              $('#invoice_ids'+val).remove();
            })
          }
        })
      });
    });

    
   
    
  </script>

  @endsection