<?php
// Database credentials
$host = 'localhost';
$dbname = 'fit2104_a3_lab4_group10';
$username = 'admin';
$password = 'admin';

// Create a PDO instance
global $pdo;
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Close the PHP tag to ensure it's only responsible for connection logic
?>

