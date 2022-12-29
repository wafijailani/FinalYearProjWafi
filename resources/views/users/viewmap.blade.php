<?php
$con=mysqli_connect("localhost", "root", "","myfloodlaravel") or die("Cannot connect to
server.".mysqli_error($con));

// Fetch the marker info from the database
$result = $con->query("SELECT * FROM locations");

// Fetch the info-window data from the database
$result2 = $con->query("SELECT * FROM locations");
?>

<x-app-layout>
<!DOCTYPE html>
<html lang="en-US">
<head>
@include("admin.admincss")
<title>Google Maps Dynamic Marker Icons with Info Windows</title>
<meta charset="utf-8">
</head>
<script src="https://maps.googleapis.com/maps/api/js?key={{env ('GOOGLE_MAP_KEY')}}"></script>
<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '["'.$row['name'].'", '.$row['latitude'].', '.$row['longitude'].', "'.$row['icon'].'", "'.$row['value'].'"],';
            }
        }
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<h2><?php echo $row['name']; ?></h2>' +
                '<p><?php echo $row['info']; ?></p>' +
                '<p><?php echo $row['value']; ?> meters</p>' +'</div>'],
        <?php }
        }
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
			      icon: markers[i][3],
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(11);
        google.maps.event.removeListener(boundsListener);
    });

var legend = document.getElementById('mapLegend');
div= document.createElement('div');
div.innerHTML = '<span><img src="images/green-dot.png"> Normal Water Level </span>';
legend.appendChild(div);
var div = document.createElement('div');
div.innerHTML = '<span><img src="images/yellow-dot.png"> Alert Water Level </span>';
legend.appendChild(div);
var div = document.createElement('div');
div.innerHTML = '<span><img src="images/orange-dot.png"> Warning Water Level </span>';
legend.appendChild(div);
var div = document.createElement('div');
div.innerHTML = '<span><img src="images/red-dot.png"> Danger Water Level </span>';
legend.appendChild(div);
/* Push Legend to Right Top */
map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);

}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>

<style type="text/css">
#mapCanvas {
    width: 1500px;
    height: 650px;
    
}

#mapContainer{
    display : flex;
    justify-content : center;

}
#mapLegend {
  background: #fdfdfd;
  color: #3c4750;
  padding: 0 10px 0 10px;
  margin: 10px;
  font-weight: bold;
  filter: alpha(opacity=80);
  opacity: 0.8;
  border: 2px solid #000;
}
#mapLegend div {
  height: 50px;
  line-height: 25px;
  font-size: 1.2em;
}
#mapLegend div img {
  float: left;
  margin-right: 10px;
}

</style>
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
            <li class="nav-item">
              <a class="nav-link" href="/viewownupdates">
                <span class="menu-title">View My Own Updates</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
            <h2>Visualised Water Level Data on Map</h2>
                <div id="mapContainer">
                    <div id="mapCanvas"></div>
                    <div id="mapLegend">
                <h2>Legend</h2>
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
</body>
@include("admin.adminjs")
</html>
</x-app-layout>