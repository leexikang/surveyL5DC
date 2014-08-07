<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<?php
	
	include("dbConfig.php");
	include("session.php");
	if(empty($_SESSION['login'])){
		header("location:index.php");
	}

	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);
	require_once("updateAnswer.php");

	if(!isset($_POST["userId"])){
			$userId = $_GET['userId'];
			$sql = "SELECT question_type, question, answer, qu.question_id
			FROM question_info qu, answer an 
			WHERE an.question_id = qu.question_id
			AND userId = '$userId'
			AND list = 'phone'"; 
			$result = $conn->query($sql);
		?>
<body id="loginBody">
<?php require_once("header.php") ;?>	
	<?php
	$list = "phone"; 
	$fromWhichPage = "editAnswer";
	require_once("queryQuestion.php"); ?>
	<br/>
	<hr>
	<span id="about"> All right registered </span>
	
</body>

</html>
<?php } ?>