<?php

include("config.php");

if(isset($_GET['key'])){

$query = "SELECT * FROM `signup` WHERE `var_key`='".$_GET['key']."'";
$sql = mysqli_query($conn,$query);
$sql_num = mysqli_num_rows($sql);

	if($sql_num >0){
		
		$result = mysqli_fetch_array($sql);
		$full_name = $result['full_name'];
		$email = $result['email'];
		$mobile = $result['mobile'];
		$password = $result['password'];
		
		$query_usr ="INSERT INTO `user`(`full_name`, `email`, `mobile`, `password`) VALUES ('$full_name','$email','$mobile','$password')";
		$sql_usr = mysqli_query($conn, $query_usr);
		$insert_id = mysqli_insert_id($conn);
		
		if($sql_usr == 1){
			
			session_destroy();
			session_start();
			$_SESSION['id'] = $insert_id;
			$_SESSION['skills'] = "skills_shiksha";
			$_SESSION['u_name'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['full_name'] = $full_name;
			
			$u_name = $_SESSION["u_name"];
			$uid = $_SESSION["id"];
			$full_name = $_SESSION["full_name"];
			
			echo  "<script> 
						alert('Congratulations! Your account is successfully activated.');
						window.location.href='dashboard.php'; 
				   </script>";			
		}else{
			echo  "<script> 
						alert('Sorry, Please Try Again.');
						window.location.href='logout.php'; 
				   </script>";
		}
	
	}else{
	
		echo  "<script> 
					alert('Sorry, You have wrong Verification Link Please Signup.');
					window.location.href='logout.php'; 
			   </script>";
	
	}



}


?>
