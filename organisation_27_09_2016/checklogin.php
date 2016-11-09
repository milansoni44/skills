<?php

	ob_start();
	session_start();
	if(!isset($_SESSION['utype'])){
		header("location:logout.php");
	}
	if(isset($_SESSION['utype'])){
		$uname = $_SESSION["uname"];
		$uid = $_SESSION["id"];
		$utype = $_SESSION["utype"];
		$ulimit = $_SESSION["ulimit"];
		$uvalidity = $_SESSION["uvalidity"];
		$profilepic = $_SESSION["profile_pic"];
	}		
	ob_end_flush();
	
	$pagename =  basename($_SERVER['PHP_SELF']);
?>