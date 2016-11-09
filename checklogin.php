<?php

	ob_start();
	session_start();
	if(!isset($_SESSION['skills'])){
		header("location:login.php");
	}

	if(isset($_SESSION['skills'])){
		$u_name = $_SESSION["u_name"];
		$uid = $_SESSION["id"];
		$full_name = $_SESSION["full_name"];
		$profile_pic = $_SESSION["profile_pic"];
		$add_by = $_SESSION["add_by"];
		$vendor_name = $_SESSION["vendor_name"];
		$vendor_pic = $_SESSION["vendor_pic"];

		$language = $_SESSION["language"];
		if(!isset($_SESSION['language'])){
			$language = "lan2";
		}	
	}		
	ob_end_flush();
?>