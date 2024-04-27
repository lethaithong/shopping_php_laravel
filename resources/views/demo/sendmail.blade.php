<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        </style>
</head>
<body>

    <h2>Cam on {{$Order->Full_name}} da dat hang cua chung toi</h2><br>
    <h2>chi tiet don hang cua ban</h2>
    <h2>Ma don hang: {{$Order->Order_id}}</h2>
    <h2>Ngay dat hang: {{$Order->created_at}}</h2>
    
    <table> 
      <tr>
        <th>Name Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
      @foreach ($order_detail as $item)
      <tr>
        <td>{{$item->Pro_name}}</td>
        <td>{{$item->Price}}</td>
        <td>{{$item->Quantity}}</td>
        <td>{{$item->Price * $item->Quantity}}</td>
      </tr> 
      @endforeach
    </table>
    
    </body>
</html>