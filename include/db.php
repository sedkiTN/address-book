<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "adress";

	$con = mysqli_connect($servername, $username, $password, $database);
	if (mysqli_connect_error()) {
		die('Could not connect: %s\n' . mysqli_connect_error());
}
?>