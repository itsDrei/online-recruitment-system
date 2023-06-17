<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from create_status table
$query = "SELECT * FROM create_status";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    while ($status = mysqli_fetch_array($query_run)) {
        // Display each status name
        echo $status['status_'] . "<br>";
    }
} else {
    echo "No statuses found.";
}
?>
