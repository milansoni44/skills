<?php

$true = 0;
$false = 1;

$d_name = !empty($_REQUEST['d_name']) ? $_REQUEST['d_name'] : "";
$d_in_name_of = !empty($_REQUEST['d_in_name_of']) ? $_REQUEST['d_in_name_of'] : "";
$mobile = !empty($_REQUEST['mobile']) ? $_REQUEST['mobile'] : "";
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : "";
$amount = !empty($_REQUEST['amount']) ? $_REQUEST['amount'] : "";
$payment_type = !empty($_REQUEST['payment_type']) ? $_REQUEST['payment_type'] : "";
$cheque_no = !empty($_REQUEST['cheque_no']) ? $_REQUEST['cheque_no'] : "";
$bank_name = !empty($_REQUEST['bank_name']) ? $_REQUEST['bank_name'] : "";
$donation_head = !empty($_REQUEST['donation_head']) ? $_REQUEST['donation_head'] : "";
$d_date = !empty($_REQUEST['d_date']) ? $_REQUEST['d_date'] : "";
$d_time = !empty($_REQUEST['d_time']) ? $_REQUEST['d_time'] : "";
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$detail = !empty($_REQUEST['detail']) ? $_REQUEST['detail'] : "";



$returnValueArray = array();

    	 		 
		$query ="INSERT INTO `voucher`(`d_name`, `detail`, `mobile`, `email`, `amount`, `payment_type`, `cheque_no`, `bank_name`, `donation_head`, `d_date`, `d_time`, `u_id`) VALUES ('$d_name','$detail','$mobile','$email','$amount','$payment_type','$cheque_no','$bank_name','$donation_head','$d_date','$d_time','$u_id')";
		$sql = mysqli_query($conn, $query);
		
		$id = mysqli_insert_id($conn);
		
		$num= sprintf("%06d", $id);
		$r_no="V".$num;
		
		$query1 ="UPDATE `voucher` SET `receipt_no`='$r_no' WHERE d_id = '$id'";
		$sql1 = mysqli_query($conn, $query1);

			
			if($sql==1 && $sql1==1)
			{	
				$return_array["detail"] = $detail;
				$return_array["voucher_no"] = $r_no;
				$return_array["message"] = "Your Data is inserted";
				$return_array["status"] = $true;
			}
			else
			{
				 $return_array["message"] = "Sorry! Please try again Later ...";
				 $return_array["status"] = $false;
			}	
        
        
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');


?>
