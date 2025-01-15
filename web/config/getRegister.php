<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database credentials
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "1234"; // Your MySQL password
$dbname = "fb_tool"; // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all records from the 'register' table
$sql = "SELECT id, username, email, password FROM register";
$result = $conn->query($sql);

// Check if records are found
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Username: " . $row["username"]. " - Email: " . $row["email"]. " - Password: " . $row["password"]. "<br>";
    }
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>
