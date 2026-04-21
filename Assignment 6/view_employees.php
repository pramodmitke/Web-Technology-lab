<?php
include 'db_connect.php';
header('Content-Type: application/json');

$result = $conn->query("SELECT * FROM employees ORDER BY id");
$employees = [];
while ($row = $result->fetch_assoc()) {
    $employees[] = $row;
}
echo json_encode(["status" => "success", "data" => $employees]);
$conn->close();
?>
