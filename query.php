<?php 

	include("config.php");
	
	$query1 = "SELECT * FROM `video1`";	
	
	$sql1 = mysqli_query($conn,$query1);
	while($result1= mysqli_fetch_array($sql1)){
	
	
	$v_id = $result1["v_id"];
	$v_level = $result1["v_level"];
	
	if($v_level != ""){
	
		if($v_level == "1"){
			$vid_level ="Beginner";
		}
		if($v_level == "2"){
			$vid_level ="Intermediate";
		}
		if($v_level == "3"){
			$vid_level ="Advanced";
		}
		$query_vv = "UPDATE `video1` SET `v_level`='$vid_level' WHERE v_id = $v_id";		
		$sql_vv = mysqli_query($conn,$query_vv);
	}
	
	
		
	}
	
		
		
		 
	
?>
