<?php
// Database configuration
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = "";     // default for XAMPP
$dbname = "safeway"; // make sure this database exists

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// Sanitize & validate input
$title     = htmlspecialchars(trim($_POST['title']));
$message   = htmlspecialchars(trim($_POST['message']));
$location  = htmlspecialchars(trim($_POST['location']));
$category  = htmlspecialchars(trim($_POST['category']));
$urgency   = htmlspecialchars(trim($_POST['urgency']));
$link      = isset($_POST['link']) ? htmlspecialchars(trim($_POST['link'])) : null;

// Timestamp
$timestamp = date("Y-m-d H:i:s");

// SQL to insert the notification
$sql = "INSERT INTO notifications (title, message, location, category, urgency, link, timestamp)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $title, $message, $location, $category, $urgency, $link, $timestamp);

if ($stmt->execute()) {
  echo "<script>alert('Notification sent successfully!'); window.location.href='send_notifications.php';</script>";

  // 🚀 Placeholder: Here you can call APIs for SMS, push, etc.
  // e.g., sendPushNotification($title, $message, $location);

} else {
  echo "<script>alert('Error sending notification: " . $stmt->error . "'); history.back();</script>";
}

$stmt->close();
$conn->close();
?>
