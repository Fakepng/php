<?php
require("helpers/db/db.php");

session_start();

$errors = array();

if (isset($_POST)) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password_1 = $_POST["password_1"];
  $password_2 = $_POST["password_2"];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }

  if (empty($email)) {
    array_push($errors, "Email is required");
  }

  if (empty($password_1) || empty($password_2)) {
    array_push($errors, "Password is required");
  }

  if ($password_1 !== $password_2) {
    array_push($errors, "Password do not match");
  }

  $query_sql = "SELECT * FROM register WHERE username = '$username' OR email = '$email';";
  $query = mysqli_query($conn, $query_sql);
  $result = mysqli_fetch_assoc($query);

  if ($result) {
    if ($result["username"] == $username) {
      array_push($errors, "Username already exists");
    }

    if ($result["email"] == $email) {
      array_push($errors, "Email already exists");
    }
  }

  if (count($errors) > 0) {
    $_SESSION["errors"] = $errors;
    header("location: register.php");
  } else {
    $password = md5($password_1);
    $query_sql = "INSERT INTO register (username, email, password) VALUES ('$username','$email','$password');";
    mysqli_query($conn, $query_sql);
  
    $_SESSION["username"] = $username;
    header("location: user.php");
  }
}

