<?php
	include("../dbConfig.php");		
	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);

	function authertication($username, $password) {
		global $conn;	
		$sql = "SELECT userId FROM user_info Where username = '$username' AND password = '$password'";
		$userInfo = array();
		if($result = $conn->query($sql)){
			$userInfo = $result->fetch();
		}else{
			exit; 
		}
		return $userInfo;

	}
?>