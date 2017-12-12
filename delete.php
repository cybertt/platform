<?php
	session_start();

$admincheck = $_SESSION["access"];
	if ($admincheck==2){
if (isset($_GET['id'])) {
	$servername = "localhost";
	$username = "root";
	$password = "#Karma2014!";
	$dbname = "test";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$id = $_GET['id'];
	$sql = "DROP TABLE " . $id;
	if ($conn->connect_error) {
		die("<h4 class=\"text-success text-right\">Connection failed: " . $conn->connect_error) . "</h4>";
	}
	else {
		echo "<h4 class=\"text-success text-right\">Connected to db</h4>";
	}

	$conn->query($sql);
	$conn->close();
	header("Location: https://training.n57.net/userhistory.php?deleted=1?deleteduser=$id");
	exit();
}
	}
?>
