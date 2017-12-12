<?php

$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE vmlist SET checkedout = 0";
$result = $conn->query($sql);
$sql = "UPDATE vmlist SET user = ''";
$result = $conn->query($sql);


?>