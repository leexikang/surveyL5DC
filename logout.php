<?php
		
		session_start();
		
		if(isset($_SESSSION['userId']))
		{
			$_SESSSION = array();
			if(isset($_COOKIE['PHPSESSID'])){
				setcookie(PHPSESSID, '', time()-3600);
				session_destroy();
			}
		}
		session_destroy();
		setcookie(login, '', time()-3600);
		setcookie(userId, '', time()-3600);
		setcookie(username, '',time()-3600);

		setcookie(PHPSESSID,'value' , time()-3600);
		header("Location:index.php");
?>

