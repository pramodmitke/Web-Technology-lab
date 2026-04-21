<?php
include 'db_connect.php';
header('Content-Type: application/json');

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM employees WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Employee deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: Employee ID not found."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
}
$stmt->close();
$conn->close();
?>
