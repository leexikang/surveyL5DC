<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<script type="text/javascript" src="../scripts/utils.js"></script>
<?php
	include("../controllers/Csignup.php");
?>
</head>
<body id="loginBody">	
	<br />
	<div id="signupDiv">
	<br />
		<h1> Signup </h1>
	<form id="loginForm" action="../controllers/Csignup.php" method="POST">
			<input type="text" name="username" id="username" placeholder="Username" /><br />
			<input type="password" name="password1" id="password1" placeholder="Password" /><br />
			<input type="password" name="password2" id="password2" placeholder="Re-type Password" /><br />
			<input type="email" name="email" id="email" placeholder="Email" />
			<br /> <br />
			<input type="submit" value="Signup" name="signup" disabled="" id="signupBtn"/>
		</form>
		<br/>
		<a href="index.php"> Login </a><br/>
		<span id="errorMessage"></span>
	</div>
</body>
<script type="text/javascript" src="../scripts/app.js"></script>
</html> 