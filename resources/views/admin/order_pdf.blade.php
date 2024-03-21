<!DOCTYPE html>
<html>
    <head>
        <title>Summary of the Orders</title>
        <style type="text/css">
        .title_deg
        {
            text-align: center;
            font-size: 10px;
            font-weight:bold;
            padding-bottom:40px;
        }

        .table_deg
        {
            width:100%;
            margin:auto;

}

th, td {
  border-bottom: 1px solid #ddd;
        
        }


    </style>
    </head>
<body>
    <h1>Summary of the Orders</h1>

    <table class="table_deg">
        <tr class="th_deg">
            <th style="padding:10px; font-size: 10px;">Name</th>
            <th style="padding:10px; font-size: 10px;">Email</th>
            <th style="padding:10px; font-size: 10px;">Address</th>
            <th style="padding:10px; font-size: 10px;">Phone</th>
            <th style="padding:10px; font-size: 10px;">Product title</th>
            <th style="padding:10px; font-size: 10px;">Quantity</th>
            <th style="padding:10px; font-size: 10px;">Price</th>
            <th style="padding:10px; font-size: 10px;">Payment Status</th>
            <th style="padding:10px; font-size: 10px;">Delivery Status</th>
            <th style="padding:10px; font-size: 10px;">Image</th>
            <!-- <th style="padding:10px;">Delivered</th> -->

        </tr>

                @forelse($order as $order)
                <tr>
                    <td style="padding:10px; font-size: 10px;">{{$order->name}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->email}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->address}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->phone}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->product_title}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->quantity}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->price}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->payment_status}}</td>
                    <td style="padding:10px; font-size: 10px;">{{$order->delivery_status}}</td> 
                    <td>
                        <img style="height:50px; width:50px;" src="./product/{{$order->image }}" class="img_size">
                    </td>

    </div>
                @endforeach
            </table>





</body>
</html> 