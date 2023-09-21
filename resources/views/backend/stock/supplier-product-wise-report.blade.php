
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
                <h3>Select Criteria
                  <!-- <a href="{{route('stock.report.pdf')}}" target="_blank" class="btn btn-success float-right btn-sm"><i 
                  class="fa fa-download"></i>Stock Download</a> -->
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <strong>Supplier Wise Report</strong>
                        <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value"> &nbsp;&nbsp;
                        <strong>Product Wise Report</strong>
                        <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
                        </div>
                      </div>
                    <div class="show_supplier" style="display:none">
                      <form action="{{route('stock.report.supplier.product.wise.pdf')}}" target="_blank" method="GET" id="supplierWiseForm">
                      <div class="form-row">
                            <div class="col-md-8">
                                <label for="">Supplier Name</label>
                                <select name="supplier_id" id="supplier_id" class="form-control select2">
                                    <option value="">Select Supplier</option>
                                    @foreach($supplier as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-top:29px;">
                              <button type="submit" class="btn btn-primary btn-sm">Search </button>
                            

                            </div>
                        </div>
                      </form>
                    </div>

                    <div class="show_product" style="display:none">
                      <form action="{{route('stock.report.product.wise.pdf')}}" target="_blank" method="GET" id="supplierWiseForm">
                          <div class="form-row">
                          <div class="form-group col-md-3">
                            <label for="category_id">category name</label>
                            <select name="category_id" id="category_id" class="form-control select2">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach


                            </select>
                            
                            </div>

                          

                            <div class="form-group col-md-3">
                                <label for="name">Product Name</label>
                                <select name="product_id" id="product_id" class="form-control select2">
                                <option value="">Select product</option>
                          
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
  <script>
    $(function(){

      $(document.body).on('change','#category_id',function(){
        var category_id=$(this).val();
        $.ajax({
        
          url:"{{route('get-product')}}",
          type:"GET",
          data:{category_id:category_id},

          success:function(data){
            var html='<option value="">select product</option>';
            $.each(data,function(key,v){
              html +='<option value="'+v.id+'"> '+ v.name +'</option>';
            });
            $('#product_id').html(html);
          }
        });

      });
    });
</script>

<!-- Criteria selection show hide script -->
  <script>
    $(document).on('change','.search_value',function(){

      $search_value=$(this).val();
      if($search_value=='supplier_wise'){
        $('.show_supplier').show();
      }else{
        $('.show_supplier').hide();
      }if($search_value=='product_wise'){
        $('.show_product').show();
      }else{
        $('.show_product').hide();
      }

    });
  </script>

  <!-- Jquery Validation================ -->
  <script>
    $(function () {
     
      $('#supplierWiseForm').validate({

        ignor:[],
        errorPlacement:function(error,element){
          if(element.attr("name")=="supplier_id"){
            error.insertAfter(element.next());
          }else{
            error.inserAfter(element);
          }
         
         },
         errorClass:'text-danger',
          validClass:'text-success',
        rules: {
          supplier_id:{
            required:true,
          },

        
         
          
        },
        messages: {
         
          
        },
        
      });
    });
</script>

  @endsection