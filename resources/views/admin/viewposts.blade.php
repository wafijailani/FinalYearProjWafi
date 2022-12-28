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
              <a class="nav-link" href="/viewusers">
                <span class="menu-title">View Users</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewuserssuspend">
                <span class="menu-title">View Suspended Users</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/viewposts">
                <span class="menu-title">View Posts</span>
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
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">View Users Posts</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Picture</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>User's Name</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach($values as $value)
                          <td><img style="width: 400px; height: 400px" class="rounded" src="{{ asset('images-news/'.$value->image) }}"></td>
                          <td>{{$value->title}}</td>
                          <td>{{$value->image_text}}</td>
                          <td>{{$value->name}}</td>
                          <td><a href="" class="btn btn-danger btn-sm">Delete Post</a></td>
                        </tr>
                          @endforeach
                      </tbody>
                    </table>
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







