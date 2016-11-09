<?php 

	include("config.php");
	include("checklogin.php");
	session_start();
	
	$vid_id = $_POST["v_id"];
	
	if(isset($_SESSION['id'])){
	$uid= $_SESSION['id'];
	$query1 = "SELECT * FROM `video` where v_id = '$vid_id' ";		
	$sql1 = mysqli_query($conn,$query1);
	$result1= mysqli_fetch_array($sql1);
	
		$v_name_str = "v_name_".$language; 
		$v_name_str = trim($v_name_str);
		$v_name = $result1[$v_name_str];
		$v_url_str = "v_url_".$language; 
		$v_url_str = trim($v_url_str);
		$v_url = $result1[$v_url_str];
		$vid_level = $result1["v_level"]; 
		$cat_id = $result1["cat_id"];
		
		
		$query_vv_check = "SELECT * FROM `video_view` WHERE v_id = '$vid_id' AND u_id = '$uid'";		
		$sql_vv_check = mysqli_query($conn,$query_vv_check);
		
		$sql_vv_check_num = mysqli_num_rows($sql_vv_check);
		
		if($sql_vv_check_num < 1){
		
		$query_vv = "INSERT INTO `video_view`(`v_id`, `u_id`) VALUES ('$vid_id','$uid')";		
		$sql_vv = mysqli_query($conn,$query_vv);
		
		}

		
		$query_vv_check = "SELECT * FROM `video_view` AS vv 
							LEFT JOIN video AS vid ON vid.v_id = vv.v_id
							WHERE cat_id = '$cat_id' AND u_id = '$uid'";		
		$sql_vv_check = mysqli_query($conn,$query_vv_check);
		
		$sql_vv_check_num = mysqli_num_rows($sql_vv_check);
		
		
		
		$query_allvideo = "SELECT * FROM `video` WHERE cat_id = '$cat_id'";		
		$sql_allvideo = mysqli_query($conn,$query_allvideo);
		$sql_allvideo_num = mysqli_num_rows($sql_allvideo);
		
		
		$percentage =  ($sql_vv_check_num  * 100) / $sql_allvideo_num ;		
		$percentage = round($percentage); 
		
		$query_cc_check = "SELECT * FROM `course_complete` WHERE c_id = '$cat_id' AND u_id = '$uid'";		
		$sql_cc_check = mysqli_query($conn,$query_cc_check);
		
		$sql_cc_check_num = mysqli_num_rows($sql_cc_check);
		if($sql_cc_check_num < 1){
		
		$query_cc = "INSERT INTO `course_complete`(`c_id`, `u_id`, `complete`) VALUES ('$cat_id','$uid','$percentage')";		
		$sql_cc = mysqli_query($conn,$query_cc);
		
		}
		else{
		
		$query_cc = "UPDATE `course_complete` SET `complete`='$percentage' WHERE c_id = '$cat_id' AND u_id = '$uid'";		
		$sql_cc = mysqli_query($conn,$query_cc);
		
		}
		#next video url
		$query_nxt = "SELECT * FROM `video` where  cat_id='$cat_id' AND v_id > '$vid_id' LIMIT 1";		
		$sql_nxt = mysqli_query($conn,$query_nxt);
		$result_nxt= mysqli_fetch_array($sql_nxt);
		
			
			$nxt_vid = $result_nxt['v_id'];
			
			$nxt_url = "syllabus.php?c_id=".$cat_id."&v_id=".$nxt_vid."";
			echo $nxt_url;
	}
	
	
	
		 
	
?>
