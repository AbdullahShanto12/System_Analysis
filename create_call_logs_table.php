<?php
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
    
    // Create call_logs table
    $sql = "CREATE TABLE IF NOT EXISTS call_logs (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        scheduled_time DATETIME NOT NULL,
        status ENUM('pending', 'completed', 'failed') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table call_logs created successfully";
    } else {
        throw new Exception("Error creating table: " . $conn->error);
    }
    
    $conn->close();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 