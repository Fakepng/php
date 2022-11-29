<?php
  require("helpers/db/db.php");

  session_start();

  $errors = array();

  if(isset($_POST["login_user"])) {
    $username = mysqli_real_escape_string($db_connection, $_POST["username"]);
    $password = mysqli_real_escape_string($db_connection, $_POST["password"]);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }

    if (empty($password)) {
      array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
      $user_check_query = "SELECT * FROM user WHERE username = '$username';";
      $query = mysqli_query($db_connection, $user_check_query);
      $result = mysqli_fetch_assoc($query);

      if (mysqli_num_rows($query) == 1 && password_verify($password, $result["password"])) {
        $_SESSION["username"] = $username;
        $_SESSION["success"] = "You are now logged in.";
        header("location: index.php");
      } else {
        array_push($errors, "Username or password is incorrect");
        $_SESSION["error"] = "Username or password is incorrect";
        header("location: login.php");
      }
    }
  }