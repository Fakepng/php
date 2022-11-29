<?php

require("db_config.php");

mysqli_report(MYSQLI_REPORT_OFF);
$db_connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database, $db_port);

if (!$db_connection) {
  die("Error connection to database: " . mysqli_connect_error());
}