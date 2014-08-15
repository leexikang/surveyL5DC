<?php
	$errorMessage = "";
	$error = false; 
	
	// include("session.php");
/*	if(isset($_SESSION['login']) ){
		header("location:list.php");
	}*/
	if(isset($_POST["signup"])){
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];

		if(!empty($username) && !empty($password1) && !empty($password2) && !empty($email)){
			include("../models/Msignup.php");
			$userExist = checkUser($username);
			echo $userExist;	
				if(!$userExist) {
					$errorMessage = "Username has taken. Please take another.";
					$error = true;
				}else{ 

						$userInfo = insert_user($username, $password1, $email);	
						print_r($userInfo);	
						$userId = $userInfo['userId']; // -------- assigning the userId
						$_SESSION['userId'] = $userInfo['userId'];
						$_SESSION['login'] =  1;
						$_SESSION['username'] =  $username;
						setcookie('login','1',time()+(60*60*24*30) );
						setcookie('userId',$userInfo['userId'],time()+(60*60*24*30) );
						setcookie('username',$username,time()+(60*60*24*30) );
						// header("location:list.php");
						insert_question();	

					}


		}else{
			$errorMessage = "Please fill all the fields.";
			$error = true;
		}
	}
	
		
	
