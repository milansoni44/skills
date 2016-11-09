<?php

$true = 0;
$false = 1;

$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$full_name = !empty($_REQUEST['full_name']) ? $_REQUEST['full_name'] : "";
$mobile = !empty($_REQUEST['mobile']) ? $_REQUEST['mobile'] : "";
$language = !empty($_REQUEST['language']) ? $_REQUEST['language'] : "";
$dob = !empty($_REQUEST['dob']) ? $_REQUEST['dob'] : "";
$state = !empty($_REQUEST['state']) ? $_REQUEST['state'] : "";
$country = !empty($_REQUEST['country']) ? $_REQUEST['country'] : "";
$education = !empty($_REQUEST['education']) ? $_REQUEST['education'] : "";
$occupation = !empty($_REQUEST['occupation']) ? $_REQUEST['occupation'] : "";
$phone = !empty($_REQUEST['phone']) ? $_REQUEST['phone'] : "";
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : "";


if (!empty($u_id) && !empty($full_name) && !empty($mobile) && !empty($language) && !empty($dob) && !empty($state) && !empty($country) && !empty($education) && !empty($occupation) && !empty($email)) {
$returnValueArray = array();

		$query ="UPDATE `user` SET `full_name`='$full_name',`email`='$email',`mobile`='$mobile',`dob`='$dob',`state`='$state',`country`='$country',`education`='$education',`occupation`='$occupation',`phone`='$phone', `language`='$language' WHERE u_id = '$u_id'";
		$sql = mysqli_query($conn, $query);

			
			if($sql==1)
			{	
			
				$return_array["u_id"] = $u_id;
				$return_array["full_name"] = $full_name;
				$return_array["email"] = $email;
				$return_array["mobile"] = $mobile;
				$return_array["dob"] = $dob;
				$return_array["state"] = $state;
				$return_array["country"] = $country;
				$return_array["education"] = $education;
				$return_array["occupation"] = $occupation;
				$return_array["phone"] = $phone;
				$return_array["language"] = $language;
				$return_array["message"] = "User Data is inserted";
				$return_array["status"] = $true;
			}
			else
			{
				 $return_array["message"] = "Sorry! Please try again Later ...";
				 $return_array["status"] = $false;
			}	
        
        
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');

} else {
    $status = array("status" => $false, "message" => "Username Details cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
    	 		 
				
		


?>
