<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="loginBody">
<?php
	$errorMessage = "";
	$error = false; 
	include("dbConfig.php");
	include("session.php");
	if(isset($_SESSION['login'])){
		header("location:list.php");
	}
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(isset($username) && isset($password)){
			$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);
			$sql = "SELECT * FROM user_info Where username = '$username' AND password = '$password'";
			$result = $conn->query($sql);
			
			if($row = $result->fetch()){
				$errorMessage = "";
				$_SESSION['userId'] = $row['userId'];
				$_SESSION['login'] =  1;
				$_SESSION['username'] =  $username;
				setcookie('login','1',time()+(60*60*24*30) );
				setcookie('userId',$row['userId'],time()+(60*60*24*30) );
				setcookie('username',$username,time()+(60*60*24*30) );
				header("location:list.php");
				exit;
			}else{
				$errorMessage = "username or password are not correct.";
				$error = true;
			}

		}
	}
?>

	<div id="loginDiv">
	<br />
		<h1> Login </h1>
	<form id="loginForm" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
			<input type="text" name="username" id="username" placeholder="Username" />
			<input type="password" name="password" id="password" placeholder="Password" />
			<br /> <br />
			<input type="submit" value="Login" name="login" />
		</form>

		<br/>
		<a href = "signup.php" > sign Up</a>
		<span id="errorMessage"><?php echo $errorMessage;?></span>
	</div>
</body>

</html>