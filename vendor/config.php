<?php
error_reporting(0);


$is_live = true;  // for live dfault
if(isset($_SERVER['SERVER_NAME'])) {
	if($_SERVER['SERVER_NAME'] == "localhost") {
		$is_live = false;  //false is for local		
	}
}

if( $is_live ) {

	 
			$Servername = "localhost";
			$username = "learning_skills";
			$password = "admin@123_4";
			$dbname = "learning_skills";
			
			$conn = mysqli_connect($Servername,$username,$password,$dbname) or die ("connection failed:" .mysqli_error());
			mysqli_set_charset($conn,"utf8");
} else {
		
	 
			$Servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "skills";
			
			$conn = mysqli_connect($Servername,$username,$password,$dbname) or die ("connection failed:" .mysqli_error());
			
			mysqli_set_charset($conn,"utf8");
}




?>