<?php
include 'db_connect.php';
header('Content-Type: application/json');

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM employees WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["status" => "success", "data" => $row]);
} else {
    echo json_encode(["status" => "error", "message" => "Employee ID not found."]);
}
$stmt->close();
$conn->close();
?>
