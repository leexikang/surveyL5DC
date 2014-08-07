<html>
<head>
<title> Surcay </title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<?php

	include("dbConfig.php");
	include("session.php");
	$conn = new PDO("mysql:host=localhost;dbname=survay", $dbuser, $dbpass);
	if (empty($_SESSION['login'])) {
		header("location:index.php");
	}
	$userId = $_SESSION['userId'];
	If(isset($_GET['search'])){
		$question = $_GET['question'];
	}
?>
<body id="loginBody">
	<?php require_once("header.php") ?>
	<div id="mainContent">
	<br/>
	<h1> Search </h1>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
	<select name="question">
		<option value="All">All</option>
		<option value="Apple">Apple</option>
		<option value="HTC">HTC</option>
		<option value="Huawei">Huawei</option>
		<option value="Samsung">Samsung</option>
		<option value="Xiaomi">Xiaomi</option>
	</select>
	<button type="submit" name="search" value="search"> Search</button>
	</form>	
	<h1>Result </h1>
	

	<table width="30px">
	
	<?php
	$questionIdArr = array();
	$sql = "SELECT question_id FROM question_info WHERE list='phone'";
	$result = $conn->query($sql);
	while($row = $result->fetch()){
		array_push($questionIdArr, $row['question_id']);
	}
	if(isset($question)){
		if($question == "All"){
			$sql = "SELECT userId, username FROM user_info";
		}else{
		$sql = "SELECT user_info.userId, username 
		FROM user_info, answer
		WHERE user_info.userId = answer.userId
		AND answer = '$question'";
		}
	}else{
		$sql = "SELECT userId, username FROM user_info";
	}
	$result = $conn->query($sql);
	
	/**if($row = $result->fetch()){
		echo '<h1 id="errorMessage" class="error">No Result Found.........</h1>';
	}else{
		echo "<tr><td>Username </td> <td>question 1</td> <td>question 2</td> 
		<td>question 3</td><td></td><td></td></tr>";
	**/
	echo "<tr><td>Username </td> <td>question 1</td> <td>question 2</td> 
		<td>question 3</td><td></td><td></td></tr>";
	
	
		
	while($row = $result->fetch())
	{

		?>
		
		<tr>
			<td><?php echo $row['username'];?> </td> 
			<td><?php echo queryAnswer($row['userId'], $questionIdArr[0]);?></td>
			<td><?php echo queryAnswer($row['userId'], $questionIdArr[1]);?></td> 
			<td><?php echo queryAnswer($row['userId'], $questionIdArr[2]);?></td>
			<td><a href="editAnswer.php?userId=<?php echo $row['userId'] ?>" >Edit</a></td>
			<td><a href="deleteUser.php?userId=<?php echo $row['userId'] ?> ">Delete</a></td>
		</tr>
	<?php
		} 

	?>
	</table>
	

	</div>

	<br/>
	<hr>
	<span id="about"> All right registered </span>
	
</body>

</html>
<?php
	function queryAnswer($userIdArg, $questionIdArg){
		$sql = "SELECT answer FROM answer
				WHERE userId = '$userIdArg'
				AND question_id = '$questionIdArg'";
		global $conn;
		$result1 = $conn->query($sql);
		$row1	=  $result1->fetch();
		return $row1['answer'];
	}	
?>