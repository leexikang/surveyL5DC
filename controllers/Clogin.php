<?php
	
	$errorMessage = "";
	$error = false; 
	/*include("../session.php");
	if(isset($_SESSION['login'])){
		header("location:list.php");
	}*/
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(isset($username) && isset($password)){

			include("../models/Mlogin.php");
			
			$userInfo = authertication($username, $password);
			print_r($userInfo);                                                                                                                     		
			if($userInfo){
				$errorMessage = "";
				$_SESSION['userId'] = $userInfo['userId'];
				$_SESSION['login'] =  1;
				$_SESSION['username'] =  $username;
				/*setcookie('login','1',time()+(60*60*24*30) );
				setcookie('userId',$row['userId'],time()+(60*60*24*30) );
				setcookie('username',$username,time()+(60*60*24*30) ); */
				echo "MVC for login success";
			}else{
				$errorMessage = "username or password are not correct.";
				$error = true;
			}

		}
	}
?>
