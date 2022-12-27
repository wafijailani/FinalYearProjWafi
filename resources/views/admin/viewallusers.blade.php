<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    <h1>Test All Users</h1>

    <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>District</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                @foreach($values as $value)
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->phonenum}}</td>
                <td>{{$value->district}}</td>
                <td><a href="{{ url('deleteuser/'.$value->id) }}" class="btn btn-danger btn-sm">Delete User</a></td>
            </tr>
            @endforeach
                        </tbody>
                      </table>
</body>
</html>