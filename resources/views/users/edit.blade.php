<x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
        
      <!-- partial:partials/_navbar.html -->
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/viewnews">
                <span class="menu-title">View News (Bernama)</span>
                <i class="mdi mdi-newspaper menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewupdates">
                <span class="menu-title">View Posts from Users</span>
                <i class="mdi mdi-comment-multiple-outline menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/postupdates">
                <span class="menu-title">Post New Update</span>
                <i class="mdi mdi-comment-plus-outline menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewmap">
                <span class="menu-title">Water Level Data</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/emergency">
                <span class="menu-title">Emergency Contacts</span>
                <i class="mdi mdi-deskphone menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/guide">
                <span class="menu-title">To-do During Flood</span>
                <i class="mdi mdi-television-guide menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewownupdates">
                <span class="menu-title">View My Own Posts</span>
                <i class="mdi mdi-comment-account-outline menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if($errors->any())
                <h6 class="alert alert-danger">{{$errors->first()}}</h6>
                @endif

          @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                <form action="{{ url('editandupdate/'.$values->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="form-group mb-3">
                <h5 class="card-title">New Picture</h5>
                <div>
                <img id="output" src="" width="500" height="500" onerror="this.onerror=null;this.src='{{asset ('/logos/wafi2.png')}}';">
                <br>
                <input name="file" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                </div>	
                        </div>
                        <div class ="form-group">
                        <label for="">Title</label>
						<textarea
							id="text" 
							cols="40" 
							rows="2" 
							name="title"
                            class="form-control" 
							placeholder="Title of the content">{{$values->title}}</textarea>
						</div>
                        <div class ="form-group">
                        <label for="">Post news here</label>
						<textarea
								id="text"
								cols="40" 
								rows="4" 
								name="image_text" 
                                class="form-control"
								placeholder="Post news here ...">{{$values->image_text}}</textarea>
							</div>


  	<div>                    
    <button type="reset" class="btn btn-outline-warning btn-icon-text"><i class="mdi mdi-reload btn-icon-prepend"></i> Reset </button>
    <button type="submit" class="btn btn-outline-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend"></i> Post </button>
  	</div>
  </form>
</div>
</div>
</div>
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="form-group mb-3">
                            <h5 class="card-title">Current Picture Stored in Post</h5>
                            <img src="{{ asset('images-news/'.$values->image) }}">
                        </div>
                  </div>
                </div>
              </div>
</div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Developed by Abdul Wafi Bin Jailani @ Universiti Tenaga Nasional</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  @include("admin.adminjs")
  </body>
  </html>
</x-app-layout>