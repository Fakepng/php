<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("header.php") ?>
    <title>Document</title>
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
    <form action="register_db.php" method="post">
      <label for="username">Username</label>
      <input type="text" name="username" required>
      <label for="email">E-mail</label>
      <input type="email" name="email" required>
      <label for="password_1">Password</label>
      <input type="password" name="password_1" required>
      <label for="password_2">Confirm Password</label>
      <input type="password" name="password_2" required>
      <button type="submit" name="submit">Register</button>
    </form>
  </body>
</html>
