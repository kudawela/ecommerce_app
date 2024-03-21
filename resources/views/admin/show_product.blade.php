<!DOCTYPE html>
<html lang="en">
  <head>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
    table.center {
  margin-left: auto;
  margin-right: auto;
}

th.th_deg, td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

td{
  text-align: center;
}

tr{
  text-align: center;
}

tr.th_color{
  background-color:#4CAF50;
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


</style>

<script>
    function showCustomConfirm() {
    return confirm('Are You Sure to Delete this?') ? true : false;
    }
</script>

  </head>
  <body>
  @include('sweetalert::alert')
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">

        @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>
        @endif

            <div class="grid_dsg">
            <h2 class="font_size">Products</h2>
            <div class="btn_deg" style="float: right; padding-right:30px; padding-top:10px; padding-bottom: 10px; height: 20px; height:40px; ">
                <a class="btn btn-success" href="{{url('/view_product')}}"> +   Add Product</a>
            </div>

            <div style="padding-left:30px; padding-top:10px; padding-bottom:5px; ">
            <form  action="{{url('searchproduct')}}" method="get">
                @csrf

                    <input style="color:black; height: 40px; width: 200px;" type="text" name="searchproduct" placeholder="search for something">
                    <input style="" type="submit" value="search" class="btn btn-primary">
            
            </form>

            </div>

            <div style="width: 100%; overflow-x: auto;">
            <table class="center">
                <tr class="th_color">
                    <th class="th_deg">Cake Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Catagory</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Discounted Price</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Ingradients</th>
                    <th class="th_deg">Weight(Kg)/Pieces</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Edit</th>
                </tr>

                @foreach($product as $product)

                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->catagory}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$product->image}}" >
                    </td>
                    <td>{{$product->ingradients}}</td>
                    <td>{{$product->weight}}</td>                   
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)"  href="{{url('delete_product',$product->id)}}">Delete</a>
                        
                <!-- Inline JavaScript for the custom confirm dialog box -->


                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product',$product->id)}}" >Edit</a>
                    </td>
                </tr>

    </div>
                @endforeach
            </table>
          </div>  

            <div class="btn_deg" style="float: right; padding-right:30px; padding-top:20px; padding-bottom: 50px; ">
                <a href="{{url('print_product_report' ,$product->id)}}" class="btn btn-success" >Print Product Report</a>
            </div>
        </div>
    </div>
        <!-- partial -->
    
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
               title: "Are you sure to Remove this product",
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
