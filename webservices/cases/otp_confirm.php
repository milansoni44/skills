<?php$true = 0;$false = 1;$mobile = !empty($_REQUEST['mobile']) ? $_REQUEST['mobile'] : "";$returnValueArray = array();if (!empty($uname) && !empty($password)) {    $login = true;    // here login is query return value if empty then send error else return data 		$query ="SELECT * family_master WHERE mobile = '$mobile' AND head = '1'";	$sql = mysqli_query($conn, $query);	$res_num = mysqli_num_rows($sql);		    if ($res_num == 0) {        $status = array("status" => $false, "message" => "Your Mobile Number is not in our Record");        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');    } else {						$result = mysqli_fetch_array($sql);				$fm_id= $result['fm_id'];				$first_name=$result['first_name'];		$mobile=$result['mobile'];				 $string = '0123456789';		 $string_shuffled = str_shuffle($string); 		 $otp = substr($string_shuffled, 0, 6);				$query_old_delete = "DELETE FROM `otp` WHERE mobile = '$mobile'";							$sql_old_delete = mysqli_query($conn,$query_old_delete);				$query_otp = "INSERT INTO `otp`(`mobile`, `name`, `otp`, `fm_id`) VALUES ('$mobile','$first_name','$otp','$fm_id')";							$sql_otp = mysqli_query($conn,$query_otp);							/*Message to client start*/			echo "<span style='display:none;'>";								$ch=curl_init();					$msg = "Onetime Password (OTP) for your login is ".$otp;			$msg = urlencode($msg);						curl_setopt($ch,CURLOPT_URL,"http://ip.shreesms.net/smsserver/SMS10N.aspx?Userid=BPUNGI&UserPassword=12345&PhoneNumber=$mobile&Text=$msg");			$output =curl_exec($ch);						curl_close($ch);			echo "</span>";			/*Message to client end*/						//$profile_pic_url = "http://mevkahmedabad.org/images/profile/".$samuday_folder."/".$profile_pic";		$profile_pic_url = "http://mevkahmedabad.org/images/profile/".$samuday_folder."/".$profile_pic;		        		$return_array["OtpInfo"]["mobile"] = $mobile;        $return_array["OtpInfo"]["first_name"] = $first_name;		$return_array["OtpInfo"]["otp"] = $otp;		$return_array["OtpInfo"]["last_name"] = $result['last_name'];		$return_array["OtpInfo"]["fm_id"] = $fm_id;        $return_array["status"] = $true;        $return_array["message"] = "OTP Sent  successful";        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');    }} else {    $status = array("status" => $false, "message" => "Username Or Password cannot be blank");    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');}?>