<?php
session_start();
require("dbConfig.php");
 if (empty($_SESSION['login'])) {
		header("location:index.php");
		exit;
	}
	$userId = $_GET['userId'];
	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);//database configure
	$sql = "DELETE FROM answer
			WHERE userId='$userId'";
	$result = $conn->query($sql);
	$sql = "DELETE FROM user_info
			WHERE userId='$userId'";
	$result = $conn->query($sql);
	header(("location:report.php"));

?>