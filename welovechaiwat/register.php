<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("header.php") ?>
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
  </head>
  <body>
    <?php include("navbar.php"); ?>
    <?php include("errors.php"); ?>
    <section class="form">
    <h1>Register</h1><br>
    <form action="register_db.php" method="post">
    <label for="username">Username</label>
      <input type="text" name="username" required><br>
      <label for="email">E-mail</label>
      <input type="email" name="email" required><br>
      <label for="password_1">Password</label>
      <input type="password" name="password_1" required><br>
      <label for="password_2">Confirm Password</label>
      <input type="password" name="password_2" required><br>
      <button type="submit" name="submit">Register</button>
    </form>
    </section>
  </body>
</html>