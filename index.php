<?php
session_start();
$token = hash("sha512", uniqid('auth', true));
$_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Benvenuto</title>
</head>
<body>
<form action="auth.php" method="post">
  Username: <input type="text" name="username">
  Password: <input type="password" name="password">
  <input type="hidden" name="token" value ="<?php echo $token?>">
  <input type="submit" value="invia">
</form>
</body>
</html>