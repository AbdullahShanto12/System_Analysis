<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Using the Map Legend - SafeWay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font & AdminLTE CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <style>
        .feature-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .feature-title {
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.3rem;
            color: #343a40;
        }
        .legend-color {
            display: inline-block;
            width: 25px;
            height: 25px;
            border-radius: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
        }
        .icon-legend {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .icon-legend i {
            font-size: 20px;
            margin-right: 10px;
        }
        .legend-description {
            margin-left: 35px;
            font-size: 0.95rem;
            color: #555;
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
                    <li class="nav-item"><a href="legend_info.php" class="nav-link active"><i class="nav-icon fas fa-map-signs"></i><p>Using the Legend</p></a></li>
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
            <h2>Using the Map Legend</h2>
            <p class="mb-4">Learn how to interpret map visuals to make informed and safe travel decisions.</p>

            <div class="feature-card">
                <div class="feature-title">1. Color Codes for Area Safety</div>
                <div class="icon-legend"><span class="legend-color" style="background-color: green;"></span> Safe Area (Score 70+)</div>
                <div class="icon-legend"><span class="legend-color" style="background-color: orange;"></span> Moderate Risk (Score 41–69)</div>
                <div class="icon-legend"><span class="legend-color" style="background-color: red;"></span> High Risk Zone (Score ≤ 40)</div>
                <p class="legend-description">These colors quickly tell you the level of caution needed in each area. Green is safest, red signals high alert.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title">2. Route Colors</div>
                <div class="icon-legend"><span class="legend-color" style="background-color: blue;"></span> Recommended Safe Route</div>
                <div class="icon-legend"><span class="legend-color" style="background-color: gray;"></span> Alternate Route (Unrated)</div>
                <p class="legend-description">Follow blue for the safest paths. Gray routes are unexplored and might not be assessed.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title">3. Map Icons Explained</div>
                <div class="icon-legend"><i class="fas fa-shield-alt text-primary"></i> Police Station / Security Booth</div>
                <div class="icon-legend"><i class="fas fa-camera text-dark"></i> CCTV Coverage Area</div>
                <div class="icon-legend"><i class="fas fa-exclamation-triangle text-danger"></i> Recent Incident Reported</div>
                <div class="icon-legend"><i class="fas fa-umbrella text-info"></i> Weather Advisory Zone</div>
                <div class="icon-legend"><i class="fas fa-bus text-success"></i> Safe Public Transport Stop</div>
            </div>

            <div class="feature-card">
                <div class="feature-title">4. Map Layers</div>
                <p>Toggle map layers using the icon at the top-right to focus on specific data:</p>
                <ul>
                    <li>Incident Heatmap</li>
                    <li>Police & Security Presence</li>
                    <li>Lighting & Camera Zones</li>
                    <li>Transport Safety Scores</li>
                </ul>
            </div>

            <div class="feature-card">
                <div class="feature-title">5. Marker Details</div>
                <p>Click or tap on any map marker to access real-time reports, safety tips, and emergency contacts relevant to that location.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title">6. Custom Filters</div>
                <p>Use custom legend filters to highlight areas based on your safety preferences such as low-crime zones, night travel safety, or proximity to safe transport.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title">7. Safety Score Tooltip</div>
                <p>Hovering over an area reveals a tooltip with numeric safety scores, trends over the past week, and recommended actions.</p>
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
