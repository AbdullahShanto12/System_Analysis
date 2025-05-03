<?php include 'connect.php'; ?>
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

            <!-- Safety Ratings Table -->
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
                <?php
                $sql = "SELECT * FROM safety_ratings";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['location']}</td>
                            <td>{$row['latitude']}</td>
                            <td>{$row['longitude']}</td>
                            <td>{$row['area_type']}</td>
                            <td>{$row['reported_incidents']}</td>
                            <td>{$row['safety_rating']}</td>
                            <td>{$row['notes']}</td>
                          </tr>";
                  }
                } else {
                  echo "<tr><td colspan='7'>No data found</td></tr>";
                }
                $conn->close();
                ?>
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
  const map = L.map('map').setView([23.8103, 90.4125], 12);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  function getColor(rating) {
    return rating === 'high' ? 'green' :
           rating === 'medium' ? 'orange' :
           'red';
  }

  fetch('get_safety_data.php')
    .then(res => res.json())
    .then(locations => {
      locations.forEach(loc => {
        L.circleMarker([loc.latitude, loc.longitude], {
          radius: 10,
          fillColor: getColor(loc.safety_rating.toLowerCase()),
          color: "#fff",
          weight: 1,
          opacity: 1,
          fillOpacity: 0.7
        }).bindPopup(`<b>${loc.location}</b><br>Safety: ${loc.safety_rating.toUpperCase()}`).addTo(map);
      });
    })
    .catch(error => console.error('Error loading data:', error));

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