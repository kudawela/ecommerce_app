<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
  .div_center {
    /* display: flex; */
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100%;
    width: 50%;
    margin: 0 auto;
  }

  .font_size {
    font-size: 25px;
    text-align: center;
  }

  .text-color {
    color: #000;
  }

  .div_design {
    display: flex;
    flex-direction: row;
    /* align-items: center; */
    margin: 10px;
    
  }

  .div_design label {
    font-weight: bold;
    margin: 5px 10px 5px 0;
    text-align: right;
    flex: 1;
  }

  .div_design input,
  .div_design select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    margin-top: 5px;
    flex: 3;
  }

  .div_design input[type="file"] {
    margin-top: 10px;
  }

  /* .btn {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #3e8e41;
  } */

  .font_size{
    font-size: 25px;
    text-align: center;
    padding-bottom: 30px;
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

          @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>
          @endif

            <div class="div_center">
                <h1 class="font_size">Add Product</h1>

                <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                
                
                @csrf

                <div class="div_design">
                <label>Cake Name :</label>
                <input class="text-color" type="text" name="title" placeholder="Write a title" required="">
                </div>

                <div class="div_design">
                <label>Cake Description :</label>
                <input class="text-color" type="text" name="description" placeholder="Write a description" required="">
                </div>

                <div class="div_design">
                <label>Product Price :</label>
                <input class="text-color" type="number" name="price" min="1" placeholder="Write the price" required="">
                </div>

                <div class="div_design">
                <label>Available Weight(s) (Kg):</label>
                <input class="text-color" type="number" name="weight" min="1" placeholder="Separate weight by comma" required="">
                </div>

                <div class="div_design">
                <label>Ingradients :</label>
                <input class="text-color" type="text" name="ingradients" placeholder="Seperate ingradients by comma" required="">
                </div>

                <div class="div_design">
                <label>No: of Available Items:</label>
                <input class="text-color" type="number" min="0" name="quantity"  placeholder="Write the Available number of Items" required="">
                </div>

                <div class="div_design">
                <label>Discounted Price :</label>
                <input class="text-color" type="number" min="1" name="dis_price" placeholder="Write a Discount" >
                </div>

                <div class="div_design">
                <label>Product Catagory :</label>
                <select class="text-color" name= "catagory" required="">
                    <option value="" selected="">Add a catagory here</option>

                    @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach

                </select>
                </div>

                <div class="div_design">
                <label>Product Image Here :</label>
                <input class="text-color" type="file" name="image" required="">
                </div>

                <div style="padding-left:150px;">
                <input style="width:420px; height:40px; background-color: #1167b1;" class="btn btn-primary" value="Add Product" type="submit" >
                </div>

                </form>
                
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
