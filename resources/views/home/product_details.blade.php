<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
     <style>
      .label-success {
   /* Define the styles for 'label-success' class here */
   background-color: #4682b4;
   color: #fff;
   /* Add other styles as needed */
}

.label-danger {
   /* Define the styles for 'label-danger' class here */
   background-color: #E3735E;
   color: #fff;
}

     </style>

      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" type="">
      <title>ISHU Cake Creations</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
   <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

        <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px">
                     <div class="img-box">
                        <img src="/product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">

                        <h5 style ="padding-top:10px; padding-bottom:10px; text-align:center">
                          {{$product->title}}
                        </h5>

                     @if($product->discount_price!=null)

                        <h6 style="color:red">
                           Discount price: 
                           
                          Rs.{{$product->discount_price}}
                        </h6>

                        <h6 style="text-decoration:line-through; color:blue">
                           Price: 
                           
                          Rs.{{$product->price}}
                        </h6>

                        @else

                        <h6 style="color:blue">
                           Price
                           <br>
                          Rs.{{$product->discount_price}}
                        </h6>

                     @endif

                     <h6>Product Catagory : {{$product->catagory}}</h6>
                     <h6>Product Details : {{$product->description}}</h6>
                     <h6>Number of Available Items : {{$product->quantity}}</h6>
                     <h6>Weight of a Item : {{$product->weight}} Kg</h6>
                     <h6>Ingradients :{{$product->ingradients}}</h6>


            <form action="{{url('add_cart',$product->id)}}" method="post">
               @csrf

               <div class="row" style="padding-top: 30px; padding-bottom: 30px;">
                  <div class="col-md-4">
                        <input type="number" id="quantityInput" name="quantity" value="1" min="1" style="width:100px; height: 50px;">
                  </div>

                  <div style="padding-top:0px; padding-bottom:0px;" class="col-md-4">
                        <input id="addBtn" type="submit" value="Add To Cart" style="width:280px; height: 50px;">
                  </div>

               </div>
            </form>

            <!-- Example Laravel Blade view -->
            <div class="col-md-4">
               <span id="stockLabel" class="label label-success" style="display: inline-block; width: 410px; height: 50px; line-height: 50px; text-align: center; border-radius: 3px; cursor: pointer;">In stock</span>
               <span id="errorMsg" style="color:red;"></span>

            </div>

            <script>
            document.getElementById('quantityInput').addEventListener('input', function () {
               var quantity = parseInt(this.value);
               var availableQuantity = parseInt({{$product->quantity}});
               var stockLabel = document.getElementById('stockLabel');
               var errorMsg = document.getElementById('errorMsg');

               if (quantity > availableQuantity) {
                  stockLabel.textContent = 'Out of stock';
                  stockLabel.classList.remove('label-success');
                  stockLabel.classList.add('label-danger');
                  document.getElementById('addBtn').disabled = true; // Disable add to cart button
                  errorMsg.textContent = 'Not Available';
               } else {
                  stockLabel.textContent = 'In stock';
                  stockLabel.classList.remove('label-danger');
                  stockLabel.classList.add('label-success');
                  document.getElementById('addBtn').disabled = false; // Enable add to cart button
                  errorMsg.textContent = ''; // Clear error message
               }
            });
            </script>



                           </form>

                     </div>
                  </div>
               </div>

        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
      
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>