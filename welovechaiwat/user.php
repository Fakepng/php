<?php include("navbar.php");?>
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
    <title>User</title>
  </head>
  <body>
    <?php include("navbar.php");?>
    <h1><?php echo $_SESSION["username"] ?></h1>
    <p><a href="user.php?logout='true'">Logout</a></p>
    <p><a href="new_post.php">New Post</a></p>
    <hr>
    <?php require("query_post.php"); ?>
  </body>
</html>
