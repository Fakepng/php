<?php
session_start();

if (!isset($_SESSION["username"])) {
  $_SESSION["message"] = "You must login first.";
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require("header.php") ?>
    <title>New Post</title>
  </head>
  <body>
    <?php include("navbar.php");?>
    <form action="new_post_db.php" method="post">
      <label for="title">Title</label>
      <input type="text" name="title" required>
      <label for="content">Content</label>
      <textarea name="content" rows="5"></textarea>
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
