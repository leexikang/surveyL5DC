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

	// For Updating the answer info
	$fromWhichPage = "content"; 
	require_once("updateAnswer.php");
	if(!isset($_POST['OK'])){

	
?>
<body id="loginBody">
	<?php require_once("header.php"); ?>
	<?php 
	$action =  $_SERVER['PHP_SELF'];
	require_once("aside.php"); ?>
	<?php
	if (isset($_GET['questin_list'])) {
		$list = $_GET['list'];
	
	$sql = "select an.question_id, question, question_type, list, answer, userId  from question_info qi, answer an 
			WHERE an.question_id = qi.question_id
			AND an.userId = '$userId'
			AND list = '$list'
			order by an.question_id";
	$result = $conn->query($sql);
	}
	require_once("queryQuestion.php"); ?>
	
	<br/>
	<hr>
	<span id="about"> All right registered</span>
	
</body>
<?php 	
	} ?>
<script src="scripts/content.js"></script>
</html>
