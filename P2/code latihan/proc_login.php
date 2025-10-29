<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
?>
<h1>Data Login</h1>
<hr>
<p>Username: <b><?php echo htmlspecialchars($username); ?></b></p>
<p>Password: <b><?php echo htmlspecialchars($password); ?></b></p>
</body>
</html>