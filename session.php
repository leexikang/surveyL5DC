<?php
  session_start();
   
  
  if ( !isset( $_SESSION['login']) ) {
   
    if (isset($_COOKIE['login']) && isset($_COOKIE['userId']) && isset($_COOKIE['username']) ) {
   	
      $_SESSION	['userId'] = $_COOKIE['userId'];
	  $_SESSION ['login'] = $_COOKIE['login'];
	  $_SESSION ['username'] = $_COOKIE['username'];

    }
  }
?>