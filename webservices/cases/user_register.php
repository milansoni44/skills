<?php

$true = 0;
$false = 1;


$password = !empty($_REQUEST['password']) ? $_REQUEST['password'] : "";
$full_name = !empty($_REQUEST['full_name']) ? $_REQUEST['full_name'] : "";
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : "";
$mobile = !empty($_REQUEST['mobile']) ? $_REQUEST['mobile'] : "";



$returnValueArray = array();

    	 		 
		$query ="INSERT INTO `user`(`full_name`, `email`, `mobile`, `u_name`, `password`, `u_type`) VALUES ('$full_name','$email','$mobile','$email','$password','user')";
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
