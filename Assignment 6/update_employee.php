<?php
include 'db_connect.php';
header('Content-Type: application/json');

$id    = $_POST['id'];
$name  = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$dept  = trim($_POST['department']);
$salary = $_POST['salary'];
$registration = trim($_POST['registration']);
$address = trim($_POST['address']);
$gender = trim($_POST['gender']);

$stmt = $conn->prepare("UPDATE employees SET name=?, email=?, phone=?, department=?, salary=?, registration=?, address=?, gender=? WHERE id=?");
$stmt->bind_param("ssssdsssi", $name, $email, $phone, $dept, $salary, $registration, $address, $gender, $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Employee updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: Employee ID not found or no new changes made."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
}
$stmt->close();
$conn->close();
?>
