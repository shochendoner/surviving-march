<?php

$servername = "march.mysql.database.azure.com";
$dBUsername = "madwhiteups";
$dBPassword = "Sharks2424!";
$dBName = "userregistration";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
