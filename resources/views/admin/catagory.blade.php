<!DOCTYPE html>
<html lang="en">
  <head>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
/* Add these styles to the existing ones */
table.center {
  margin-left: auto;
  margin-right: auto;
}

th.th_deg, td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th.th_deg {
  background-color: #4CAF50;
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

/* Add these new styles */
.div_center{
  text-align: center;
  padding-top: 40px;
}

.h2_font{
  font-size: 40px;
  padding-bottom: 40px;
}

.input_color{
  color: black;
}

.style{
  margin: auto;
  width: 50%;
  text-align: center;
  margin-top: 30px; /* updated from "container-scroller" */
  /* border: 3px solid white; */
}

.center{
  margin: auto;
  width: 70%;
  text-align: center;
  margin-top: 30px;
  /* border: 3px solid white; */
}

.header_dsg{
  font-size: 20px;
}

.header_color{
  background-color: #4CAF50;
}

.h2_font{
  font-size: 25px;
}




    </style>

  </head>
  <body>
  @include('sweetalert::alert')
    <div class="container-scroller">
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

            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{url('/add_catagory')}}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="catagory" placeholder="Write catagory name">
                    <input type="submit"  class = "btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>

            <table class ="center">
                <tr class="header_color">
                    <td>Category Name</td>
                    <td>Action</td>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->catagory_name}}</td>
                        <td>
                        <a class ="btn btn-danger" onclick="confirmation(event)"  href="{{url('delete_catagory',$data->id)}}">Delete</a>
                    </tr>
                </tr>

                @endforeach

            </table>

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
               title: "Are you sure to remove this category",
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
