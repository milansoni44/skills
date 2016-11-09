<?php
include("config.php");

    if(isset($_POST["submit"]))
	{
		$u_name = $_POST["u_name"];
		$password = $_POST["password"];
		
		        $query = "Select * from user where u_name = '$u_name' and password ='$password'";
		        $sql = mysqli_query($conn,$query);
		        $numrow = mysqli_num_rows($sql);
                				
		        if($numrow != 0)
		        {
			        while($row=mysqli_fetch_array($sql))
			        {	
				        $u_name = $row['u_name'];
				        $dbpassword = $row['password'];
				        $id = $row['u_id'];
						$u_type = $row['u_type'];
						$profile_pic = $row['profile_pic'];
						$full_name = $row['full_name'];
						$language = $row['language'];
						$add_by = $row['add_by'];
						if($add_by != 0){
						
						$query1 = "Select * from user where u_id = '$add_by'";
						$sql1 = mysqli_query($conn,$query1);
						$row1=mysqli_fetch_array($sql1);
							$vendor_name = $row1['full_name'];
							$vendor_pic = $row1['profile_pic'];
						}
						
						
				    }
			        if($u_name == $u_name && $password == $dbpassword)
				    {
				        session_destroy();
						session_start();
						$_SESSION['id'] = $id;
	                    $_SESSION['skills'] = "skills_shiksha";
						$_SESSION['u_name'] = $u_name;
			            $_SESSION['password'] = $password;
						$_SESSION['language'] = $language;
						$_SESSION['full_name'] = $full_name;
						$_SESSION['profile_pic'] = $profile_pic;
						$_SESSION['add_by'] = $add_by;
						$_SESSION['vendor_name'] = $vendor_name;
						$_SESSION['vendor_pic'] = $vendor_pic;
						$u_name = $_SESSION["u_name"];
						$uid = $_SESSION["id"];
						$full_name = $_SESSION["full_name"];
						$profile_pic = $_SESSION["profile_pic"];
						$add_by = $_SESSION["add_by"];
						$vendor_name = $_SESSION["vendor_name"];
						$vendor_pic = $_SESSION["vendor_pic"];
			            //header("Location: dashboard.php");
						
		            } 
		        }
		        else
		            {
			            echo  "<script> alert('Login Unsucessully'); </script>";
		            }
	       
	}

?>
