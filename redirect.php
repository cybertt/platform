<?php
session_start();
$uname = $_SESSION["username"];
$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT score FROM $uname WHERE exercise = 'current_exercise'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
			$tempvar = $result->fetch_assoc() ['score'];
		}

header("Location: exercise.php?exname=xml/$tempvar.xml"); 

?>