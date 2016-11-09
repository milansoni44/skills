<?php

$true = 0;
$false = 1;

$return_array = array();


	$query ="SELECT * FROM `donation_for` ORDER BY df_id desc";
	$sql = mysqli_query($conn, $query);
	$res_num = mysqli_num_rows($sql);
		
    if ($res_num == 0) {
        $status = array("status" => $false, "message" => "Sorry data not found");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		$i = 0;
		
   		$data_list = array();
		$data_det = array();
		
		while($data_res = mysqli_fetch_array($sql))
		{
						
			$data_det["df_id"] = $data_res['df_id'];
			$data_det["df_name"] = $data_res['df_name'];
			
			array_push($data_list, $data_det);
			$i++;
		}
		
		$return_array["data_list"] = $data_list;
		$return_array["status"] = $true;
        $return_array["message"] = "Donation For list";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
