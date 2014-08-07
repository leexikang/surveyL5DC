<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="style/style.css">
<script type="text/javascript" src="scripts/utils.js"></script>

</head>
<body id="loginBody">
<?php
	$errorMessage = "";
	$error = false; 
	include("dbConfig.php");
	include("session.php");
	if(isset($_SESSION['login']) ){
		header("location:list.php");
	}
	if(isset($_POST["signup"])){
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];

		if(!empty($username) && !empty($password1) && !empty($password2) && !empty($email)){
			$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);
			$sql = "SELECT userId FROM user_info WHERE username = '$username'";
			$result = $conn->query($sql);
				if( $result->fetchColumn() > 0 ) {
					$errorMessage = "Username has taken. Please take another.";
					$error = true;
				}else{
						$sql = "INSERT INTO user_info (userName, password, email) values ('$username', '$password1', '$email')";
						$result = $conn->query($sql);
						$result = "";
						$sql = "SELECT userId FROM user_info WHERE username = '$username' ";
						$result = $conn->query($sql);
						$row = $result->fetch();
						$userId = $row['userId']; // -------- assigning the userId
						$_SESSION['userId'] = $row['userId'];
						$_SESSION['login'] =  1;
						$_SESSION['username'] =  $username;
						setcookie('login','1',time()+(60*60*24*30) );
						setcookie('userId',$row['userId'],time()+(60*60*24*30) );
						setcookie('username',$username,time()+(60*60*24*30) );
						$sql = "SELECT question_id FROM question_info";
						$result = $conn->query($sql);
						
						while($row = $result->fetch()){
							$question_id = $row['question_id'];
							$sql = "INSERT INTO answer (userId, question_id) VALUES ('$userId','$question_id') ";
							$insert = $conn->query($sql);
						}
						header("location:list.php");
					}


		}else{
			$errorMessage = "Please fill all the fields.";
			$error = true;
		}
	}
	
	else{
		
	
?>	
	<br />
	<div id="signupDiv">
	<br />
		<h1> Signup </h1>
	<form id="loginForm" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
			<input type="text" name="username" id="username" placeholder="Username" /><br />
			<input type="password" name="password1" id="password1" placeholder="Password" /><br />
			<input type="password" name="password2" id="password2" placeholder="Re-type Password" /><br />
			<input type="email" name="email" id="email" placeholder="Email" />
			<br /> <br />
			<input type="submit" value="Signup" name="signup" disabled="" id="signupBtn"/>
		</form>
		<br/>
		<a href="index.php"> Login </a><br/>
		<span id="errorMessage"><?php echo $errorMessage;?></span>
	</div>
</body>
<script type="text/javascript" src="scripts/app.js"></script>
</html> 
<?php } ?>