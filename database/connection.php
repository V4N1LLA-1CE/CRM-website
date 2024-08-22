<?php
// Database credentials
$host = 'localhost';
$dbname = 'demo-fit2104';
$username = 'admin';
$password = 'admin';

// Create a PDO instance
global $pdo;
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Close the PHP tag to ensure it's only responsible for connection logic
?>

