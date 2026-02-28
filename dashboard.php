<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include "../backend/config.php";
$leads = $conn->query("SELECT * FROM leads ORDER BY id DESC");
$payments = $conn->query("SELECT * FROM payments ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
<h2>Leads</h2>
<table border="1" cellpadding="8">
<tr><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Date</th></tr>
<?php while($row = $leads->fetch_assoc()){ ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['course'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</table>

<h2>Payments</h2>
<table border="1" cellpadding="8">
<tr><th>Payment ID</th><th>Course</th><th>Amount</th><th>Date</th></tr>
<?php while($row = $payments->fetch_assoc()){ ?>
<tr>
<td><?= $row['payment_id'] ?></td>
<td><?= $row['course'] ?></td>
<td>₹<?= $row['amount'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</table>

<p><a href="logout.php">Logout</a></p>
</body>
</html>
