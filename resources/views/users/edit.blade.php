<x-app-layout>

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
                <form action="{{ url('editandupdate/'.$values->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
                            <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value = "{{$values->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for=""> News</label>
                            <input type="text" name="image_text" value = "{{$values->image_text}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for=""> Picture</label>
                            <h3>Old Picture</h3>
                            <img src="{{ asset('images-news/'.$values->image) }}">

    
                        </div>
                        <div>
	  <img id="output" src="" width="500" height="500">
	<input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
  	</div>
  	<div>                    
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</body>
</html>
</x-app-layout>

