<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')


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
          <h1>Inventory Form</h1>
    <form method="post" action="submit-form.php">
      <table>
        <tr>
          <td><label for="product_id">Product ID:</label></td>
          <td><input type="text" id="product_id" name="product_id" required></td>
        </tr>
        <tr>
          <td><label for="product_name">Product Name:</label></td>
          <td><input type="text" id="product_name" name="product_name" required></td>
        </tr>
        <tr>
          <td><label for="product_category">Product Category:</label></td>
          <td><input type="text" id="product_category" name="product_category" required></td>
        </tr>
        <tr>
          <td><label for="product_image">Product Image:</label></td>
          <td><input type="file" id="product_image" name="product_image" accept="image/*" required></td>
        </tr>
        <tr>
          <td><label for="weight">Weight:</label></td>
          <td><input type="text" id="weight" name="weight" required></td>
        </tr>
        <tr>
          <td><label for="available_quantity">Available Quantity:</label></td>
          <td><input type="number" id="available_quantity" name="available_quantity" required></td>
        </tr>
        <tr>
          <td><label for="stock_status">Stock Status:</label></td>
          <td>
            <select id="stock_status" name="stock_status" required>
              <option value="" disabled selected>Select Stock Status</option>
              <option value="in_stock">In Stock</option>
              <option value="out_of_stock">Out of Stock</option>
            </select>
          </td>
        </tr>
      </table>
      <button type="submit">Submit</button>
    </form>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
