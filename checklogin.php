<?php

//	session_start();
	if(!isset($_COOKIE['skills'])){
	    echo"
	    <script>
	    window.location.href='logout.php';
        </script>";
//        header("location:logout.php");
//	    header("location:logout.php");
        exit;
	}

	if(isset($_COOKIE['skills'])){
		$u_name = $_COOKIE["u_name"];
		$uid = $_COOKIE["id"];
		$full_name = $_COOKIE["full_name"];
		$profile_pic = $_COOKIE["profile_pic"];
		$add_by = $_COOKIE["add_by"];
		$vendor_name = $_COOKIE["vendor_name"];
		$vendor_pic = $_COOKIE["vendor_pic"];

		$language = $_COOKIE["language"];
		if(!isset($_COOKIE['language'])){
			$language = "lan2";
		}	
	}

?>