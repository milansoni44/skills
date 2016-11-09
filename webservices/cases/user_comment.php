<?php

$true = 0;
$false = 1;
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$v_id = !empty($_REQUEST['v_id']) ? $_REQUEST['v_id'] : "";
$comment = !empty($_REQUEST['comment']) ? $_REQUEST['comment'] : "";
$returnValueArray = array();

if (!empty($v_id) && !empty($v_id) && !empty($comment)) {
	
		// check if user has already rated
		$query = "SELECT * FROM `user` WHERE `u_id`='$u_id'";
		$sql = mysqli_query($conn,$query);
		$result = mysqli_fetch_array($sql);
		
		$full_name = $result["full_name"];
		$profile_pic = $result["profile_pic"];
		
		$query1 = "INSERT INTO `comment`(`v_id`, `u_id`, `comment`) VALUES ('$v_id','$u_id','$comment') ";	
		$sql1 = mysqli_query($conn,$query1);
		$insert_id = mysqli_insert_id($conn);
		
		$profile_pic = "http://aurseekho.com/images/profile/".str_replace(" ","%20",$profile_pic);
		
		$date = date("Y-m-d H:i:s");
		
		$return_array["date"] = $date;
		$return_array["profile_pic"] = $profile_pic;
		$return_array["co_id"] = $insert_id;
		$return_array["comment"] = $comment;
		$return_array["full_name"] = $full_name;
		$return_array["status"] = $true;
		$return_array["message"] = "Rating Successful";
		_sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
	
} else {
    $status = array("status" => $false, "message" => "User ID Or Video ID or Comment cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
?>
