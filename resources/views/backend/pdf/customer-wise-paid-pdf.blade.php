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
            <td ><u ><strong style="margin-left:230px; font-size:20px">Customer Wise Paid Report:</strong></u></td>
        </tr>
        </tbody>
    </table> 
    <table border="1" width="100%" >

<thead>
 <tr>
   <th>SL.</th>
   <th>Customer Name</th>
   <th>Invoice No </th>
   <th>Date</th>
   <th>Amount</th>
   
 </tr>

 <tbody>
    @php 
    $total_paid=0;
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
     <td>{{$payment->paid_amount}} TK</td>
     @php 
      $total_paid +=$payment->paid_amount;
     @endphp
   </tr>
   @endforeach
   <tr >
    <td style="text-align:right;" colspan="4"> <strong>Grand Total</strong></td>
    <td>{{$total_paid}}</td>
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