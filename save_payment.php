<?php
header('Content-Type: application/json');
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$payment_id = $data['payment_id'] ?? '';
$course = $data['course'] ?? '';
$amount = $data['amount'] ?? 0;

$stmt = $conn->prepare("INSERT INTO payments (payment_id, course, amount) VALUES (?,?,?)");
$stmt->bind_param("ssi", $payment_id, $course, $amount);

if ($stmt->execute()) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false]);
}
?>