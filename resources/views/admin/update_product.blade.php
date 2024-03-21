<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">


    @include('admin.css')

    <style type="text/css">
  .div_center {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100%;
    width: 80%;
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
    align-items: center;
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

  .btn {
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
  }

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
                <h1 class="font_size">Update Product</h1>

                <form action="{{url('/update_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">
                
                
                @csrf

                <div class="div_design">
                <label>Cake Name :</label>
                <input class="text-color" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
                </div>

                <div class="div_design">
                <label>Cake Description :</label>
                <input class="text-color" type="text" name="description" placeholder="Write a description" required="" value="{{$product->description}}" >
                </div>

                <div class="div_design">
                <label>Product Price :</label>
                <input class="text-color" type="number" name="price" placeholder="Write the price" required="" value="{{$product->price}}">
                </div>

                <div class="div_design">
                <label>Available Weight :</label>
                <input class="text-color" type="number" name="weight" placeholder="Separate weight by comma" required="" value="{{$product->weight}}">
                </div>

                <div class="div_design">
                <label>Ingradients :</label>
                <input class="text-color" type="text" name="ingradients" placeholder="Seperate ingradientsbby comma" required="" value="{{$product->ingradients}}">
                </div>

                <div class="div_design">
                <label>No: of Available Items:</label>
                <input class="text-color" type="number" min="0" name="quantity"  placeholder="Write the quantity" required="" value="{{$product->quantity}}">
                </div>

                <div class="div_design">
                <label>Discounted Price :</label>
                <input class="text-color" type="number" name="dis_price" placeholder="Write a Discount(If Apply)" value="{{$product->discount_price}}" >
                </div>

                <div class="div_design">
                <label>Product Catagory :</label>
                <select class="text-color" name= "catagory" required="" >
                    <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>

                    
                    @foreach($catagory as $catagory)
                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                    @endforeach


                </select>
                </div>


                <div class="div_design">
                <label> Change Product Image Here :</label>
                <input class="text-color" type="file" name="image">
                </div>

                
                <div class="div_design">
                <label> Current Product Image :</label>
                <img style="margin:auto" height="100" width="100" src="/product/{{$product->image}}">
                </div>

                

                <div class="div_design">
                <input class="btn btn-primary" value="Update Product" type="submit" >
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

