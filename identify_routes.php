<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Identify Safer Routes - SafeWay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font & AdminLTE -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

  <style>
    #map {
      height: 500px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    .controls {
      padding: 20px;
    }
    .form-control, .btn {
      margin-bottom: 10px;
    }
    .form-section {
      background: #f4f6f9;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-section h4 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
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
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
          <li class="nav-item"><a href="location_search.php" class="nav-link"><i class="nav-icon fas fa-map-marker-alt"></i><p>Basic Location Search</p></a></li>
          <li class="nav-item"><a href="map_explore.php" class="nav-link"><i class="nav-icon fas fa-map"></i><p>Map Exploration</p></a></li>
          <li class="nav-item"><a href="safety_ratings.php" class="nav-link"><i class="nav-icon fas fa-eye"></i><p>Visual Safety Ratings</p></a></li>
          <li class="nav-item"><a href="check_safety.php" class="nav-link"><i class="nav-icon fas fa-shield-alt"></i><p>Check Before Going Out</p></a></li>
          <li class="nav-item"><a href="identify_routes.php" class="nav-link active"><i class="nav-icon fas fa-route"></i><p>Identifying Safer Routes</p></a></li>
          <li class="nav-item"><a href="understand_factors.php" class="nav-link"><i class="nav-icon fas fa-info-circle"></i><p>Understanding Safety Factors</p></a></li>
          <li class="nav-item"><a href="legend_info.php" class="nav-link"><i class="nav-icon fas fa-map-signs"></i><p>Using the Legend</p></a></li>
          <li class="nav-item"><a href="send_notifications.php" class="nav-link"><i class="nav-icon fas fa-bell"></i><p>Send Notifications</p></a></li>
          <li class="nav-item"><a href="emergency_calls.php" class="nav-link "><i class="nav-icon fas fa-phone-alt"></i><p>Emergency Calls</p></a></li>
          <li class="nav-item"><a href="login.html" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>

        </ul>
      </nav>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="content-wrapper p-3">
    <div class="container-fluid">
      <h2>Identifying Safer Routes in Dhaka</h2>
      <div class="form-section">
        <h4>Route Preferences</h4>
        <div class="row">
          <div class="col-md-6">
            <input type="text" id="start" class="form-control" placeholder="Start Location (e.g., Dhanmondi)" />
          </div>
          <div class="col-md-6">
            <input type="text" id="end" class="form-control" placeholder="End Location (e.g., Gulshan)" />
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-4">
            <select id="timeOfDay" class="form-control">
              <option value="day">Day</option>
              <option value="night">Night</option>
            </select>
          </div>
          <div class="col-md-4">
            <select id="mode" class="form-control">
              <option value="foot">Walking</option>
              <option value="cycling">Cycling</option>
              <option value="car">Driving</option>
            </select>
          </div>
          <div class="col-md-4">
            <select id="companion" class="form-control">
              <option value="alone">Alone</option>
              <option value="group">With Companion(s)</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary mt-3" onclick="findRoute()">Find Safe Route</button>
      </div>
      <div id="map" class="mt-4"></div>
    </div>
  </div>
</div>

<!-- JS Libraries -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.min.js"></script>

<script>
  const map = L.map('map').setView([23.8103, 90.4125], 13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  let control;

  function findRoute() {
    const start = document.getElementById('start').value;
    const end = document.getElementById('end').value;

    if (!start || !end) return alert("Please enter both start and end locations.");

    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(start)}`)
      .then(res => res.json())
      .then(startData => {
        if (!startData.length) throw new Error("Start location not found");
        const startCoords = [parseFloat(startData[0].lat), parseFloat(startData[0].lon)];

        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(end)}`)
          .then(res => res.json())
          .then(endData => {
            if (!endData.length) throw new Error("End location not found");
            const endCoords = [parseFloat(endData[0].lat), parseFloat(endData[0].lon)];

            if (control) map.removeControl(control);

            control = L.Routing.control({
              waypoints: [
                L.latLng(...startCoords),
                L.latLng(...endCoords)
              ],
              lineOptions: {
                styles: [{color: 'blue', weight: 6}]
              },
              createMarker: (i, wp) => L.marker(wp.latLng).bindPopup(i === 0 ? "Start" : "End"),
              routeWhileDragging: false
            }).addTo(map);
          });
      })
      .catch(err => alert(err.message));
  }
</script>
</body>
</html>
