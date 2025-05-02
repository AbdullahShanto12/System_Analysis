<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Understanding Safety Factors - SafeWay</title>
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
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .feature-title {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 1.3rem;
            color: #333;
        }

        .highlight {
            font-weight: bold;
            color: #007bff;
        }

        .feature-icon {
            color: #007bff;
            margin-right: 10px;
        }

        .content-wrapper {
            background: #fff;
        }

        h2 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href=""><i class="fas fa-bars"></i></a></li>
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
                    <li class="nav-item"><a href="understand_factors.php" class="nav-link active"><i class="nav-icon fas fa-info-circle"></i><p>Understanding Safety Factors</p></a></li>
                    <li class="nav-item"><a href="legend_info.php" class="nav-link"><i class="nav-icon fas fa-map-signs"></i><p>Using the Legend</p></a></li>
                    <li class="nav-item"><a href="send_notifications.php" class="nav-link"><i class="nav-icon fas fa-bell"></i><p>Send Notifications</p></a></li>
                    <li class="nav-item"><a href="emergency_calls.php" class="nav-link"><i class="nav-icon fas fa-phone-alt"></i><p>Emergency Calls</p></a></li>
                    <li class="nav-item"><a href="login.html" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="content-wrapper p-3">
        <div class="container-fluid">
            <h2>Understanding Safety Factors</h2>
            <p class="mb-4">Learn about the key elements that influence how safe or risky a route may be.</p>

            <!-- Existing and New Safety Factor Cards -->
            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-lightbulb feature-icon"></i>1. Lighting Conditions</div>
                <p>Well-lit streets reduce the chances of crime and help in identifying suspicious activities. Avoid dark alleys or poorly lit areas.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-users feature-icon"></i>2. Crowd Density</div>
                <p>Moderately crowded areas offer more safety. Too deserted or overly packed areas can both present risks.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-exclamation-triangle feature-icon"></i>3. Crime History</div>
                <p>Areas with a history of thefts, harassment, or other crimes are marked with a <span class="highlight">red or orange</span> safety rating on the map.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-video feature-icon"></i>4. Nearby Safety Infrastructure</div>
                <p>Presence of police stations, CCTV cameras, emergency booths, or security personnel increases safety.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-bus feature-icon"></i>5. Public Transport Quality</div>
                <p>Trustworthy, well-regulated public transport options (like buses with verified routes) improve route safety.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-bullhorn feature-icon"></i>6. Real-Time Reports</div>
                <p>Stay informed using recent community updates on suspicious activity or incidents submitted by users.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-moon feature-icon"></i>7. Time of Day</div>
                <p>Night-time increases vulnerability. Prefer day-time travel or stay in well-patrolled zones after dark.</p>
            </div>

            <!-- New Added Safety Factors -->
            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-road feature-icon"></i>8. Road Conditions</div>
                <p>Uneven, broken, or isolated roads can cause accidents or slow emergency responses. Safer routes are those with maintained pavements, pedestrian lanes, and visibility.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-dog feature-icon"></i>9. Presence of Stray Animals</div>
                <p>Unattended stray dogs or aggressive animals can pose a threat. Pay attention to user reports about such situations on routes.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-hands-helping feature-icon"></i>10. Community Engagement</div>
                <p>Active community members who report, help others, and watch out for each other create a naturally safer environment.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-cloud-showers-heavy feature-icon"></i>11. Environmental Hazards</div>
                <p>Flood-prone zones, construction areas, or regions with falling debris should be avoided. These natural or man-made hazards can amplify risks.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-hands feature-icon"></i>12. Availability of Help</div>
                <p>Shops, cafes, and open commercial places around provide quick access to help during distress. Lonely stretches may lack immediate aid.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-volume-up feature-icon"></i>13. Sound Environment</div>
                <p>Completely silent zones may feel unsafe. Balanced background activity (traffic, people) is more reassuring than eerie silence.</p>
            </div>

            <div class="feature-card">
                <div class="feature-title"><i class="fas fa-signal feature-icon"></i>14. Mobile Connectivity</div>
                <p>Ensure your phone has proper network access. Areas with weak signals can hinder emergency communication or tracking.</p>
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
