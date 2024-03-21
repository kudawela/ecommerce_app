<!DOCTYPE html>
<html>
    <head>
        <title>Product Summary</title>

    </head>
<body>
    <h1>Product Details</h1>

    <table class="center">
                <tr class="th_color">
                    <th class="th_deg">Cake Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Catagory</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Discount</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Ingradients</th>
                    <th class="th_deg">Weight</th>
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
                        <img style="height:60px; width:60px;" class="img_size" src="./product/{{$product->image}}" >
                    </td>
                    <td>{{$product->ingradients}}</td>
                    <td>{{$product->weight}}</td>                   
                </tr>

    </div>
                @endforeach
            </table>





</body>
</html> 