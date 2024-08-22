<?php
// Database credentials ###CHANGE HERE
$host = 'localhost';
$dbname = 'fit2104_a3_lab4_group10';
$username = 'admin';
$password = 'admin';

// Create a DBH instance
global $dbh;
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
