<?php

$true = 0;
$false = 1;
$uname = !empty($_REQUEST['uname']) ? $_REQUEST['uname'] : "";
$password = !empty($_REQUEST['password']) ? $_REQUEST['password'] : "";
$mobile = !empty($_REQUEST['mobile']) ? $_REQUEST['mobile'] : "";
$returnValueArray = array();

if (!empty($mobile)) {

    $login = true;
    // here login is query return value if empty then send error else return data 
	
	$query ="SELECT * FROM `family_master` WHERE mobile = '$mobile' AND head = '1'";
	$sql = mysqli_query($conn, $query);
	$res_num = mysqli_num_rows($sql);
		
    if ($res_num == 0) {
        $status = array("status" => $false, "message" => "Your Mobile Number is not in our Record");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		
		
		$result = mysqli_fetch_array($sql);
		
		$fm_id= $result['fm_id'];		
		$first_name=$result['first_name'];
		$middle_name=$result['middle_name'];
		$last_name=$result['last_name'];
		$mobile=$result['mobile'];
		
		$samuday=$result['samuday'];
		$profile_pic=$result['profile_pic'];
		$samuday_folder = strtolower($samuday);
		$samuday_folder = str_replace(" ","_",$samuday_folder);
		
		$profile_pic_url = "http://mevkahmedabad.org/images/profile/".$samuday_folder."/".$profile_pic;
		
		 $string = '0123456789';
		 $string_shuffled = str_shuffle($string); 
		 $otp = substr($string_shuffled, 0, 6);
		
		$query_old_delete = "DELETE FROM `otp` WHERE mobile = '$mobile'";					
		$sql_old_delete = mysqli_query($conn,$query_old_delete);
		
		$query_otp = "INSERT INTO `otp`(`mobile`, `name`, `otp`, `fm_id`) VALUES ('$mobile','$first_name','$otp','$fm_id')";					
		$sql_otp = mysqli_query($conn,$query_otp);
		
						
			
		        
		$return_array["OtpInfo"]["fm_id"] = $fm_id;
		$return_array["OtpInfo"]["family_id"] = $fm_id;
        $return_array["OtpInfo"]["first_name"] = $first_name;
		$return_array["OtpInfo"]["middle_name"] = $middle_name;
		$return_array["OtpInfo"]["last_name"] = $last_name;
		$return_array["OtpInfo"]["last_name"] = $last_name;
		$return_array["OtpInfo"]["mobile"] = $mobile;
		$return_array["OtpInfo"]["profile_pic"] = $profile_pic_url;
		$return_array["OtpInfo"]["otp"] = $otp;

        $return_array["status"] = $true;
        $return_array["message"] = "login successful";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
		
		$ch=curl_init();
		
			$msg = "Onetime Password (OTP) for your login is ".$otp;
			$msg = urlencode($msg);
			
			curl_setopt($ch,CURLOPT_URL,"http://ip.shreesms.net/smsserver/SMS10N.aspx?Userid=BPUNGI&UserPassword=12345&PhoneNumber=$mobile&Text=$msg");
			$output =curl_exec($ch);
			
			curl_close($ch);
    }
} else {
    $status = array("status" => $false, "message" => "Mobile Number cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
?>
