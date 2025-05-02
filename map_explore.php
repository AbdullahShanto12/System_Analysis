<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map Exploration - SafeWay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- AdminLTE & Plugins -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>

    <style>
        #map {
            height: 650px;
            width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .popup-table {
            width: 100%;
            font-size: 13px;
            border-collapse: collapse;
        }

        .popup-table th {
            background-color: #f4f4f4;
            padding: 6px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .popup-table td {
            padding: 6px;
            border-bottom: 1px solid #eee;
        }

        .leaflet-popup-content {
            min-width: 250px;
        }

        #search-container {
        margin: 20px 0;
        display: flex;
        justify-content: center;
    }

    #search-input {
        width: 300px;
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    #search-button {
        padding: 8px 16px;
        margin-left: 8px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    #search-button:hover {
        background-color: #0056b3;
    }

    .leaflet-popup-content {
        min-width: 250px;
    }



    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
            <li class="nav-item d-none d-sm-inline-block"><a href="dashboard.php" class="nav-link">Home</a></li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="dashboard.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="SafeWay Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">SafeWay</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
                    <li class="nav-item"><a href="location_search.php" class="nav-link"><i class="nav-icon fas fa-map-marker-alt"></i><p>Basic Location Search</p></a></li>
                    <li class="nav-item"><a href="map_explore.php" class="nav-link active"><i class="nav-icon fas fa-map"></i><p>Map Exploration</p></a></li>
                    <li class="nav-item"><a href="safety_ratings.php" class="nav-link"><i class="nav-icon fas fa-eye"></i><p>Visual Safety Ratings</p></a></li>
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


    <div id="search-container">
    <input type="text" id="search-input" placeholder="Search a place (e.g. Gulshan 2)">
    <button id="search-button">Search</button>
</div>



    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h2>Map Exploration</h2>
                <p class="text-muted">Explore safety data on the map. Click on markers for more details.</p>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div id="map"></div>
            </div>
        </section>
    </div>
</div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>











<script>
    const map = L.map('map').setView([23.8103, 90.4125], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const safetyData = [
        {
            name: "Gulshan 2",
            coords: [23.7916, 90.4152],
            level: "High",
            patrolling: "Frequent",
            streetLighting: "Excellent",
            incidentReports: "Low",
            womenHelpline: "Active Booth",
            transportAccess: "High (CNG, ride-sharing)",
            description: "Upscale diplomatic area with tight security",
            color: "green"
        },
        {
            name: "Mirpur 10",
            coords: [23.8065, 90.3681],
            level: "Moderate",
            patrolling: "Moderate",
            streetLighting: "Adequate",
            incidentReports: "Occasional petty theft",
            womenHelpline: "Nearby police box",
            transportAccess: "High (metro, buses)",
            description: "Busy area, safe in day, stay alert at night",
            color: "orange"
        },


        {
            name: "Uttara ",
            coords: [23.8759, 90.3795],
            level: "High",
            patrolling: "Frequent",
            streetLighting: "Excellent",
            incidentReports: "Low",
            womenHelpline: "Active Booth",
            transportAccess: "High (CNG, ride-sharing)",
            description: "Upscale diplomatic area with tight security",
            color: "green"
        },
        {
            name: "Khilkhet",
            coords: [23.8311, 90.4243],
            level: "Moderate",
            patrolling: "Moderate",
            streetLighting: "Adequate",
            incidentReports: "Occasional petty theft",
            womenHelpline: "Nearby police box",
            transportAccess: "High (metro, buses)",
            description: "Busy area, safe in day, stay alert at night",
            color: "orange"
        },
        {
            name: "Farmgate",
            coords: [23.7574, 90.3911],
            level: "Moderate",
            patrolling: "Moderate",
            streetLighting: "Average",
            incidentReports: "Pickpocketing in crowds",
            womenHelpline: "Moderate response",
            transportAccess: "Very High",
            description: "Congested but central; crowded areas require alertness",
            color: "orange"
        },
        {
            name: "Moghbazar",
            coords: [23.7415, 90.4062],
            level: "Low",
            patrolling: "Low",
            streetLighting: "Poor",
            incidentReports: "Harassment reported",
            womenHelpline: "Weak presence",
            transportAccess: "Moderate",
            description: "Some alleys unsafe, avoid walking alone late night",
            color: "red"
        },
        {
            name: "Dhanmondi 27",
            coords: [23.7464, 90.3732],
            level: "High",
            patrolling: "High",
            streetLighting: "Good",
            incidentReports: "Minimal",
            womenHelpline: "Active",
            transportAccess: "Good",
            description: "Well-regulated residential & educational zone",
            color: "green"
        },
        {
            name: "Mohakhali Bus Terminal",
            coords: [23.7775, 90.4028],
            level: "Low",
            patrolling: "Low",
            streetLighting: "Dim",
            incidentReports: "Frequent scams",
            womenHelpline: "Scattered presence",
            transportAccess: "Very High",
            description: "Major transit hub; crowded and chaotic",
            color: "red"
        },
        {
            name: "Banani",
            coords: [23.7925, 90.4043],
            level: "Moderate",
            patrolling: "Regular",
            streetLighting: "Satisfactory",
            incidentReports: "Low after midnight",
            womenHelpline: "Nearby police patrol",
            transportAccess: "Good",
            description: "Mixed residential and nightlife area",
            color: "orange"
        },
        
        // ... (other locations remain the same)
    ];

    const markers = [];

    safetyData.forEach(location => {
        const popupContent = `
            <table class="popup-table">
                <tr><th colspan="2">${location.name}</th></tr>
                <tr><td><strong>Safety Level:</strong></td><td>${location.level}</td></tr>
                <tr><td><strong>Police Patrolling:</strong></td><td>${location.patrolling}</td></tr>
                <tr><td><strong>Street Lighting:</strong></td><td>${location.streetLighting}</td></tr>
                <tr><td><strong>Incident Reports:</strong></td><td>${location.incidentReports}</td></tr>
                <tr><td><strong>Women Help Support:</strong></td><td>${location.womenHelpline}</td></tr>
                <tr><td><strong>Public Transport Access:</strong></td><td>${location.transportAccess}</td></tr>
                <tr><td><strong>General Notes:</strong></td><td>${location.description}</td></tr>
            </table>
        `;

        const marker = L.circleMarker(location.coords, {
            radius: 8,
            color: location.color,
            fillColor: location.color,
            fillOpacity: 0.8
        }).addTo(map).bindPopup(popupContent);

        markers.push({
            name: location.name.toLowerCase(),
            marker: marker,
            popup: popupContent,
            location: location
        });
    });

    document.getElementById("search-button").addEventListener("click", () => {
        const query = document.getElementById("search-input").value.toLowerCase().trim();
        const results = markers.filter(item => item.name.includes(query));

        if (results.length > 0) {
            const result = results[0];
            map.setView(result.marker.getLatLng(), 15);
            result.marker.openPopup();
        } else {
            alert("Place not found. Try typing part of the name like 'Gulshan', 'Mirpur', etc.");
        }
    });
</script>



</body>
</html>
