<!DOCTYPE html>
<html>
    <head>
        <title>Product Summary</title>
    </head>
<body>
    <h1>Customer Details</h1>

    <table class="center">
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            
            @foreach($users as $users)
            <tr>
                <td>{{$users->id}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->phone}}</td>
                <td>{{$users->address}}</td>
            </tr>

        @endforeach

        </table>


</body>
</html> 