<?php

$true = 0;
$false = 1;
$fm_id = !empty($_REQUEST['fm_id']) ? $_REQUEST['fm_id'] : "";


$return_array = array();


	$query ="SELECT * FROM `family_master` WHERE  family_id='$fm_id'";
	$sql = mysqli_query($conn, $query);
	$res_num = mysqli_num_rows($sql);
		
    if ($res_num == 0) {
        $status = array("status" => $false, "message" => "Sorry data not found");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		
		
		$query_head ="SELECT * FROM `family_master` WHERE  fm_id='$fm_id'";
		$sql_head = mysqli_query($conn, $query_head);
		$res_head = mysqli_fetch_array($sql_head);
		
		$address=$res_head['address'];
		$mobile=$res_head['mobile'];
		$office_address=$res_head['office_address'];
		$native_place=$res_head['native_place'];
		
		$i = 0;
		
   		$data_list = array();
		$data_det = array();
		
		while($data_res = mysqli_fetch_array($sql))
		{
						
			$samuday=$data_res['samuday'];
			$profile_pic=$data_res['profile_pic'];
			$samuday_folder = strtolower($samuday);
			$samuday_folder = str_replace(" ","_",$samuday_folder);
			
			//$profile_pic_url = "http://mevkahmedabad.org/images/profile/".$samuday_folder."/".$profile_pic";
			$profile_pic_url = "http://mevkahmedabad.org/images/profile/".$samuday_folder."/".$profile_pic;
			
			$data_det["fm_id"] = $data_res['fm_id'];
			$data_det["first_name"] = $data_res['first_name'];
			$data_det["middle_name"] = $data_res['middle_name'];
			$data_det["last_name"] = $data_res['last_name'];
			$data_det["address"] = $data_res['address'];
			$data_det["mobile"] = $data_res['mobile'];
			
			$data_det["relation"] = $data_res['relation'];
			$data_det["dob"] = $data_res['dob'];
			$data_det["education"] = $data_res['education'];
			$data_det["marital_status"] = $data_res['marital_status'];
			$data_det["blood_group"] = $data_res['blood_group'];
			$data_det["gotra"] = $data_res['gotra'];			
			$data_det["city"] = $data_res['city'];
			$data_det["zip_code"] = $data_res['zip_code'];
			$data_det["state"] = $data_res['state'];
			$data_det["email"] = $data_res['email'];
			$data_det["office_address"] = $data_res['office_address'];			
			$data_det["is_active"] = $data_res['is_active'];
			$data_det["created_date"] = $data_res['created_date'];
			$data_det["created_by"] = $data_res['created_by'];
			$data_det["modified_date"] = $data_res['modified_date'];
			$data_det["modified_by"] = $data_res['modified_by'];
			$data_det["occupation"] = $data_res['occupation'];
			$data_det["native_place"] = $data_res['native_place'];
			$data_det["extra_info"] = $data_res['extra_info'];
			$data_det["father_in_low"] = $data_res['father_in_low'];
			$data_det["family_id"] = $data_res['family_id'];
			$data_det["head"] = $data_res['head'];
			$data_det["profile_pic"] = $profile_pic_url;
			$data_det["other_comm"] = $data_res['other_comm'];
			$data_det["approved"] = $data_res['approved'];
			$data_det["samuday"] = $data_res['samuday'];
			$data_det["expire_date"] = $data_res['expire_date'];
			
			array_push($data_list, $data_det);
			$i++;
		}
		
		$return_array["data_list"] = $data_list;
		$return_array["address"] = $address;
		$return_array["mobile"] = $mobile;
		$return_array["office_address"] = $office_address;
		$return_array["native_place"] = $native_place;
		$return_array["status"] = $true;
        $return_array["message"] = "All Member List";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>