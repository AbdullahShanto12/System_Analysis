<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safeway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Crime Stats
$crimeStats = [];
$result = $conn->query("SELECT area, incidents FROM crime_stats");
while ($row = $result->fetch_assoc()) {
    $crimeStats[] = $row;
}

// Safety Distribution
$safetyData = [];
$result = $conn->query("SELECT label, value FROM safety_distribution");
while ($row = $result->fetch_assoc()) {
    $safetyData[] = $row;
}

// Safety Checks
$safetyChecks = [];
$result = $conn->query("SELECT day, checks FROM safety_checks");
while ($row = $result->fetch_assoc()) {
    $safetyChecks[] = $row;
}

// Feature Usage
$featureUsage = [];
$result = $conn->query("SELECT feature, score FROM feature_usage");
while ($row = $result->fetch_assoc()) {
    $featureUsage[] = $row;
}

// Crime Type Trends
$labels = [];
$datasets = [
    ['label' => 'Theft', 'data' => [], 'borderColor' => '#e74c3c', 'fill' => false],
    ['label' => 'Harassment', 'data' => [], 'borderColor' => '#f39c12', 'fill' => false],
    ['label' => 'Assault', 'data' => [], 'borderColor' => '#8e44ad', 'fill' => false],
    ['label' => 'Robbery', 'data' => [], 'borderColor' => '#3498db', 'fill' => false]
];
$result = $conn->query("SELECT * FROM crime_type_trends ORDER BY id");
while ($row = $result->fetch_assoc()) {
    $labels[] = $row['week'];
    $datasets[0]['data'][] = (int)$row['theft'];
    $datasets[1]['data'][] = (int)$row['harassment'];
    $datasets[2]['data'][] = (int)$row['assault'];
    $datasets[3]['data'][] = (int)$row['robbery'];
}
$crimeTypes = ['labels' => $labels, 'datasets' => $datasets];

// Emergency Response
$responseData = [];
$result = $conn->query("SELECT area, time FROM emergency_response");
while ($row = $result->fetch_assoc()) {
    $responseData[] = $row;
}

// Notification Engagement
$notifEngage = ['labels' => [], 'datasets' => [
    ['label' => 'Viewed', 'data' => [], 'backgroundColor' => '#28a745'],
    ['label' => 'Clicked', 'data' => [], 'backgroundColor' => '#17a2b8'],
    ['label' => 'Dismissed', 'data' => [], 'backgroundColor' => '#dc3545']
]];
$result = $conn->query("SELECT type, viewed, clicked, dismissed FROM notification_engagement");
while ($row = $result->fetch_assoc()) {
    $notifEngage['labels'][] = $row['type'];
    $notifEngage['datasets'][0]['data'][] = (int)$row['viewed'];
    $notifEngage['datasets'][1]['data'][] = (int)$row['clicked'];
    $notifEngage['datasets'][2]['data'][] = (int)$row['dismissed'];
}

// Feedback Bubble
$bubbleData = [];
$result = $conn->query("SELECT label, feedback_pos, safety_score, traffic_size FROM feedback_bubble");
while ($row = $result->fetch_assoc()) {
    $bubbleData[] = [
        'label' => $row['label'],
        'data' => [[
            'x' => (int)$row['feedback_pos'],
            'y' => (int)$row['safety_score'],
            'r' => (float)$row['traffic_size'] * 30 // scale up bubble size
        ]],
        'backgroundColor' => 'rgba(' . rand(0,255) . ',' . rand(0,255) . ',' . rand(0,255) . ',0.6)'
    ];
    
    
}



// =============================
// Output all data in one payload
// =============================
header('Content-Type: application/json');
echo json_encode([
    'crimeStats' => $crimeStats,
    'safetyData' => $safetyData,
    'safetyChecks' => $safetyChecks,
    'featureUsage' => $featureUsage,
    'crimeTypes' => $crimeTypes,
    'responseData' => $responseData,
    'notifEngage' => $notifEngage,
    'bubbleData' => $bubbleData
]);






?>


