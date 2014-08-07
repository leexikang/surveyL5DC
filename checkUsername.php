<?php
	$username = $_GET['username'];
	include("dbConfig.php");
	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);
	$sql = "SELECT * FROM user_info where username = '$username'";
	$pre = $conn->query($sql);
	if($pre->fetchColumn() > 0){
			echo "Username exits";
	}else{
		echo "okay";
	}
?>