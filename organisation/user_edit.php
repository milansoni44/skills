<?php include("header.php");?>


<?php
if(isset($_POST['submit']))
{
	$u_id=$_POST['u_id'];
//	$full_name=$_POST['full_name'];
//	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
//	$profile_pic=$_FILES['profile_pic']['name'];
//	$language=$_POST['language'];
//	$dob = $_POST["dob"];
//	$state = $_POST["state"];
//	$country = $_POST["country"];
//	$education = $_POST["education"];
//	$occupation = $_POST["occupation"];
//	$phone = $_POST["phone"];
//	$u_type='user';
//	$validity=$_POST['validity'];
//	$status=$_POST['status'];
	
	$limit_query ="SELECT * FROM user  WHERE  `add_by`= '$uid' and status = 'active' and u_id != $u_id";
	$limit_sql = mysqli_query($conn, $limit_query);
	
	$limit_number = mysqli_num_rows($limit_sql);
	
	if($limit_number < $ulimit || $status == 'deactive'){
	
	$exist_query ="SELECT * FROM user  WHERE  `email`= '$email' AND u_id != '$u_id'";
	$exist_sql = mysqli_query($conn, $exist_query);
	
	$exist_number = mysqli_num_rows($exist_sql);
	
	if($exist_number > 0){
			echo  "<script> 
						alert('This Email id is already registered with us.');
						
				   </script>";
	}
	else{
	
//		$query ="UPDATE `user` SET `full_name`='$full_name',`email`='$email',`mobile`='$mobile',`dob`='$dob',`state`='$state',`country`='$country',`education`='$education',`occupation`='$occupation',`phone`='$phone',  ";
                $query ="UPDATE `user` SET `email`='$email' ";
                
//		if($profile_pic != ""){
//		$path = "../images/profile/".$profile_pic;	
//			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$path);
//		  $query .= "`profile_pic`='$profile_pic', ";	
//		}
		  
//		$query .= "`language`='$language',`validity`='$validity',`status`='$status' WHERE u_id ='$u_id'";
		$query .= "WHERE u_id ='$u_id'";
		$sql = mysqli_query($conn, $query);
		

		//email script start
		/*include 'library.php'; 
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
							<table>
								<tr>
									<td>User ID:</td>
									<td>".$email."</td>
								</tr>
								<tr>
									<td>Password:</td>
									<td>".$password."</td>
								</tr>
							</table>
			
			"); 
			$send = $mail->Send(); 		*/
				
			
		//email script end	
		
		
		if($sql==1)
		{	
			echo  "<script> 
						alert('Successfully Updated');
						window.location.href='user_list.php'; 
				   </script>";
		   
		}
		else
		{
			 echo  "<script> alert('Sorry Please try again..!!'); </script>";
			 header("Location: user_list.php");
		}
	}
	}
	else{
			
			echo  "<script> 
						alert('You have reached your maximum active user limit.');
						window.location.href='user_list.php'; 
				   </script>";
	}

}
?>
<link rel="stylesheet" href="css/datepicker3.css">
  <div class="container">

    <div class="page-section">
      <div class="row">
		 <h4 class="page-section-heading">User Update</h4>
        <div class="col-md-8 col-md-offset-2">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">


            <!-- Panes -->
            <div class="tab-content">

              <div id="account" class="tab-pane active">                
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                 <?php  
							$u_id = $_GET['u_id'];
							$query = "SELECT * FROM `user` AS usr
										where usr.u_id = '$u_id'";	
								$sql = mysqli_query($conn,$query);
								$result= mysqli_fetch_array($sql);
								
									$u_id = $result["u_id"]; 
									$full_name = $result["full_name"];
									$email = $result["email"]; 
									$mobile = $result["mobile"];
									$u_name = $result["u_name"];
									$password = $result["password"];
									$profile_pic = $result["profile_pic"];  
									$language = $result["language"];
									$l_name = $result["l_name"];
									$u_type = $result["u_type"];
									$user_limit = $result["user_limit"]; 
									$status = $result["status"];
									$validity = $result["validity"]; 
									$dob = $result["dob"];
									$state = $result["state"];
									$country = $result["country"];
									$education = $result["education"];
									$occupation = $result["occupation"];
									$phone = $result["phone"];
							?>
							<input type="hidden"  name="u_id" value="<?php echo $u_id?>">
                  <div class="form-group">
                    <label for="profile_pic" class="col-sm-2 control-label">Profile Pic</label>
                    <div class="col-md-6">
                      <div class="media v-middle">
                        <div class="media-left">
                          <div class="icon-block width-100 bg-grey-100">
                            <img  src="../images/profile/<?php echo $profile_pic; ?>" alt="<?php echo $_SESSION["full_name"]; ?> " width="100" />
                          </div>
                        </div>
                        <div class="media-body">
                          <input name="profile_pic" class="btn btn-white btn-sm paper-shadow relative" type="file" id="profile_pic">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="full_name" class="col-md-2 control-label">Full Name</label>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="full_name" class="form-control used" id="full_name" placeholder="Your Full name" value="<?php echo $full_name;?>" disabled />
