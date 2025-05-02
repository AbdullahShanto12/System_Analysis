<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Visual Safety Ratings - SafeWay</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <!-- Custom CSS -->
  <style>
    #map {
      height: 550px;
      width: 100%;
    }
    .legend {
      background: white;
      padding: 10px;
      line-height: 18px;
      color: #333;
    }
    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin-right: 8px;
      opacity: 0.7;
    }
    .table-container {
      margin-top: 20px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
      <li class="nav-item d-none d-sm-inline-block"><a href="#" class="nav-link">Home</a></li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">SafeWay</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
          <li class="nav-item"><a href="location_search.php" class="nav-link"><i class="nav-icon fas fa-map-marker-alt"></i><p>Basic Location Search</p></a></li>
          <li class="nav-item"><a href="map_explore.php" class="nav-link"><i class="nav-icon fas fa-map"></i><p>Map Exploration</p></a></li>
          <li class="nav-item"><a href="safety_ratings.php" class="nav-link active"><i class="nav-icon fas fa-eye"></i><p>Visual Safety Ratings</p></a></li>
          <li class="nav-item"><a href="check_safety.php" class="nav-link"><i class="nav-icon fas fa-shield-alt"></i><p>Check Before Going Out</p></a></li>
          <li class="nav-item"><a href="identify_routes.php" class="nav-link"><i class="nav-icon fas fa-route"></i><p>Identifying Safer Routes</p></a></li>
          <li class="nav-item"><a href="understand_factors.php" class="nav-link"><i class="nav-icon fas fa-info-circle"></i><p>Understanding Safety Factors</p></a></li>
          <li class="nav-item"><a href="legend_info.php" class="nav-link"><i class="nav-icon fas fa-map-signs"></i><p>Using the Legend</p></a></li>
          <li class="nav-item"><a href="send_notifications.php" class="nav-link"><i class="nav-icon fas fa-bell"></i><p>Send Notifications</p></a></li>
          <li class="nav-item"><a href="emergency_calls.php" class="nav-link "><i class="nav-icon fas fa-phone-alt"></i><p>Emergency Calls</p></a></li>
          <li class="nav-item"><a href="login.html" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>

        </ul>
      </nav>
    </div>
  </aside>

<!-- Content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Visual Interpretation of Safety Ratings</h3>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          
          <!-- Detailed Safety Ratings Table -->
          <div class="table-container">
            <h5 class="mt-4">Detailed Safety Ratings Table</h5>
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Location</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Area Type</th>
                  <th>Reported Incidents</th>
                  <th>Safety Rating</th>
                  <th>Notes</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>Gulshan</td><td>23.7925</td><td>90.4078</td><td>Residential</td><td>3</td><td>High</td><td>Well-lit, security patrols</td></tr>
                <tr><td>Mirpur</td><td>23.8041</td><td>90.3665</td><td>Mixed</td><td>10</td><td>Medium</td><td>Moderate activity at night</td></tr>
                <tr><td>Uttara</td><td>23.8759</td><td>90.3795</td><td>Residential</td><td>4</td><td>High</td><td>Safe and monitored</td></tr>
                <tr><td>Farmgate</td><td>23.7568</td><td>90.3885</td><td>Commercial</td><td>15</td><td>Low</td><td>High crowd density</td></tr>
                <tr><td>Dhanmondi</td><td>23.7461</td><td>90.3748</td><td>Mixed</td><td>6</td><td>Medium</td><td>Some isolated areas</td></tr>
                <tr><td>Old Dhaka</td><td>23.7099</td><td>90.4071</td><td>Dense Residential</td><td>18</td><td>Low</td><td>Poor street lighting</td></tr>
                <tr><td>Banani</td><td>23.7936</td><td>90.4007</td><td>Commercial</td><td>5</td><td>Medium</td><td>Generally safe, but avoid late hours</td></tr>
              </tbody>
            </table>
          </div>

          <!-- Map -->
          <div id="map" class="mt-4"></div>

        </div>
      </div>
    </div>
  </div>
</div>






</div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
  const map = L.map('map').setView([23.8103, 90.4125], 12); // Dhaka center

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  const locations = [
    { lat: 23.7925, lng: 90.4078, rating: 'high', name: 'Gulshan' },
    { lat: 23.8041, lng: 90.3665, rating: 'medium', name: 'Mirpur' },
    { lat: 23.8759, lng: 90.3795, rating: 'high', name: 'Uttara' },
    { lat: 23.7568, lng: 90.3885, rating: 'low', name: 'Farmgate' },
    { lat: 23.7461, lng: 90.3748, rating: 'medium', name: 'Dhanmondi' },
    { lat: 23.7099, lng: 90.4071, rating: 'low', name: 'Old Dhaka' },
    { lat: 23.7936, lng: 90.4007, rating: 'medium', name: 'Banani' }
  ];

  function getColor(rating) {
    return rating === 'high' ? 'green' :
           rating === 'medium' ? 'orange' :
           'red';
  }

  locations.forEach(loc => {
    L.circleMarker([loc.lat, loc.lng], {
      radius: 10,
      fillColor: getColor(loc.rating),
      color: "#fff",
      weight: 1,
      opacity: 1,
      fillOpacity: 0.7
    }).bindPopup(`<b>${loc.name}</b><br>Safety: ${loc.rating.toUpperCase()}`).addTo(map);
  });

  const legend = L.control({position: 'bottomright'});
  legend.onAdd = function () {
    const div = L.DomUtil.create('div', 'legend');
    div.innerHTML = '<strong>Safety Levels</strong><br>';
    div.innerHTML += '<i style="background:green"></i> High<br>';
    div.innerHTML += '<i style="background:orange"></i> Medium<br>';
    div.innerHTML += '<i style="background:red"></i> Low<br>';
    return div;
  };
  legend.addTo(map);
</script>

</body>
</html>
