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
	}		
	ob_end_flush();
?>