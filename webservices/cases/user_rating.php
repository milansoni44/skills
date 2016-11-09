<?php

$true = 0;
$false = 1;
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$c_id = !empty($_REQUEST['c_id']) ? $_REQUEST['c_id'] : "";
$rate = !empty($_REQUEST['rate']) ? $_REQUEST['rate'] : "";
$returnValueArray = array();

if (!empty($u_id) && !empty($c_id) && !empty($rate)) {
	
		// check if user has already rated
		$sql = "SELECT `ur_id` FROM `rating` WHERE `u_id`='$u_id' AND cat_id = '$c_id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($result->num_rows > 0) {
			$ur_id =  $row['ur_id'];			
			$query = "UPDATE `rating` SET `rate`='$rate' WHERE ur_id = '$ur_id'";
			$sql = mysqli_query($conn, $query);
		} else {	
			$query = "INSERT INTO `rating` ( `rate`, `cat_id`, `u_id`) VALUES ('$rate','$c_id','$u_id'); ";
			$sql = mysqli_query($conn, $query);
		}
		
		$return_array["rate"] = $rate;
		$return_array["status"] = $true;
		$return_array["message"] = "Rating Successful";
		_sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
	
} else {
    $status = array("status" => $false, "message" => "User ID Or Category ID or Rating cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
?>
