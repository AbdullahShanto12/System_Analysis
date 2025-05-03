<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Emergency & Trusted Contacts - SafeWay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font & AdminLTE CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <style>
    .call-button {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
      transition: all 0.2s ease;
      cursor: pointer;
    }
    .call-button:hover {
      background-color: #e2e6ea;
    }
    .call-icon {
      font-size: 1.8rem;
      margin-right: 10px;
    }
    .qr-box {
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      text-align: center;
      padding: 15px;
    }
    .voice-note {
      font-style: italic;
      color: #555;
    }
    .section-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin-top: 30px;
      margin-bottom: 15px;
    }
    .info-box {
      background-color: #e9ecef;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .btn-panic {
      background-color: #dc3545;
      color: #fff;
      font-size: 1.2rem;
      padding: 15px;
      border: none;
      border-radius: 10px;
      width: 100%;
      margin-bottom: 15px;
    }
    .btn-panic:hover {
      background-color: #c82333;
    }
    .form-control {
      margin-bottom: 10px;
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
          <li class="nav-item"><a href="send_notifications.php" class="nav-link"><i class="nav-icon fas fa-bell"></i><p>Send Notifications</p></a></li>
          <li class="nav-item"><a href="emergency_calls.php" class="nav-link active"><i class="nav-icon fas fa-phone-alt"></i><p>Emergency Calls</p></a></li>
          <li class="nav-item"><a href="login.html" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>

        </ul>
      </nav>
    </div>
  </aside>


  
  <!-- Main Content -->
  <div class="content-wrapper p-3">
    <div class="container-fluid">
      <h2>Emergency & Trusted Calls</h2>
      <p>Reach help instantly — whether it's authorities or someone you trust.</p>

      <!-- Emergency Services -->
      <div class="section-title">Emergency Services</div>
      <div class="call-button bg-danger text-white" onclick="window.location.href='tel:999'">
        <div><i class="fas fa-shield-alt call-icon"></i> Call Police (999)</div>
        <i class="fas fa-phone"></i>
      </div>
      <div class="call-button bg-warning text-dark" onclick="window.location.href='tel:199'">
        <div><i class="fas fa-fire call-icon"></i> Call Fire Service (199)</div>
        <i class="fas fa-phone"></i>
      </div>
      <div class="call-button bg-info text-white" onclick="window.location.href='tel:16263'">
        <div><i class="fas fa-ambulance call-icon"></i> Call Health Help (16263)</div>
        <i class="fas fa-phone"></i>
      </div>

      <!-- Trusted Contacts -->
      <div class="section-title">Trusted Contacts</div>
      <div class="call-button" onclick="window.location.href='tel:+8801787654321'">
        <div><i class="fas fa-user-shield call-icon"></i> Call Mom</div>
        <i class="fas fa-phone text-success"></i>
      </div>
      <div class="call-button" onclick="window.location.href='tel:+8801912345678'">
        <div><i class="fas fa-user-shield call-icon"></i> Call Roommate</div>
        <i class="fas fa-phone text-success"></i>
      </div>

    <!-- Live Location Sharing -->
    <div class="card p-4">
      <div class="section-title">📍 Live Location Sharing</div>
      <p>Share your real-time location with emergency contacts to help them find you quickly.</p>
      <button class="btn btn-primary" onclick="shareLocation()">Share My Location</button>
    </div>

    <!-- Emergency Message Templates -->
    <div class="card p-4">
      <div class="section-title">✉️ Emergency Message Templates</div>
      <p>Quickly send pre-written messages during emergencies.</p>
      <button class="btn btn-secondary mb-2" onclick="sendEmergencyMessage('I need help. Please contact me ASAP.')">Send: I need help</button>
      <button class="btn btn-secondary" onclick="sendEmergencyMessage('I am safe. Just checking in.')">Send: I am safe</button>
    </div>

    <!-- Panic Button -->
    <div class="card p-4 text-center">
      <div class="section-title">🚨 Panic Button</div>
      <button class="btn-panic" onclick="activatePanicButton()"><i class="fas fa-exclamation-triangle"></i> Panic Button</button>
    </div>

    <!-- Medical ID Display -->
    <div class="card p-4">
      <div class="section-title">🩺 Medical ID</div>
      <p><strong>Name:</strong> John Doe</p>
      <p><strong>Blood Type:</strong> O+</p>
      <p><strong>Allergies:</strong> Penicillin</p>
      <p><strong>Medical Conditions:</strong> Asthma</p>
    </div>

    <!-- Voice Command Activation -->
    <div class="card p-4">
      <div class="section-title">🎤 Voice Command Support</div>
      <p class="voice-note">Say "<strong>SafeWay, call police</strong>" to initiate a call (Coming Soon)</p>
    </div>

    <!-- Emergency Call Scheduler -->
    <div class="card p-4">
      <div class="section-title">⏰ Emergency Call Scheduler</div>
      <label for="schedule-time" class="form-label">Set Time for Auto Check-in:</label>
      <input type="datetime-local" class="form-control mb-3" id="schedule-time">
      <button class="btn btn-success" onclick="scheduleCall()">Schedule Alert</button>
    </div>

    <!-- Satellite Communication Fallback -->
    <div class="card p-4">
      <div class="section-title">🛰️ Satellite Communication (Fallback)</div>
      <p>If there's no cellular signal, SafeWay will attempt to use available satellite APIs or fallback mechanisms for sending alerts. (Available in premium devices)</p>
      <button class="btn btn-dark" disabled>Activate Satellite SOS (Coming Soon)</button>
    </div>

    <!-- QR Code for Emergency Page -->
    <div class="card p-4 text-center">
      <div class="section-title">🔗 Quick Access QR (Backup)</div>
      <p>Scan this to access Emergency Panel from another device</p>
      <div class="qr-box">
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://yourdomain.com/emergency_calls.php&size=150x150" alt="QR Code">
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    // Share location using Geolocation API
    function shareLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          const lat = position.coords.latitude;
          const lon = position.coords.longitude;
          const message = `My current location: https://www.google.com/maps?q=${lat},${lon}`;
          alert("Location shared: " + message); // Replace with API logic
        }, function() {
          alert("Unable to access location. Please enable GPS.");
        });
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    // Send predefined emergency message
    function sendEmergencyMessage(message) {
      alert("Message sent: " + message); // Replace with messaging API
    }

    // Panic button logic
    function activatePanicButton() {
      alert("Panic Alert Activated! Notifying all trusted contacts...");
    }

    // Schedule emergency check-in
    function scheduleCall() {
      const scheduledTime = document.getElementById("schedule-time").value;
      if (scheduledTime) {
        alert("Emergency alert scheduled at: " + scheduledTime);
      } else {
        alert("Please select a valid date and time.");
      }
    }
  </script>
</body>
</html>