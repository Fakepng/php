<?php
require("helpers/db/db.php");

session_start();

$errors = array();

if (isset($_POST)) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }

  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    header("location: login.php");
  } else {
    $md5_password = md5($password);
    $query_sql = "SELECT * FROM register WHERE username = '$username' AND password = '$md5_password';";
    $query = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($query) == 1) {
      $_SESSION["username"] = $username;
      header("location: user.php");
    }
  }
}

