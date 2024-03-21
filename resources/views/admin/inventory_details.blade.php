<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">


.main-panel {
    width: 100%;
    margin: 0 auto;
  }

  table.center {
    margin: 0 auto;
    width: 100%;
  }

  th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }
  td{
  text-align: center;
}

tr{
  text-align: center;
}

  .btn {
    border: none;
    color: white;
    padding: 12px 24px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
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
    margin-bottom: 30px;
  }

  .alert.success {
    background-color: #4CAF50;
  }

  .btn.btn-primary {
    background-color: #007bff;
    color: #fff;
  }

  .font_size{
    font-size: 25px;
    text-align: center;
  }

  .img_size {
    width: 50px;
    height: 50px;
  }

  input[type="text"] {
    color: black;
    height: 30px;
    width: 200px;
  }
    </style>
  </head>
  <body>
    <div class="container-scroller">
    @include('sweetalert::alert')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>
        @endif

          <h1 class="font_size">Inventory</h1>

            <div class="btn_deg" style="float: right; padding-right:30px; padding-top:20px; padding-bottom: 10px; height: 20px; height:40px; ">
            <a class="btn btn-success" href="{{ url('/view_product') }}"> + Add Inventory</a>

          </div>

          <div style="padding-left:30px; padding-top:10px; padding-bottom:5px; ">
          <form  action="{{url('searchInventory')}}" method="get">
                @csrf

                    <input style="color:black; height: 40px; width: 200px;" type="text" name="searchInventory" placeholder="search for something">
                    <input style="" type="submit" value="search" class="btn btn-primary">
            
            </form>
          </div>
            

<table class="center">
  <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Category</th>
      <th>Product Image</th>
      <th>Weight(Kg)</th>
      <th>Available Quantity</th>
      <th>Stock Status</th>
      <th>Delete</th>
      <th>Edit</th>
  </tr>

 @foreach($product as $product) 
 
  <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->title}}</td>
      <td>{{$product->catagory}}</td>
      <td>
          <img src="/product/{{$product->image }}" class="img_size">
      </td>
      <td>{{$product->weight}}</td>
      <td>{{$product->quantity}}</td>
      <td>
        @if($product->quantity == 0)
            Out of stock
        @else
            In stock
        @endif
      </td>
      <td>
          <a class="btn btn-success"  href="{{url('update_product',$product->id)}}">Edit</a>
      </td>
      <td>
          <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_inventory',$product->id)}}">Delete</a>
      </td>

  </tr>

  @endforeach

</table>

      <div class="btn_deg" style="float: right; padding-right:30px; padding-top:20px; padding-bottom: 50px; ">
        <a href="{{url('print_inventory_report' ,$product->id)}}"  class="btn btn-success" >Print Inventory Report</a>
      </div>



        </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
    <script>
         function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
               title: "Are you sure to remove this Product from Inventory",
               text: "You will not be able to revert this!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willCancel) => {
               if(willCancel) {

                  window.location.href = urlToRedirect;
               }
               
            });
               
         }
         </script>
  </body>
</html>
