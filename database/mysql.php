<?php

// Database credentials
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root";
$password = "";
$database = "haystack_db"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, set charset to UTF-8
$conn->set_charset("utf8");

// Return the connection object
//return $conn;

?>
