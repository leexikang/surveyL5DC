<div id="mainContent">
	<br/>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="hidden" value="<?php echo $list ?>" name="question_list" /><br/>
	<!--  This input is for EditAnser Only  -->
	<input type="hidden" value="<?php echo $userId  ?>" name="userId" /><br/>
	<!--  -->
	<?php
	$num = 1;

	while ($row = $result->fetch()) {
		
		?>
	
	<input type="hidden" value="<?php echo $row['question_id'] ?>" name="id<?php echo $num?>" /><br/>

	<label><?php echo $row["question"]?></label>
	<?php
	if($row['question_type'] == "radio" || $row['question_type'] == "checkbox" )
	{	
		$id = $row['question_id'];
		$sql1 = "SELECT * FROM input_type WHERE question_id = '$id' ";

		$result1 = $conn->query($sql1);
		
		while($row1 = $result1->fetch())
		{

	?>
	<input type="<?php echo $row['question_type'];?>" value="<?php echo $row1['input_value'];?>" name="<?php echo 'answer'. $num?>" <?php if($row1['input_value'] == $row['answer']){ ?>checked <?php }else{?>
	<?php }?> /> <?php echo $row1['input_value'];?>
	<?php
		}
	}elseif($row['question_type'] == "select"){
		$id = $row['question_id'];
		$sql1 = "SELECT * FROM input_type WHERE question_id = '$id' ";
		$result1 = $conn->query($sql1);
		echo "<select name= answer". $num .">";

		while($row1 = $result1->fetch())
		{	

			if($row1['input_value'] == $row['answer']){
				?> <option value = "<?php echo $row1['input_value'] ?>" selected ><?php echo $row1['input_value'] ?></option>
		<?php
		}else{
		?>
			<option value = "<?php echo $row1['input_value'] ?>"><?php echo $row1['input_value'] ?></option>

		<?php }
	}
		echo "</select>";
	}else{

	?>
	<input type="<?php echo $row['question_type']?>"
	value="<?php echo $row['answer']?>" name="<?php echo 'answer'. $num?>"/>
	
	<?php
			}
		$num ++;
		}
	
	?>
	<br/>
	<input type="submit" value="OK" name="OK" />
	</form>
	</div>