<?php

$true = 0;
$false = 1;
$uname = !empty($_REQUEST['uname']) ? $_REQUEST['uname'] : "";
$password = !empty($_REQUEST['password']) ? $_REQUEST['password'] : "";
$returnValueArray = array();

if (!empty($uname) && !empty($password)) {

    $login = true;
    // here login is query return value if empty then send error else return data 
	
	$query ="SELECT * FROM user where email='$uname' and password='$password'";
	$sql = mysqli_query($conn, $query);
	$res_num = mysqli_num_rows($sql);
		
    if ($res_num == 0) {
        $status = array("status" => $false, "message" => "Invalid Username or Password");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		
		
		$result = mysqli_fetch_array($sql);
		$u_id= $result['u_id'];
		$full_name= $result['full_name'];
		$mobile= $result['mobile'];
		$language= $result['language'];
		$dob= $result['dob'];
		$state= $result['state'];
		$country= $result['country'];
		$education= $result['education'];
		$occupation= $result['occupation'];
		$phone= $result['phone'];
		$email= $result['email'];
		
		//profile completion check
		$profile_chk = "SELECT * FROM user WHERE (full_name = '' OR email = ''  OR language = '' OR dob = '' OR state = '' OR country = '' OR education = '' OR occupation = '' OR mobile = '') AND u_id = '$u_id'";
		$sql_profile_chk = mysqli_query($conn,$profile_chk);
		$profile_chk = mysqli_num_rows($sql_profile_chk);
		
		if($profile_chk == 0){
		$profile_chk = 1;
		}
		else if($profile_chk == 1){
		$profile_chk = 0;
		}
		
		//profile completion check
		
		$profile_pic = "http://aurseekho.com/images/profile/".str_replace(" ","%20",$profile_pic);
		//$language = $result['language'];
		/*if($language == NULL || $language == ""){
		$language = "lan2";
		}*/
		        
		$return_array["UserInfo"]["u_id"] = $u_id;
        $return_array["UserInfo"]["full_name"] = $full_name;
		$return_array["UserInfo"]["mobile"] = $mobile;
		$return_array["UserInfo"]["email"] = $email;
		$return_array["UserInfo"]["profile_pic"] = $profile_pic;
		$return_array["UserInfo"]["language"] = $language;
		$return_array["UserInfo"]["dob"] = $dob;
		$return_array["UserInfo"]["state"] = $state;
		$return_array["UserInfo"]["country"] = $country;
		$return_array["UserInfo"]["education"] = $education;
		$return_array["UserInfo"]["occupation"] = $occupation;
		$return_array["UserInfo"]["phone"] = $phone;
		
		
		//education list
		$query_education = "SELECT * FROM education ORDER BY seq";
		$sql_education = mysqli_query($conn,$query_education);
		$education_list = array();
		$education_det = array();
		
		while($education_res = mysqli_fetch_array($sql_education))
		{
						
			$education_det["e_id"] = $education_res['e_id'];
			$education_det["e_value"] = $education_res['e_value'];
			
			array_push($education_list, $education_det);
			$i++;
		}
		//education list
		
		//education list
		$query_occupation = "SELECT * FROM occupation ORDER BY seq";
		$sql_occupation = mysqli_query($conn,$query_occupation);
		$occupation_list = array();
		$occupation_det = array();
		
		while($occupation_res = mysqli_fetch_array($sql_occupation))
		{
						
			$occupation_det["o_id"] = $occupation_res['o_id'];
			$occupation_det["o_value"] = $occupation_res['o_value'];
			
			array_push($occupation_list, $occupation_det);
			$i++;
		}
		//occupation list
		
		//language list
		$query_language = "SELECT * FROM language where status = 'active'";
		$sql_language = mysqli_query($conn,$query_language);
		$language_list = array();
		$language_det = array();
		
		while($language_res = mysqli_fetch_array($sql_language))
		{
						
			$language_det["l_name"] = $language_res['l_name'];
			$language_det["l_slug"] = $language_res['l_slug'];
			
			array_push($language_list, $language_det);
			$i++;
		}
		//language list
		
		
		
		
		$return_array["profile_chk"] = $profile_chk;
		$return_array["education_list"] = $education_list;
		$return_array["occupation_list"] = $occupation_list;
		$return_array["language_list"] = $language_list;
		$return_array["status"] = $true;
        $return_array["message"] = "login successful";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }
} else {
    $status = array("status" => $false, "message" => "Username Or Password cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
?>
