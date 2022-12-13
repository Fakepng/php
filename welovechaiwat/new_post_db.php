<?php
require("helpers/db/db.php");
session_start();

if (!isset($_SESSION["username"])) {
  $_SESSION["message"] = "You must login first.";
  header("location: user.php");
}

$errors = array();

if (isset($_POST)) {
  $title = mysqli_real_escape_string($conn, $_POST["title"]);
  $content = mysqli_real_escape_string($conn, $_POST["content"]);
  $username = $_SESSION["username"];

  if (empty($title)) {
    array_push($errors, "Title is required");
  }

  if (empty($content)) {
    array_push($errors, "Content is required");
  }

  if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    header("location: new_post.php");
  } else {
    $query_sql = "INSERT INTO posts (title, content, owner_username) VALUES ('$title','$content','$username');";
    mysqli_query($conn, $query_sql);
    header("location: user.php");
  }
}
?>