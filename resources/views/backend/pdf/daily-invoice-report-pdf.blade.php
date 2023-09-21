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
    <table border='1' width="100%">

        <thead>
        <tr>
        <th>SL.</th>
        <th>Invoice No</th>

        <th>Customer Name</th>
        <th>Date</th>
        <th>Description</th>
        <th>Amount</th>
        </tr>
        </thead>
        <tbody>
            @php 
            $total_sum=0;
            @endphp
        @foreach($allData as $key => $invoice)
        <tr>
            <td>{{$key+1}}</td>
            <td>Invoice No #{{$invoice->invoice_no}} </td>
            <td> {{$invoice['payment']['customer']['name'] }}
            ({{$invoice['payment']['customer']['mobile_no'] }}-{{$invoice['payment']['customer']['address'] }})
            </td>
            <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
            
            <td>{{$invoice->description}}</td>
            
            <td>
        
            {{$invoice['payment']['total_amount'] }}
            </td>
            </tr>
            @php 
            $total_sum +=$invoice['payment']['total_amount'];
            @endphp
       
        @endforeach
        <tr>
            <td colspan="5" style="text-align:right;">Grand Total</td>
            <td>{{$total_sum}}</td>
        </tr>
         
        </tbody>

       

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