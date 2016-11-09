<?php

$true = 0;
$false = 1;
$uid = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$vid_id = !empty($_REQUEST['v_id']) ? $_REQUEST['v_id'] : "";
$returnValueArray = array();

if (!empty($uid) && !empty($vid_id)) {

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
		
        $return_array["status"] = $true;
        $return_array["message"] = "Video Watched Successfully.";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }else {
    $status = array("status" => $false, "message" => "Video ID Or User ID cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
?>
