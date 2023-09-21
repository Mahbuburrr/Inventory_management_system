<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice details pdf</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
      
    <table  width="100%">
       <tbody>
       <tr>
            <td width="25%"><strong>Invoice No: # {{$payment['invoice']['invoice_no']}}</strong></td>
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
            <td ><u ><strong style="margin-left:260px; font-size:20px">Customer Invoice Details:</strong></u></td>
        </tr>
        </tbody>
    </table>
 
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
          <td  class="text-center"><strong>{{$payment->due_amount}}</strong></td>
          </tr>
          <tr>
          <td colspan="5" class="text-right"><strong>Grand Total:</strong></td>
          <td  class="text-center"><strong>{{$payment->total_amount}}</strong></td>
          </tr>

          <tr>
            <td colspan="6" style="text-align:center;"><strong>Paid Summary</strong></td>
          </tr>
          @php 
          $payment_details=App\Models\PaymentDetails::where('invoice_id',$payment->invoice_id)->get();
          @endphp
          @foreach($payment_details as $detail)
          <tr>
            <td colspan="3" style="text-align:right;">{{date('d-m-Y',strtotime($detail->date))}}</td>
            <td colspan="3">{{$detail->current_paid_amount}}</td>
          </tr>
          @endforeach
    </tbody>

  </table>
    
    @php
        $date=new DateTime('now',new DateTimezone('Asia/Dhaka'));
        @endphp
        <i>Printing time: {{$date->format('F j, Y, g:i a')}}</i>
        <hr style="margin-bottom:0px;">
        <table width="100%">
        
            <tbody>
                <tr>
                    <td width="40%"><p style="text-align:center;">Customer Signature</p></td>
                    <td width="20%"></td>
                    <td width="40%"><p style="text-align:center;">Seller Signature</p></td>
                </tr>
            </tbody>

        </table>
</body>
</html>