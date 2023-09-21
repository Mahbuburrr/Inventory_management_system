<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daily invoice repport pdf</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
      
    <table  width="100%">
       <tbody>
       <tr>
            <td width="25%"></td>
            <td><span style="font-size:20px; background:#84ADEA">Mahbubur Online Shopping Center
            <br></span><p style="margin-left:90px; font-size:20px;font-size:20px">Kazipur,Sirajganj</p></td>
            <td width="29%"><span>Showroom No:01777223567 <br>
                      Owner No:01609-558069
                    </span>
            </td>
        </tr>
       </tbody>
    </table>
   
    <hr style="margin-bottom:0px;">
    <table width="100%">
        
        <tbody>
        <tr >
            <td ><u ><strong style="margin-left:270px; font-size:20px">Stock Report</strong></u></td>
        </tr>
        </tbody>
    </table> 
    <table border="1" width="100%">

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
     
   
    @php
        $date=new DateTime('now',new DateTimezone('Asia/Dhaka'));
        @endphp
        <i>Printing time: {{$date->format('F j, Y, g:i a')}}</i>
        <!-- <hr style="margin-bottom:0px;"> -->
        <table width="100%">
        
            <tbody>
                <tr>
                    <td width="40%"></td>
                    <td width="20%"></td>
                    <td width="15%"><p style="text-align:center; border-bottom:1px solid #000">Owner Signature</p></td>
                </tr>
            </tbody>

        </table>
</body>
</html>