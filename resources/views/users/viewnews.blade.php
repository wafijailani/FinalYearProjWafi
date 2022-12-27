<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>URL</th>
                            <th>PictureLink</th>
                            <th>News</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                @foreach($values as $value)
                <td>{{$value->Title}}</td>
                <td><img src = "{{$value->PictureLink}}"></td>
                <td>{{$value->News}}</td>
            </tr>
            @endforeach
                        </tbody>
                      </table>

</body>
</html>
