<?php

$true = 0;
$false = 1;

$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$mobile = !empty($_REQUEST['mobile']) ? $_REQUEST['mobile'] : "";



$returnValueArray = array();

    	 		 
				
		$query ="UPDATE `user` SET `mobile`='$mobile' WHERE u_id = '$u_id'";
		$sql = mysqli_query($conn, $query);

			
			if($sql==1)
			{	
			
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
