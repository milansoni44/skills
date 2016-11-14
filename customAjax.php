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
		case 'checklogin':
			if (isset($_COOKIE['id']) && $_COOKIE['id'] != '')
			{
				echo 'login';
			}
			else
			{
				echo 'false';
			}
			break;
		case 'checkCourse':
			$intCatId = $_REQUEST['cat_id'];
			$uid = $_COOKIE['id'];
			$sqlVideoWatch = "SELECT count('uc_id') as count FROM user_course WHERE u_id='" . $uid . "' and cat_id = '$intCatId'";

			$sqlVV = mysqli_query($conn, $sqlVideoWatch);
			$rsCount = mysqli_fetch_array($sqlVV);
			$intCount = $rsCount['count'];
			if ($intCount > 0)
			{
				echo 'exit';
			}
			else
			{
				echo 'no';
			}
			break;
		case 'login':

			$u_name = $_REQUEST["u_name"];
			$password = $_REQUEST["password"];

			$query = "Select * from user where email = '$u_name' and password ='$password' and u_type = 'user'";
			$sql = mysqli_query($conn, $query);
			$numrow = mysqli_num_rows($sql);

			if ($numrow != 0)
			{
				while ($row = mysqli_fetch_array($sql))
				{
					$u_name = $row['email'];
					$dbpassword = $row['password'];
					$id = $row['u_id'];
					$u_type = $row['u_type'];
					$profile_pic = $row['profile_pic'];
					$full_name = $row['full_name'];
					$language = $row['language'];
					if($language == "" || $language == NULL || !isset($language)){
						$language = $_COOKIE["language"];
					}
					$add_by = $row['add_by'];
					if ($add_by != 0)
					{

						$query1 = "Select * from user where u_id = '$add_by'";
						$sql1 = mysqli_query($conn, $query1);
						$row1 = mysqli_fetch_array($sql1);
						$vendor_name = $row1['full_name'];
						$vendor_pic = $row1['profile_pic'];
					}
				}
				if ($u_name == $u_name && $password == $dbpassword)
				{
					
					session_destroy();
					$d = date('Y-m-d H:i:s');
					$sql_last_login = "UPDATE `user` SET `last_login` = '$d' WHERE u_id = '$id'";
					$res = mysqli_query($conn, $sql_last_login);
					session_start();
					setcookie("id", $id, time() + (31556926), "/"); // 31556926 = 1 year 
					setcookie("skills", "skills_shiksha", time() + (31556926), "/");
					setcookie("u_name", $u_name, time() + (31556926), "/");
					setcookie("password", $password, time() + (31556926), "/");
					setcookie("language", $language, time() + (31556926), "/");
					setcookie("full_name", $full_name, time() + (31556926), "/");
					setcookie("profile_pic", $profile_pic, time() + (31556926), "/");
					setcookie("add_by", $add_by, time() + (31556926), "/");
					setcookie("vendor_name", $vendor_name, time() + (31556926), "/");
					setcookie("vendor_pic", $vendor_pic, time() + (31556926), "/");
					
					
					$u_name = $_COOKIE["u_name"];
					$uid = $_COOKIE["id"];
					$full_name = $_COOKIE["full_name"];
					$profile_pic = $_COOKIE["profile_pic"];
					$add_by = $_COOKIE["add_by"];
					$vendor_name = $_COOKIE["vendor_name"];
					$vendor_pic = $_COOKIE["vendor_pic"];
					$language = $_COOKIE["language"];
					//header("Location: dashboard.php");
					
					echo "done";
				}
			}
			break;
		case 'takecourse':
			$uid= $_COOKIE['id'];
			
			$cat_id = $_POST['cat_id'];
			$sqlVideoWatch = "INSERT INTO `user_course`(`u_id`, `cat_id`, `status`) VALUES ('$uid','$cat_id','Active')";
			$sqlVV = mysqli_query($conn, $sqlVideoWatch);
			
			$query = "SELECT * FROM `video` WHERE cat_id = '$cat_id' LIMIT 0,1";	
			$sql = mysqli_query($conn,$query);
			$result = mysqli_fetch_array($sql);
			$vid_id = $result['v_id'];
			#add video as view video list
			$query1 = "SELECT * FROM `video` where v_id = '$vid_id' ";	
	
			$sql1 = mysqli_query($conn,$query1);
			$result1= mysqli_fetch_array($sql1);
			
				$v_name_str = "v_name_".$language; 
				$v_name_str = trim($v_name_str);
				$v_name = $result1[$v_name_str];
				$v_url_str = "v_url_".$language; 
				$v_url_str = trim($v_url_str);
				$v_url = $result1[$v_url_str];
				$vid_level = $result1["v_level"]; 
				$cat_id = $result1["cat_id"];
				
				
				$query_vv_check = "SELECT * FROM `video_view` WHERE v_id = '$vid_id' AND u_id = '$uid'";		
				$sql_vv_check = mysqli_query($conn,$query_vv_check);
				
				$sql_vv_check_num = mysqli_num_rows($sql_vv_check);
				
				if($sql_vv_check_num < 1){				
				$query_vv = "INSERT INTO `video_view`(`v_id`, `u_id`) VALUES ('$vid_id','$uid')";		
				$sql_vv = mysqli_query($conn,$query_vv);				
				}
				
				$query_vv_check = "SELECT * FROM `video_view` AS vv 
									LEFT JOIN video AS vid ON vid.v_id = vv.v_id
									WHERE cat_id = '$cat_id' AND u_id = '$uid'";		
				$sql_vv_check = mysqli_query($conn,$query_vv_check);				
				$sql_vv_check_num = mysqli_num_rows($sql_vv_check);	
				
				$query_allvideo = "SELECT * FROM `video` WHERE cat_id = '$cat_id'";		
				$sql_allvideo = mysqli_query($conn,$query_allvideo);
				$sql_allvideo_num = mysqli_num_rows($sql_allvideo);				
				
				$percentage =  ($sql_vv_check_num  * 100) / $sql_allvideo_num ;		
				$percentage = round($percentage); 
				
				$query_cc_check = "SELECT * FROM `course_complete` WHERE c_id = '$cat_id' AND u_id = '$uid'";		
				$sql_cc_check = mysqli_query($conn,$query_cc_check);
				
				$sql_cc_check_num = mysqli_num_rows($sql_cc_check);
				if($sql_cc_check_num < 1){				
				$query_cc = "INSERT INTO `course_complete`(`c_id`, `u_id`, `complete`) VALUES ('$cat_id','$uid','$percentage')";		
				$sql_cc = mysqli_query($conn,$query_cc);				
				}
				else{				
				$query_cc = "UPDATE `course_complete` SET `complete`='$percentage' WHERE c_id = '$cat_id' AND u_id = '$uid'";		
				$sql_cc = mysqli_query($conn,$query_cc);				
				}
			
			break;
		case 'signup':
			$full_name= $_REQUEST['full_name'];
			$mobile= $_REQUEST['mobile'];
			$email= $_REQUEST['email'];
			$password= $_REQUEST['u_password'];	
			
			$exist_query ="SELECT * FROM user  WHERE  `email`= '$email'";
			$exist_sql = mysqli_query($conn, $exist_query);
			
			$exist_number = mysqli_num_rows($exist_sql);
			
			if($exist_number > 0){
				echo  "notdone";
			}
			else{
			
			$token= mt_rand(100000, 999999);
			
			$var_key = md5($email);
			
			$querysignup = "INSERT INTO `signup`(`full_name`, `mobile`, `email`, `password`, `token`, `var_key`, `status`) VALUES ('$full_name','$mobile','$email','$password','$token','$var_key','1')";
			$sqlsignup = mysqli_query($conn, $querysignup);
			
			$insert_id = mysqli_insert_id($conn);
			
			
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
				
				$mail->Subject = "Aur Seekho Signup"; 
				//$mail->AddAddress("info@learning-delight.com", $name); //To address who will receive this email
				$mail->AddAddress($email, $full_name); //To address who will receive this email
				$mail->MsgHTML("	
								<p>Hi ".$full_name.",</p>

								<p>Welcome to AurSeekho!</p>
								
								<p>On AurSeekho, you can take hundreds of courses from the best instructors in your native language. Courses are open to anyone, and are available anytime, anywhere. Join and accomplish your learning goals, and discover what you're capable of today.</p>
								
								<p>AurSeekho envisions a world in which anyone, anywhere can transform their life through access to the best education. We’re here to help you reach your goals, and we can’t wait to see what you achieve!</p>
								
								<p>Your account email is: ".$email." . Use this email address when you login to your AurSeekho account. If you signed up with a social media account, please login using your account credentials. </p>
								
								<p>You can download our app – Android</p>
								
								
								<table>
									<tr>
										<td><b>Verification Link:</b></td>
										<td>http://aurseekho.com/email_verification.php?key=".$var_key."&tokan=".$token."&verify=".$insert_id."</td>
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
			break;			
		case 'forgot':
			$email_forgot= $_REQUEST['email_forgot'];
			
			$queryforgot = "SELECT * FROM user WHERE email = '$email_forgot'";
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
	
	
    