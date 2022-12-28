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
          <h1>Emergency Contacts</h1>
    
    <h3>Please call these numbers during emergency and explain to them your situation. Do not panic. Follow these steps below.
    <br>
    1. Tell them your situation.<br>
    2. Pass them your phone number and house address.<br>
    3. Stay safe at where you are until backup comes.<br>
    
    <br><br>
    Malaysia Emergency Response Services 
    <a href="tel:999">999</a>
    <br>
    Tengku Ampuan Rahimah Hospital
    <a href="tel:03-3323 9478">0333239478</a> 
    <br>
    Kuala Langat City Council
    <a href="tel:0331822566">03-3182 2566</a> 
    <br>
    APM Control Room Kuala Lumpur
    <a href="tel:0362010503">03-62010503</a> 
    <br>
    PDRM Klang Selatan
    <a href="tel:0333722222">03-3372 2222</a>
    <br>
    Welfare Department
    <a href="tel:0333413703">03-3341 3703</a> 
    <br>
    Selangor Disaster Management Unit
    <a href="tel:0350350920">03-5035 0920</a> 
    <br>
    Civil Defence Force
    <a href="tel:0333710820">03-3371 0820</a> 
    <br>
    Klang City Council
    <a href="tel:0333748845">03-3374 8845</a>
    <br>
    </h3>

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