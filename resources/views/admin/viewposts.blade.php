<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>view my own updates</h3>
    <table class="table">
                        <thead>
                          <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Fix the link</th>
                            <th>1</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                @foreach($values as $value)
                <td><img src="{{ asset('images-news/'.$value->image) }}" alt=""></td>
                <td>{{$value->title}}</td>
                <td>{{$value->image_text}}</td>
                
                <td><a href="{{ url('delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach
                        </tbody>
                      </table>
</body>
</html>











