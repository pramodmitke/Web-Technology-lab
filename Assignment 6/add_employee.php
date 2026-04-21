<?php
include 'db_connect.php';
header('Content-Type: application/json');

$name  = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$dept  = trim($_POST['department']);
$salary = $_POST['salary'];
$registration = trim($_POST['registration']);
$address = trim($_POST['address']);
$gender = trim($_POST['gender']);

$stmt = $conn->prepare("INSERT INTO employees (name, email, phone, department, salary, registration, address, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssdsss", $name, $email, $phone, $dept, $salary, $registration, $address, $gender);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee added"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
}
$stmt->close();
$conn->close();
?>
