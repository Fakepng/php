<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("header.php") ?>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
  </head>
  <body>
    <?php include("navbar.php");?>
    <?php include("errors.php"); ?>
    <section class="form">
    <h1>Login</h1><br>
    <form action="login_db.php" method="POST">
      <label for="username">Username</label>
      <input type="text" name="username" required><br>
      <label for="password">Password</label>
      <input type="password" name="password" required><br>
      <button type="submit" name="submit">Login</button>
    </form>
    </section>
  </body>
</html>
