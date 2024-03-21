<!DOCTYPE html>
<html>
    <head>
        <title>Sales Summary</title>

    </head>
<body>
    <h1>Sales Summary</h1>

    <table class="center">
            <tr>
                <th style="padding:10px; font-size: 10px;">Order ID</th>
                <th style="padding:10px; font-size: 10px;">Customer Name</th>
                <th style="padding:10px; font-size: 10px;">Email</th>
                <th style="padding:10px; font-size: 10px;">Phone Number</th>
                <th style="padding:10px; font-size: 10px;">Address</th>
                <th style="padding:10px; font-size: 10px;">Product ID</th>
                <th style="padding:10px; font-size: 10px;">Product Title</th>
                <th style="padding:10px; font-size: 10px;">Product Quantity</th>
                <th style="padding:10px; font-size: 10px;">Total Price</th>
                <th style="padding:10px; font-size: 10px;">Ordered Date & Time</th>
            </tr>

           @foreach($order as $order)
           @if($order->payment_status == 'paid')

            <tr>
                <td style="padding:10px; font-size: 10px;">{{$order->id}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->name}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->email}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->phone}}</td> style="padding:10px; font-size: 10px;"
                <td style="padding:10px; font-size: 10px;">{{$order->address}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->product_id}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->product_title}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->quantity}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->price}}</td>
                <td style="padding:10px; font-size: 10px;">{{$order->created_at}}</td>
            </tr>

            @endif
            @endforeach

        </table>
</body>
</html> 