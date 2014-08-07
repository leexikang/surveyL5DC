<div id="aside">
	<?php
	$sql = "SELECT list FROM question_info
			GROUP BY list";
	$result = $conn->query($sql);
	?>
	<br/>
	<form action="<?php echo $action;?>" method="GET" ?>
	<label>Choose question to answer.</label>
	<select name="list">
	<?php while ($row = $result->fetch()){?>
	<option value="<?php echo $row['list']?>"> <?php echo $row['list']?> </option>
	
	<?php
	}
	////////////////////////////////////////////////////////////////
	?>

	</select><br/>
	<input type="submit" name="questin_list" value="OK" />
	</form>
	</div>