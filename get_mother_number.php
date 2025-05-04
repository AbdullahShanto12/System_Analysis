<?php
session_start();
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safeway";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User not logged in");
    }
    
    // Get mother's phone number
    $getMotherNumberQuery = "SELECT phone_number FROM trustednumbers 
                           WHERE user_id = ? AND LOWER(title) IN ('mother', 'mothers') 
                           LIMIT 1";
    $stmt = $conn->prepare($getMotherNumberQuery);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            'success' => true,
            'phoneNumber' => $row['phone_number']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No mother contact found'
        ]);
    }
    
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?> 