
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
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewupdates">
                <span class="menu-title">View Recent Updates</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/postupdates">
                <span class="menu-title">Post New Updates</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
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
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/guide">
                <span class="menu-title">To-do During Flood</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
		  @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
				<div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Post Updates</h4>
                    <form method="POST" action="{{ url('/storeupdates') }}" enctype="multipart/form-data" class="forms-sample">
                    @csrf  
					  <div>
						<img id="output" src="" width="500" height="400" class="form-control">
						<input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" class="form-control">
						</div>
					  <div class ="form-group">
						<textarea
							id="text" 
							cols="40" 
							rows="2" 
							name="title"
              class="form-control" 
							placeholder="Title of the content"></textarea>
						</div>
						<div class ="form-group">
						<textarea
								id="text"
								cols="40" 
								rows="4" 
								name="image_text" 
                class="form-control"
								placeholder="Post news here ..."></textarea>
							</div>
					  <button type="reset" name="upload"class="btn btn-gradient-primary me-2">Reset</button>
            <button type="submit" name="upload"class="btn btn-gradient-primary me-2">Post</button>
					</form>
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



