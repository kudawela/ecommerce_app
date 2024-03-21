<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        /* Style for table */
table.table_deg {
  margin: 0 auto;
  border-collapse: collapse;
  width: 100%;
}

th.th_deg, td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th.th_deg {
  background-color: #4CAF50;
  color: #fff;
}

td img.img_size {
  height: 50px;
  width: 50px;
  object-fit: cover;
  border-radius: 5px;
}

/* Style for form */
form {
  display: flex;
  align-items: center;
}

input[type="text"] {
  border: none;
  border-radius: 5px;
  height: 40px;
  width: 300px;
  padding: 0 10px;
  font-size: 16px;
}

input[type="submit"] {
  margin-left: 10px;
  height: 40px;
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
  display: flex;
  align-items: center; 
}

.btn_deg a {
  margin-left: 10px; /* adjust as needed */
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
h1.title_deg {
  margin: 30px 0;
  font-size: 24px;
  font-weight: 600;
}

/* Style for delivered button */
.btn-delivered {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 8px 16px;
}

.btn-delivered:hover {
  background-color: #0069d9;
  color: #fff;
}

.btn-delivered[disabled] {
  background-color: #999;
  cursor: not-allowed;
}

/* Style for print and send email button */
.btn-print-email {
  border: none;
  background: none;
  font-size: 16px;
  padding: 0 10px;
  cursor: pointer;
  margin-right: 10px;
}

.btn-print-email i {
  font-size: 24px;
}

.btn-print-email:hover i {
  color: #1E90FF;
}

.btn-print-email[disabled] {
  cursor: not-allowed;
}

td{
  text-align: center;
}

tr{
  text-align: center;
}

.th_deg {
  background-color: #4CAF50;
  font-size: 15px;
}

.print-pdf,
.send-email {
  padding: 10px;
}

.title_deg{
    padding-top: 0px;
    font-size: 25px;
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
      <div class="main-panel">
          <div class="content-wrapper">
            <h1 class="title_deg">All Orders</h1>
            <!-- <div class="btn_deg" style="float: right; padding-right:30px; padding-top:10px;  height: 20px; height:40px; ">
                <a class="btn btn-success" href="{{url('/view_product')}}"> +   Add Order</a>
            </div> -->
            

            <div style="padding-bottom:30px;">

                <form action="{{url('searchOrder')}}" method="get">
                @csrf
                
                    <input style="color: black; " type="text" name="searchOrder" placeholder="search for something">
                    <input type="submit" value="search" class="btn btn-outline-primary">

            
                </form>
            </div>

            <div style="overflow-x: auto;">

            <table class="table_deg">
                <tr class="th_deg">
                    <th style="padding:10px;">Name</th>
                    <th style="padding:10px;">Email</th>
                    <th style="padding:10px;">Address</th>
                    <th style="padding:10px;">Phone</th>
                    <th style="padding:10px;">Product title</th>
                    <th style="padding:10px;">Quantity</th>
                    <th style="padding:10px;">Price</th>
                    <th style="padding:10px;">Payment Status</th>
                    <th style="padding:10px;">Delivery Status</th>
                    <th style="padding:10px;">Ordered Date</th>
                    <th style="padding:10px;">Image</th>
                    <th style="padding:10px;">Delivered</th>
                    <th style="padding:10px;">Print PDF</th>
                    <!-- <th style="padding:10px;">Send Email</th> -->

                </tr>
                @forelse($order as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td> 
                    <td>{{$order->created_at}}</td>
              
                    <td class="img_col">
                        <img src="/product/{{$order->image }}" class="img_size">
                    </td>
                    <td>
                        @if($order->delivery_status=="processing")

                       <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure this product is delivereed !!!')" class="btn btn-primary" >Delivered</a>

                       @else

                       <p style="color:green;">Delivered</p>

                       @endif
                    </td>

                    <td>
                        <a href="{{url('print_pdf',$order->id)}}" class="btn btn-warning">Print</a>
                    </td>

                    <!-- <td>
                        <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                    </td> -->
                    
                </tr>

                @empty
               <tr> 
                <td colspan="16">
                    No Data Found
                </td>
               </tr>

                @endforelse

            </table>

            </div>

            <div class="btn_deg" style="float: right; padding-right:30px; padding-top:20px; padding-bottom: 50px; ">
                <a href="{{url('print_order_report' ,$order->id)}}"  class="btn btn-success" >Print Order Report</a>
            </div>
            
        </div>
    </div>
        <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
