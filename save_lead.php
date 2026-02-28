<?php
header('Content-Type: application/json');
include "config.php";

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$course = $_POST['course'] ?? '';
$message = $_POST['message'] ?? '';

$stmt = $conn->prepare("INSERT INTO leads (name,email,phone,course,message) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss", $name, $email, $phone, $course, $message);

if ($stmt->execute()) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false]);
}
?>