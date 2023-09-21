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
            <td ><u ><strong style="margin-left:170px; font-size:20px">Daily Invoice Report:{{date('d-m-Y',strtotime($start_date))}} to {{date('d-m-Y',strtotime($end_date))}}</strong></u></td>
        </tr>
        </tbody>
    </table> 
    <table width="100%" border="1">

               <thead>
                <tr>
                  <th>SL.</th>
                  <th>Purchase No</th>
                  <th>Date</th>
                 
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                  
                </tr>

                <tbody>
                  @php 
                  $total_sum=0;
                  @endphp
                   
                  @foreach($allData as $key => $purchase)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$purchase->purchase_no }}</td>
                    <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                    
                    <td>{{$purchase['product'] ['name']}}</td>
                    <td>{{$purchase->buying_qty}} {{$purchase['product'] ['unit']['name']}}</td>
                    <td>{{$purchase->unit_price}}</td>
                    <td>{{$purchase->buying_price}}</td>
                   
                     @php 
                     $total_sum +=$purchase->buying_price;
                     @endphp
                 
                   <!-- @if($purchase->status=='0')
                  <a href="{{route('purchase.delete',$purchase->id)}}" id="delete" title="delete" class="btn btn-danger "><i 
                 
                  class="fa fa-trash"></i></a>
                  @endif
                    </td> -->
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="6" style="text-align:right;">Grand Total</td>
                    <td>{{$total_sum}}</td>
                  </tr>
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