<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">

    /* Style for table */
    table.center {
      margin: 0 auto;
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #4CAF50;
      color: #fff;
    }
    td img {
      height: 50px;
      width: 50px;
      object-fit: cover;
      border-radius: 5px;
    }

    
    input[type="text"] {
      border: none;
      border-radius: 5px;
      height: 30px;
      width: 200px;
      padding: 0 10px;
      font-size: 16px;
      color: black;
    }
    input[type="submit"] {
      height: 30px;
      border: none;
      border-radius: 5px;
      padding: 0 10px;
      font-size: 16px;
      background-color: #1E90FF;
      color: #fff;
      cursor: pointer;
    }

    /* Style for buttons */
    .btn {
      border: none;
      color: white;
      padding: 12px 24px;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
      margin-right: 10px;
    }
    .btn-success {
      background-color: #4CAF50;
    }
    .btn-primary {
      background-color: #1E90FF;
    }
    .btn-danger {
      background-color: #f44336;
    }
    .btn_deg {
      float: right;
      padding-right: 30px;
      padding-top: 20px;
      padding-bottom: 50px;
    }

    /* Style for alerts */
    .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
      margin-bottom: 15px;
      border-radius: 5px;
    }
    .alert.success {
      background-color: #4CAF50;
    }

    /* Style for headings and titles */
    .font_size {
      font-size: 24px;
      font-weight: 600;
      text-align: center;
    }

    td{
  text-align: center;
}

tr{
  text-align: center;
}


</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

     

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <h1 class="font_size">Sales Details</h1>

      <form style="padding-left:30px; padding-top:10px; padding-bottom:20px;" action="{{url('searchSales')}}" method="get">
          @csrf

          <input style="color:black; height: 30px; width: 200px; padding-right: 10px;" type="text" name="searchSales" placeholder="search for something">
            <input style="" type="submit" value="search" class="btn btn-primary">
            
      </form>


          <table class="center">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Total Price</th>
                <th>Ordered Date & Time</th>
            </tr>

           @foreach($order as $order)

           @if($order->payment_status == 'paid')

            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->product_id}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->created_at}}</td>
            </tr>

            @endif
            @endforeach

        </table>

        <div class="btn_deg" style="float: right; padding-right:30px; padding-top:20px; padding-bottom: 50px; ">
            <a href="{{url('print_sales_report' ,$order->id)}}"  class="btn btn-success" >Print Sales Report</a>
        </div>

        
        
        </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
