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
    <h3>View Updates and Delete</h3>
    <table class="table">
                        <thead>
                          <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Fix the link</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                @foreach($values as $value)
                <td>{{$value->image}}</td>
                <td>{{$value->title}}</td>
                <td>{{$value->image_text}}</td>
                <td><img src="{{ asset('images-news/'.$value->image) }}" alt=""></td>
                <td><a href="{{ url('edit/'.$value->id) }}" class="btn btn-danger btn-sm">Edit</a></td>
            </tr>
            @endforeach
                        </tbody>
                      </table>
</body>
</html>











