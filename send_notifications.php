<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Send Safety Notifications - SafeWay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font & AdminLTE CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <style>
    .notification-form {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .form-section-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .info-panel {
      margin-top: 20px;
      background: #f1f1f1;
      padding: 15px;
      border-left: 5px solid #007bff;
      border-radius: 10px;
    }
    .info-panel h5 {
      font-weight: 600;
    }
    .example-alert {
      background: #fff3cd;
      padding: 10px;
      border-left: 4px solid #ffc107;
      margin-bottom: 15px;
      border-radius: 5px;
    }
    .example-alert i {
      margin-right: 5px;
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
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
          <li class="nav-item"><a href="location_search.php" class="nav-link"><i class="nav-icon fas fa-map-marker-alt"></i><p>Basic Location Search</p></a></li>
          <li class="nav-item"><a href="map_explore.php" class="nav-link"><i class="nav-icon fas fa-map"></i><p>Map Exploration</p></a></li>
          <li class="nav-item"><a href="safety_ratings.php" class="nav-link"><i class="nav-icon fas fa-eye"></i><p>Visual Safety Ratings</p></a></li>
          <li class="nav-item"><a href="check_safety.php" class="nav-link"><i class="nav-icon fas fa-shield-alt"></i><p>Check Before Going Out</p></a></li>
          <li class="nav-item"><a href="identify_routes.php" class="nav-link"><i class="nav-icon fas fa-route"></i><p>Identifying Safer Routes</p></a></li>
          <li class="nav-item"><a href="understand_factors.php" class="nav-link"><i class="nav-icon fas fa-info-circle"></i><p>Understanding Safety Factors</p></a></li>
          <li class="nav-item"><a href="legend_info.php" class="nav-link"><i class="nav-icon fas fa-map-signs"></i><p>Using the Legend</p></a></li>
          <li class="nav-item"><a href="send_notifications.php" class="nav-link active"><i class="nav-icon fas fa-bell"></i><p>Send Notifications</p></a></li>
          <li class="nav-item"><a href="emergency_calls.php" class="nav-link"><i class="nav-icon fas fa-phone-alt"></i><p>Emergency Calls</p></a></li>
          <li class="nav-item"><a href="login.html" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>

        </ul>
      </nav>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="content-wrapper p-3">
    <div class="container-fluid">
      <h2>Send Safety Notifications</h2>
      <p class="mb-4">Alert nearby users about safety hazards, disruptions, or real-time updates with precision and clarity.</p>

      <div class="notification-form">
        <form action="send_notification_handler.php" method="POST">
          <!-- Notification Title -->
          <div class="form-group">
            <label for="title">Notification Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Incident at Central Park" required>
          </div>

          <!-- Message Content -->
          <div class="form-group">
            <label for="message">Message Content</label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="e.g. Avoid the northern section of the park due to reported suspicious activity." required></textarea>
          </div>

          <!-- Target Location -->
          <div class="form-group">
            <label for="location">Target Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="e.g. Brooklyn, NY or 11201" required>
          </div>

          <!-- Alert Category -->
          <div class="form-group">
            <label for="category">Alert Category</label>
            <select class="form-control" id="category" name="category">
              <option value="crime">🚨 Crime or Suspicious Activity</option>
              <option value="weather">🌧 Weather or Environmental</option>
              <option value="traffic">🚗 Traffic or Road Hazard</option>
              <option value="general">ℹ️ General Safety Update</option>
              <option value="emergency">❗ Emergency Alert</option>
            </select>
          </div>

          <!-- Urgency Level -->
          <div class="form-group">
            <label for="urgency">Urgency Level</label>
            <select class="form-control" id="urgency" name="urgency">
              <option value="low">Low</option>
              <option value="medium">Medium</option>
              <option value="high">High</option>
              <option value="critical">Critical</option>
            </select>
          </div>

          <!-- Optional Link -->
          <div class="form-group">
            <label for="link">Optional Link</label>
            <input type="url" class="form-control" id="link" name="link" placeholder="e.g. https://news.example.com/update123">
          </div>

          <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-paper-plane"></i> Send Notification</button>
        </form>
      </div>

      <!-- Additional Features Section -->
      <div class="info-panel mt-5">
        <h5>🔔 Smart Notification Features</h5>
        <ul>
          <li><strong>Location-Based Targeting:</strong> Automatically suggests nearby users based on geo-fencing.</li>
          <li><strong>Priority Sorting:</strong> Notifications are auto-sorted for users based on urgency level.</li>
          <li><strong>SMS & App Push Sync:</strong> Sends both SMS and in-app alert for critical urgency.</li>
          <li><strong>Alert History Tracker:</strong> View sent alerts and their responses in the admin dashboard.</li>
          <li><strong>Auto-Expire:</strong> Set expiry for temporary hazards (e.g., construction or weather).</li>
          <li><strong>Real-Time Feedback:</strong> Users can mark alerts as helpful or request clarification.</li>
          <li><strong>Category Icons:</strong> Visual icons and badges help quickly identify alert types on user interfaces.</li>
        </ul>
      </div>

      <!-- Example Alerts -->
      <div class="mt-4">
        <div class="example-alert">
          <i class="fas fa-bolt text-warning"></i>
          <strong>⚠️ Weather Alert:</strong> Thunderstorm warning for Downtown area till 6 PM. Avoid open spaces.
        </div>
        <div class="example-alert">
          <i class="fas fa-road text-danger"></i>
          <strong>🚧 Roadblock:</strong> Construction at Elm Street blocking 3rd Avenue. Expect delays.
        </div>
        <div class="example-alert">
          <i class="fas fa-shield-alt text-danger"></i>
          <strong>🔴 Suspicious Activity:</strong> Reports of theft near Central Plaza. Stay alert.
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
