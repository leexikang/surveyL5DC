<html>
	<head>
		<title> Surcay </title>
		<link rel="stylesheet" type="text/css" href="../style/style.css">
	</head>
	<body id="loginBody">
		<header>
			<ul>
				<li> <?php echo $_SESSION['username'];?></li>
				<li><a href="report.php"> Report</a></li>
				<li><a href="showAnswer.php?list=phone">Answers</a></li>
				<li><a href="content.php?list=car&questin_list=OK"> Questions</a></li>
				<li><a href="logout.php"> Logout</a></li>
			
			</ul>
		</header>
		<div id="aside">
		</div>
		<div id="mainContent">
		</div>
		<br/>
		<hr>
		<span id="about"> All right registered</span>
	
	</body>
</html>