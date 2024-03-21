<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
table.center {
  margin-left: auto;
  margin-right: auto;
}

th.th_deg,
td {
  padding: 20px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
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

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  margin-bottom: 15px;
}

.alert.success {
  background-color: #4CAF50;
}

.btn.btn-primary {
  background-color: #007bff;
  color: #fff;
}

.font_size {
  font-size: 25px;
  text-align: center;
}

.tr_dsg{
    background-color: #4CAF50;
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

          <h1 class="font_size">Customer Details</h1>

        <div>
        <form  action="{{url('searchproduct')}}" method="get">
                @csrf

                <input style="color:black; height: 40px; width: 200px; " type="text" name="searchproduct" placeholder="search for something">
                    <input type="submit" value="search" class="btn btn-primary">
                </div>
                    
        </form>
        <br>

          

        <table class="center">
            <tr style="height:60px;" class="tr_dsg">
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            
            @foreach($users as $users)

            @if($users->usertype == 0)

            <tr>
                <td>{{$users->id}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->phone}}</td>
                <td>{{$users->address}}</td>
                <td>
                    <a class="btn btn-success" href="{{url('update_client',$users->id)}}">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this?')" >Delete</a>
                </td>

            </tr>
            @endif

        @endforeach

        </table>


        </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
