<?php
session_start();

if (!isset($_SESSION["username"])) {
  $_SESSION["message"] = "You must login first.";
  header("location: login.php");
}

if (isset($_GET["logout"])) {
  session_destroy();
  unset($_SESSION["username"]);
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("header.php") ?>
    <link rel="stylesheet" href="user.css">
    <title>User</title>
  </head>
  <body>
    <?php include("navbar.php");?>
    <div class="username">
      <h1>User : <?php echo $_SESSION["username"] ?></h1><br>
      <p><a href="user.php?logout='true'">Logout</a></p><br>
      <p><a href="new_post.php">New Post</a></p><br>
      <hr>
    </div>
    <?php require("query_post.php"); ?>
  </body>
</html>
