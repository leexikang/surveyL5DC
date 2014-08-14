<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<?php include("../controllers/Clogin.php") ?>
<body id="loginBody">

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
		<span id="errorMessage"></span>
	</div>
</body>

</html>