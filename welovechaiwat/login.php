<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("header.php") ?>
    <title>Login</title>
  </head>
  <body>
    <?php include("navbar.php");?>
    <?php if (isset($_SESSION["errors"])): ?>
    <?php $errors = $_SESSION["errors"]; ?> 
    <?php foreach ($errors as $error): ?>
      <p><?php echo $error ?></p>
    <?php endforeach; ?>
    <?php unset($_SESSION["errors"]); ?>
    <?php endif; ?>
    <form action="login_db.php" method="POST">
      <label for="username">Username</label>
      <input type="text" name="username" required>
      <label for="password">Password</label>
      <input type="password" name="password" required>
      <button type="submit" name="submit">Login</button>
    </form>
  </body>
</html>
