<!DOCTYPE html>
<html>
    <head>
        <title>Inventory Details</title>
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
    <h1>Summary of the Inventory</h1>

    <table class="center">
  <tr>
      <th style="padding:10px; font-size: 10px;">Product ID</th>
      <th style="padding:10px; font-size: 10px;">Product Name</th>
      <th style="padding:10px; font-size: 10px;">Product Catagory</th>
      <th style="padding:10px; font-size: 10px;">Product Image</th>
      <th style="padding:10px; font-size: 10px;">Weight</th>
      <th style="padding:10px; font-size: 10px;">No: of items Available</th>
      <th style="padding:10px; font-size: 10px;">Stock Status</th>
  </tr>

 @foreach($product as $product) 
 
  <tr>
      <td style="padding:10px; font-size: 10px;">{{$product->id}}</td>
      <td style="padding:10px; font-size: 10px;">{{$product->title}}</td>
      <td style="padding:10px; font-size: 10px;">{{$product->catagory}}</td>
      <td style="padding:10px; font-size: 10px;">
          <img style="height:60px; width:60px; align: center;" src="./product/{{$product->image }}" class="img_size">
      </td>
      <td style="padding:10px; font-size: 10px;">{{$product->weight}}</td>
      <td style="padding:10px; font-size: 10px;">{{$product->no_of_available_items}}</td>
      <td style="padding:10px; font-size: 10px;">
    @if($product->no_of_available_items == 0)
        Out of stock
    @else
        In stock
    @endif</td>
  </tr>

  @endforeach

</table>





</body>
</html> 