<!--                          <label for="inputEmail3">Full Name</label>-->
                        </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="dob" class="col-md-2 control-label">DOB</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control used" id="dob" placeholder="DOB (yyyy-mm-dd)" name="dob" value="<?php echo $dob;?>" disabled>
<!--                          <label for="website">DOB (yyyy-mm-dd)</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" class="form-control used" id="email" placeholder="Email" value="<?php echo $email;?>" >
<!--                          <label for="inputEmail3">Email address</label>-->
                        </div>
                      </div>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="state" class="col-md-2 control-label">State</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control used" id="state" placeholder="State" name="state" value="<?php echo $state;?>" disabled>
<!--                          <label for="website">State</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="country" class="col-md-2 control-label">Country</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control used" id="country" placeholder="Country" name="country" value="<?php echo $country;?>" disabled>
<!--                          <label for="website">Country</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mobile" class="col-md-2 control-label">Mobile No.</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                          <input type="text" class="form-control used" id="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile;?>" disabled>
<!--                          <label for="website">Mobile No.</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-md-2 control-label">Phone No.</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" class="form-control used" id="phone" placeholder="Phone Number" name="phone" value="<?php echo $phone;?>" disabled>
<!--                          <label for="website">Phone No.</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Education" class="col-md-2 control-label">Education</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                          <select class="form-control" id="Education" name="education" disabled>
                             <option value="" >Select Education</option>
                             
                             <?php
								$i = "1";
								$query = "SELECT * FROM `education`";
								
								$sql = mysqli_query($conn,$query);
								while($result= mysqli_fetch_array($sql)){
								
									$e_value = $result["e_value"]; 
							?>
							<option value="<?php echo $e_value;?>" <?php if($education == $e_value){ echo "selected";}?>><?php echo $e_value;?></option>
							<?php
								}
							?>
                         </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="Occupation" class="col-md-2 control-label">Occupation</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                          <select class="form-control" id="Occupation" name="occupation" disabled>
                             <option value="" >Select Occupation</option>
                             
                             <?php
                                    $i = "1";
                                    $query = "SELECT * FROM `occupation`";
                                    
                                    $sql = mysqli_query($conn,$query);
                                    while($result= mysqli_fetch_array($sql)){
                                    
                                        $o_value = $result["o_value"]; 
                                ?>
                                <option value="<?php echo $o_value;?>" <?php if($occupation == $o_value){ echo "selected";}?>><?php echo $o_value;?></option>
                                <?php
                                    }
                                ?>
                         </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Language" class="col-md-2 control-label">Language</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                          <select class="form-control" id="Language" name="language" disabled>
                            <option value="">Select Language</option>
							<?php
                                $i = "1";
                                $query = "SELECT * FROM `language` WHERE status = 'active'";
                                
                                $sql = mysqli_query($conn,$query);
                                while($result= mysqli_fetch_array($sql)){
                                
                                    $l_id1 = $result["l_id"]; 
                                    $l_name1 = $result["l_name"];
                                    $l_slug1 = $result["l_slug"];    
                            ?>
                            <option value="<?php echo $l_slug1;?>" <?php if($language == $l_slug1){ echo "selected";}?>><?php echo $l_name1;?></option>
                            <?php
                                }
                            ?>
                         </select>
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="validity" class="col-md-2 control-label">Validity</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control used" id="validity" placeholder="Validity (yyyy-mm-dd)" name="validity" value="<?php echo $validity;?>" disabled>
<!--                          <label for="website">Validity (yyyy-mm-dd)</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="status" class="col-md-2 control-label">Status</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                          <select class="form-control" id="status" name="status" disabled>
                            <option value="">Select Status</option>
                            <option value="active" <?php if($status == 'active'){ echo "selected";}?>>Active</option>
                            <option value="deactive" <?php if($status == 'deactive'){ echo "selected";}?>>Deactive</option>
                         </select>
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" name="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Update User</button>
                      <button type="button" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated  onClick="window.history.back()">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <!-- // END Panes -->

          </div>
          <!-- // END Tabbable Widget -->

          <br/>
          <br/>

        </div>
        

      </div>
    </div>

  </div>

<?php include("footer.php");?>

<!-- bootstrap datepicker -->
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $('#dob').datepicker({
      format: 'yyyy-mm-dd',
	  autoclose: true
    });
	
	$('#validity').datepicker({
      format: 'yyyy-mm-dd',
	  autoclose: true
    });
</script> 