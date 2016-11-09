<?php

$true = 0;
$false = 1;

$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : "";


if (!empty($email)) {
$returnValueArray = array();

			$queryforgot = "SELECT * FROM user WHERE email = '$email'";
			$sqlforgot = mysqli_query($conn, $queryforgot);
			$forgot_num = mysqli_num_rows($sqlforgot);
			
			if($forgot_num > 0){
			$forgot_res= mysqli_fetch_array($sqlforgot);
			$full_name = $forgot_res['full_name'];
			$email = $forgot_res['email'];
			$password = $forgot_res['password'];
			
			$u_id = $forgot_res['u_id'];
			
			
			$token= mt_rand(100000, 999999);
			$token = md5($token);
			
			$queryreset = "UPDATE `user` SET `reset`='$token' WHERE email = '$email'";
			$sqlreset = mysqli_query($conn, $queryreset);
			
			$resetlink = "http://aurseekho.com/reset.php?key=".$token."&action=reset";
						
			//email script start
			include 'library1.php'; 
			include "classes1/class.phpmailer.php";	
			
				
				$mail	= new PHPMailer;
				$mail->IsSMTP(); 
				$mail->Host = SMTP_HOST;
				$mail->Port = SMTP_PORT; 
				$mail->SMTPAuth = true; 
				$mail->Username = SMTP_UNAME;
				$mail->Password = SMTP_PWORD;
				$mail->AddReplyTo("info@aurseekho.website", "Aur Seekho"); 
				$mail->SetFrom("info@aurseekho.website", "Aur Seekho"); 
				
				$mail->Subject = "Aur Seekho Acount Details"; 
				//$mail->AddAddress("info@learning-delight.com", $name); //To address who will receive this email
				$mail->AddAddress($email, $full_name); //To address who will receive this email
				$mail->MsgHTML("	
								<p>Hi ".$full_name.",</p>

								
								
								<table>
									<tr>
										<td>User ID:</td>
										<td>".$email."</td>
									</tr>
									<tr>
										<td>Password Reset Link:</td>
										<td>".$resetlink."</td>
									</tr>
								</table>
								
								<br>
								<h2>Team<br>
								AurSeekho</h2>
								<a href='http://aurseekho.com/'><img src='http://aurseekho.com/images/logo.png' height='70px' /></a>
								
				
				"); 
				$send = $mail->Send(); 		
					
				
			//email script end	
			
				$return_array["message"] = "Please Check Your Email ID for Password Reset Link.";
				$return_array["status"] = $true;			
			}
			
			else{
				$return_array["message"] = "Email ID not Registered with Us";
				$return_array["status"] = $false;
			}			
        
        
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');

} else {
    $status = array("status" => $false, "message" => "Email ID cannot be blank");
    _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
}
    	 		 
				
		


?>
