<?php

$host= "localhost";
$username= "root";
$password = "password";

$db_name = "db";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}


?>
