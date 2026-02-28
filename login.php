<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
    $_SESSION['admin'] = true;
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Invalid login";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Login</title></head>
<body>
<h2>Admin Login</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="post">
<input name="username" placeholder="Username"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<button>Login</button>
</form>
</body>
</html>
