<?php
require("db_config.php");

mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database, $db_port) or die("Could not connect to database: " . mysqli_connect_error());
?>