<?php
  require("helpers/db/db.php");

  session_start();

  $errors = array();

  if (isset($_POST["reg_user"])) {
    $username = mysqli_real_escape_string($db_connection, $_POST["username"]);
    $email = mysqli_real_escape_string($db_connection, $_POST["email"]);
    $password_1 = mysqli_real_escape_string($db_connection, $_POST["password_1"]);
    $password_2 = mysqli_real_escape_string($db_connection, $_POST["password_2"]);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }

    if (empty($email)) {
      array_push($errors, "Email is required");
    }

    if (empty($password_1) || empty($password_2)) {
      array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
      array_push($errors, "Password do not match");
      $_SESSION["error"] = "Password do not match";
      header("location: register.php");
    }

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email';";
    $query = mysqli_query($db_connection, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
      if ($result["username"] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($result["email"] === $email) {
        array_push($errors, "Email already exists");
      }
    }

    if (count($errors) == 0) {
      $password = password_hash($password_1, PASSWORD_BCRYPT);

      $insert_user_query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password');";
      mysqli_query($db_connection, $insert_user_query);

      $_SESSION["username"] = $username;
      $_SESSION["success"] = "You are now logged in.";
      header("location: index.php");
    } else {
      $_SESSION["error"] = "Username or email already exists";
      header("location: register.php");
    }
  }