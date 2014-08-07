<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<?php

	include("dbConfig.php");
	include("session.php");
	if (empty($_SESSION['login'])) {
		header("location:index.php");
	}
	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);

?>
<body id="loginBody">
	<?php require_once("header.php") ;?>
	<?php
	$action = $_SERVER['PHP_SELF']; 
	require_once("aside.php"); ?>

	<div id="mainContent">
	<br/>
	
	<?php

	$userId = $_SESSION['userId'];
	$question_list = $_GET['list'];
	
	$sql = "SELECT question, answer, an.question_id 
	FROM question_info qu, answer an 
	WHERE an.question_id = qu.question_id
	AND userId = '$userId'
	AND list = '$question_list'"; 
	$result = $conn->query($sql);
	$num = 1;
	while ($row = $result->fetch()) {
		?>
	<p><sapn class="question">Q:</sapn> <?php echo $row["question"]?></p>
	<p><sapn class="answer">A:</sapn> <?php echo $row['answer']?></p>
	<?php
	
	}
	?>
	<br/>
	<a href="content.php?list=<?php echo $question_list?>&questin_list=OK"  id="editAll" > Edit ALL</a>
	<br/>
	<br/>
	</div>

	<br/>
	<hr>
	<span id="about"> All right registered </span>
	
</body>

</html>