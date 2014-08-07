<?php if(isset($_POST["OK"]) ) {

		if(isset($_POST["userId"])){
			$userId = $_POST["userId"];

		}
		$questin_list = $_POST["question_list"]; 
		$sql = "select count(question_id) from question_info Where list = '$questin_list'";
		$result = $conn->query($sql);
		$row = $result->fetchColumn();
		for($i = 1 ; $i <= $row ; $i++){
			$id = $_POST['id'.$i];
			$answer = $_POST['answer'.$i];
			$sql = "UPDATE answer set answer = '$answer' WHERE question_id = '$id' AND userId = '$userId' ";
			$conn->query($sql);
			
	}
	if($fromWhichPage == "content"){
		header("location:showAnswer.php?list=" . $questin_list);	
	}else{
		header("location: report.php");
	}
	exit;
}
?>