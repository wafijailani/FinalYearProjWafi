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
          <h3>View Latest News</h3>
          <p><b>Updated every 5 minutes (Source : Bernama)</b></p>
  <div class="row g-4 mt-1">
  @forelse($values as $value)
  <div class="col-lg-3">
      <div class="card shadow">
        <a href="value/{{ $value->id }}">
          <img src="{{$value->PictureLink}}" class="card-img-top img-fluid">
        </a>
        <div class="card-body">
        <a href="value/{{ $value->id }}">
          <p class="btn btn-success rounded-pill btn-sm">{{ $value->Title }}</p>
        </a>
          <p class="text-secondary">{{ Str::limit($value->News, 100) }}</p>
        </div>
      </div>

      </div>
      @empty
          <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
      @endforelse
          {{$values->links()}}
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

