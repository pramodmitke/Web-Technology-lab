<?php
$servername = "localhost";
$username   = "root";
$password   = "abhishek123";
$database   = "employee_db";
$port       = 3306;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}
?>
