<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<?php
	
	include("dbConfig.php");
	include("session.php");
	$userId = $_SESSION['userId'];

	if (empty($_SESSION['login'])) {
		header("location:index.php");
		exit;
	}
	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);//database configure
?>
<body id="loginBody">
	<?php require_once("header.php") ?>
	<div id="aside">
	
	</div>
	<div id="mainContent">
	<br/>
	<br/>
	<form action="content.php" method="GET">
	<?php

	$sql = "SELECT list FROM question_info
			GROUP BY list";
	$result = $conn->query($sql);
	
	?>
	<label>Choose question to answer.</label>
	<select name="list">
	<?php while ($row = $result->fetch()){?>
	<option value="<?php echo $row['list']?>"> <?php echo $row['list']?> </option>
	
	<?php
	}
	?>
	</select><br/>
	<input type="submit" name = "questin_list" value="OK" />

	</form>
	</div>
	<br/>
	<hr>
	<span id="about"> All right registered</span>
	
</body>
</html>
