<?php


	$connm = new PDO("mysql:localhost", "root", "root");
	$sql = "CREATE DATABASE survay";
	if($connm->query($sql)){
	echo "survay database has been created <br/>";
	}else{
		echo "can't not create survay database <br/>";
	}
	$conn = new PDO("mysql:host=localhost;dbname=survay", "root", "root");

	$sql= "CREATE TABLE `question_info` (
		`question_id` int(11) NOT NULL AUTO_INCREMENT,
		`question` varchar(200) DEFAULT NULL,
		`list` varchar(30) DEFAULT NULL,
		`question_type` varchar(30) DEFAULT NULL,
		PRIMARY KEY (`question_id`)
		)";
	checktable($conn, $sql, 'question_info');

	

	$sql = "CREATE TABLE `input_type` (
		`question_id` int(11) DEFAULT NULL,
		`input_value` varchar(30) DEFAULT NULL,
		PRIMARY KEY (question_id, input_value),
		KEY `question_id` (`question_id`));";
	checktable($conn, $sql, 'input_type');

	$sql = "CREATE TABLE `user_info` (
		`userId` int(11) NOT NULL AUTO_INCREMENT,
		`userName` varchar(30) DEFAULT NULL,
		`password` varchar(40) DEFAULT NULL,
		`email` varchar(30) DEFAULT NULL,
		PRIMARY KEY (`userId`));";
	checktable($conn, $sql, 'user_info');

	$sql = "CREATE TABLE `answer` (
		`userId` int(11) NOT NULL DEFAULT '0',
		`question_id` int(11) NOT NULL DEFAULT '0',
		`answer` varchar(100) DEFAULT NULL,
		PRIMARY KEY (`userId`,`question_id`),
		KEY `userId` (`userId`),
		KEY `question_id` (`question_id`));";
		checktable($conn, $sql, 'answer');

	

	$sql = "INSERT INTO `question_info` VALUES (1,'What is your phone brand?','phone','radio'),
	(2,'Are you satisfied ? ','phone','select'),(3,'Comment about your phone','phone','text'),
	(4,'What is your car brand ?','car','radio'),
	(5,'Are you satisfied with this car ?','car','select'),
	(6,'Any comment about this car ?','car','text');";

	checkinput($conn, $sql, 'question_info');

	$sql ="INSERT INTO `input_type` VALUES (1,'Apple'),(1,'HTC'),(1,'Huawei'),(1,'Samsung'),
	(1,'Xiaomi'),(2,'bad'),(2,'good'),(2,'not bad'),(4,'BMW'),(4,'Honda'),(4,'Nission'),
	(4,'Toyota'),(5,'Bad'),(5,'Good'),(5,'Not Bad');";

	checkinput($conn, $sql, 'input_type');
	
	$sql = "INSERT INTO `user_info` VALUES ('MinSan','password',NULL,0)
	,('Kaw','kaw','kaw@gmail.com',1),('nima','nima','nima@gmail.com',1),
	('Ma','ma','password@gmail.com',1),('xikanglee','pass','leexikang@gmail.com',1),
	('KinNa','pass','password@gmail.com',1)";
	
	checkinput($conn, $sql, 'user_info');

	$sql = "INSERT INTO `answer` VALUES (1,4,'BMW'),(1,5,'Bad'),(1,1,'HTC'),
	(1,2,'not bad'),(1,3,'so far is good.'),(63,6,'Ok.'),
	(63,5,'Not Bad'),(63,4,'BMW'),(63,3,'So so.'),(63,2,'good'),
	(1,6,'Hello'),(61,1,'Samsung'),(61,2,'good'),(61,3,'Very Good!'),
	(61,4,'BMW'),(61,5,'Good'),(61,6,'Carss good.'),(63,1,'Apple'),
	(64,1,'Huawei'),(64,2,'bad'),(64,3,'dfdsaf'),(64,4,NULL),
	(64,5,NULL),(64,6,NULL),(65,1,'Xiaomi'),(65,2,'good'),
	(65,3,'Most wanted.'),(65,4,'Honda'),(65,5,'Bad'),(65,6,'Gpp.'),
	(66,1,'HTC'),(66,2,'good'),(66,3,'Good design.'),(66,4,'Honda'),
	(66,5,'Bad'),(66,6,'ss');";

	checkinput($conn, $sql, 'answer');


		function checktable($config,$sqlstat, $tablename){
			if($config->query($sqlstat)){
				echo $tablename." has been created. <br/>";
			}else{
				echo "can't create ". $tablename . " table <br/>";
			}
		}

		function checkinput($config, $sqlstat, $table){
			if($config->query($sqlstat)){
				echo " data has been added to". $table ." <br/>";
			}else{
				echo "can't create insert data into ". $table . " table <br/>";
			}
		}
?>