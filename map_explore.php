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

    <!-- Leaflet & Plugins -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

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
            flex-wrap: wrap;
        }

        #search-input {
            width: 300px;
            padding: 8px 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        #search-button {
            padding: 8px 16px;
            margin-left: 8px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        #search-button:hover {
            background-color: #0056b3;
        }

        #filter-container {
            margin: 10px 0;
            text-align: center;
        }

        #filter-select {
            padding: 6px 12px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        #dark-mode-toggle {
            position: fixed; /* fixed instead of absolute for better UX */
            top: 70px;
            right: 20px;
            z-index: 1000;
            background: #fff;
            color: #333;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .dark-mode {
            background-color: #2c2c2c;
            color: #f4f4f4;
        }

        .dark-mode #map {
            filter: invert(90%) hue-rotate(180deg);
        }

        .legend {
            background: white;
            padding: 10px;
            line-height: 18px;
            color: #555;
            border-radius: 6px;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

        /* ✅ Fullscreen Button Styling */
        .leaflet-bar button {
            background: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
        }

        /* ✅ Clock Styling */
        .clock {
            background-color: #fff;
            padding: 6px 12px;
            font-weight: bold;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        /* ✅ Heatmap Toggle Styling */
        .leaflet-bar button {
            background-color: #fff;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
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

    <!-- Search & Filter -->
    <div id="search-container">
        <input type="text" id="search-input" placeholder="Search a place (e.g. Gulshan 2)">
        <button id="search-button">Search</button>
    </div>

    <div id="filter-container">
        <label for="filter-select">Filter by Safety Level:</label>
        <select id="filter-select">
            <option value="all">All</option>
            <option value="High">High</option>
            <option value="Moderate">Moderate</option>
            <option value="Low">Low</option>
        </select>
    </div>

    <!-- ✅ Dark Mode Toggle -->
    <button id="dark-mode-toggle">Toggle Dark Mode</button>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h2>Map Exploration</h2>
                <p class="text-muted">Explore safety data on the map. Click on markers for more details.</p>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div id="map"></div> <!-- ✅ All JS features like heatmap, fullscreen, etc. attach here -->
            </div>
        </section>
    </div>
</div>





<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Leaflet JS & Plugins -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
<script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
 
<script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>

<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>














<script>
const map = L.map('map').setView([23.8103, 90.4125], 12);

let light = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

let dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; OpenStreetMap contributors & CartoDB'
});

const markers = [];
let heat;

fetch("get_safety_zones.php")
    .then(response => response.json())
    .then(safetyData => {
        console.log("Fetched safety data:", safetyData);

        heat = L.heatLayer(safetyData.map(p => [...p.coords, 0.5]), {radius: 25});

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
    })
    .catch(error => console.error("Error loading safety data:", error));

// Dark Mode Toggle
const darkModeBtn = document.getElementById('dark-mode-toggle');
darkModeBtn.addEventListener('click', () => {
    if (map.hasLayer(light)) {
        map.removeLayer(light);
        dark.addTo(map);
        document.body.classList.add('dark-mode');
    } else {
        map.removeLayer(dark);
        light.addTo(map);
        document.body.classList.remove('dark-mode');
    }
});

// Geolocation Button
L.control.locate = function () {
    let control = L.control({position: 'topright'});
    control.onAdd = function () {
        let container = L.DomUtil.create('button', 'leaflet-bar');
        container.innerHTML = '<i class="fas fa-location-arrow"></i>';
        container.style.background = 'white';
        container.onclick = function () {
            navigator.geolocation.getCurrentPosition(function (position) {
                let latlng = [position.coords.latitude, position.coords.longitude];
                map.setView(latlng, 15);
                L.marker(latlng).addTo(map).bindPopup("You are here!").openPopup();
            });
        };
        return container;
    };
    return control;
};
L.control.locate().addTo(map);

// Heatmap Toggle
const heatToggle = L.control({position: 'topright'});
heatToggle.onAdd = function () {
    const div = L.DomUtil.create('div', 'leaflet-bar');
    const btn = document.createElement('button');
    btn.textContent = 'Toggle Heatmap';
    btn.style.padding = '5px';
    btn.onclick = () => {
        if (map.hasLayer(heat)) {
            map.removeLayer(heat);
        } else {
            heat.addTo(map);
        }
    };
    div.appendChild(btn);
    return div;
};
heatToggle.addTo(map);

// Legend
const legend = L.control({position: 'bottomright'});
legend.onAdd = function () {
    const div = L.DomUtil.create('div', 'legend');
    div.innerHTML += '<i style="background:green"></i> High<br>';
    div.innerHTML += '<i style="background:yellow"></i> Moderate<br>';
    div.innerHTML += '<i style="background:red"></i> Low<br>';
    return div;
};
legend.addTo(map);

// Real-Time Clock
const clockControl = L.control({position: 'bottomleft'});
clockControl.onAdd = function () {
    const div = L.DomUtil.create('div', 'clock');
    const updateClock = () => {
        const now = new Date();
        div.innerHTML = now.toLocaleTimeString();
    };
    setInterval(updateClock, 1000);
    updateClock();
    return div;
};
clockControl.addTo(map);

// Fullscreen Toggle
const fullscreenControl = L.control({position: 'topleft'});
fullscreenControl.onAdd = function () {
    const btn = L.DomUtil.create('button', 'leaflet-bar');
    btn.innerHTML = '<i class="fas fa-expand"></i>';
    btn.onclick = () => {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    };
    return btn;
};
fullscreenControl.addTo(map);
</script>





</body>
</html>













