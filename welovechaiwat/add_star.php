<?php
require("helpers/db/db.php");
session_start();

if (!isset($_SESSION["username"])) {
  $_SESSION["message"] = "You must login first.";
  header("location: user.php");
}

$errors = array();

if (isset($_POST)) {
  $star = $_POST["star"];
  $post = $_POST["post"];
  $username = $_SESSION["username"];

  if (empty($star)) {
    array_push($errors, "Star is required");
  }

  if (empty($post)) {
    array_push($errors, "Post is required");
  }

  if (empty($username)) {
    array_push($errors, "Username is required");
  }

  if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    header("location: user.php");
  } else {
    $query_sql = "INSERT INTO star (star, post, owner_username) VALUES ('$star', '$post', '$username');";
    $result = mysqli_query($conn, $query_sql);
    var_dump($result);
    header("location: user.php");
  }
}
?>