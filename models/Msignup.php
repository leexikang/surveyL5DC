<?php
			include("../dbConfig.php");	
			$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);
			
		function checkuser ($name){
			global $conn;	
			$sql = "SELECT userId FROM user_info WHERE username = '$name'";
			if($result = $conn->query($sql)){
				$userExist = true;
			}else{
				$userExist = false;
			}
		return $userExist;
		}

		function insert_user($name, $password, $email){
			global $conn;
			$sql = "INSERT INTO user_info (userName, password, email) values ('$name', '$password', '$email')";
			$result = $conn->query($sql);
			$result = "";
			$sql = "SELECT userId FROM user_info WHERE username = '$username' ";
			$result = $conn->query($sql);
			$userInfo = $result->fetch();
			return $userInfo;
		}
		function insert_question(){
			global $conn;
			$sql = "SELECT question_id FROM question_info";
			$result = $conn->query($sql);
						
			while($userInfo = $result->fetch()){
				$question_id = $userInfo['question_id'];
				$sql = "INSERT INTO answer (userId, question_id) VALUES ('$userId','$question_id') ";
				$insert = $conn->query($sql);
			}
		}
		?>