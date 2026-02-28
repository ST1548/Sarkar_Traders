<?php
$conn = new mysqli("localhost", "DB_USERNAME", "DB_PASSWORD", "DB_NAME");
if ($conn->connect_error) {
  die("Database connection failed");
}
?>