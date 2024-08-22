<?php
// Include the connection file
include './database/connection.php';

// Create global var
global $dbh;

// Execute SQL query
$stmt = $dbh->prepare("SELECT * FROM `User`");
$stmt->execute();

// Fetch and display data
while ($row = $stmt->fetch()) {
    echo "ID: " . $row['id'] . " - Email: " . $row['email'] . " - Password: " . $row['password'] . " - Fullname " . $row['first_name'] . " " . $row['last_name'] . "<br>";
}

// Close the connection (optional as it closes automatically when script ends)
$pdo = null;
?>
