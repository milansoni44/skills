<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */
	include('config.php');
	session_start();
	$action = $_REQUEST['act'];
	switch ($action)
	{
		case 'forgot':
			$email_forgot= $_REQUEST['email_forgot'];
			
			$queryforgot = "SELECT * FROM user WHERE email = '$email_forgot' AND u_type = 'vendor'";
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
			
			$resetlink = "http://aurseekho.com/organisation/reset.php?key=".$token."&action=reset";
						
			//email script start
			include 'library.php'; 
			include "classes/class.phpmailer.php";	
			
				
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
						
			echo "done";
			}
			else{
			echo "notdone";;
			}
			break;
		default:
			break;
	}
	
	
    