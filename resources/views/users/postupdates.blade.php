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
<form method="POST" action="{{ url('/storeupdates') }}" enctype="multipart/form-data">
@csrf
  	
  	<div>
	  <img id="output" src="" width="500" height="500">
	<input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
  	</div>

	  <div>
      <textarea
	    id="text" 
      	cols="40" 
      	rows="2" 
      	name="title" 
      	placeholder="Title of the content"></textarea>
  	</div>

  	<div>
      <textarea
      	id="text"
      	cols="40" 
		rows="4" 
      	name="image_text" 
      	placeholder="Post news here ..."></textarea>
  	</div>

  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
  </div>
</div>  

</body>
</html>
</x-app-layout>