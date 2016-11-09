<?php

$true = 0;
$false = 1;

$return_array = array();


	$query ="SELECT * FROM `donor` AS dnr 
			LEFT JOIN user AS usr ON usr.u_id = dnr.u_id 			
			ORDER BY dnr.d_id desc";
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
						
			$data_det["t_id"] = $data_res['d_id'];
			$data_det["d_name"] = $data_res['d_name'];
			$data_det["d_in_name_of"] = $data_res['d_in_name_of'];
			$data_det["mobile"] = $data_res['mobile'];
			$data_det["email"] = $data_res['email'];
			$data_det["amount"] = $data_res['amount'];
			$data_det["receipt_no"] = $data_res['receipt_no'];
			$data_det["payment_type"] = $data_res['payment_type'];
			$data_det["cheque_no"] = $data_res['cheque_no'];
			$data_det["bank_name"] = $data_res['bank_name'];
			$data_det["donation_head"] = $data_res['donation_head'];
			$data_det["d_date"] = $data_res['d_date'];
			$data_det["d_time"] = $data_res['d_time'];
			$data_det["u_id"] = $data_res['u_id'];
			$data_det["taken_by"] = $data_res['f_name']." ".$data_res['l_name'];
			
			array_push($data_list, $data_det);
			$i++;
		}
		
		$return_array["data_list"] = $data_list;
		$return_array["status"] = $true;
        $return_array["message"] = "Donor list";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
