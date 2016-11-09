<?php include("header.php");?>


<?php
if(isset($_POST['submit']))
{
	$full_name=$_POST['full_name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$profile_pic=$_FILES['profile_pic']['name'];
	$language=$_POST['language'];
	$u_type='user';
	$u_name=$_POST['u_name'];
	$password=rand(100000,999999);
	$validity=$_POST['validity'];
	$status=$_POST['status'];
	$dob = $_POST["dob"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$education = $_POST["education"];
	$occupation = $_POST["occupation"];
	$phone = $_POST["phone"];
	
	
	$limit_query ="SELECT * FROM user  WHERE  `add_by`= '$uid' and status = 'active'";
	$limit_sql = mysqli_query($conn, $limit_query);
	
	$limit_number = mysqli_num_rows($limit_sql);
	
	if($limit_number < $ulimit || $status == 'deactive'){
	
	
	$exist_query ="SELECT * FROM user  WHERE  `email`= '$email'";
	$exist_sql = mysqli_query($conn, $exist_query);
	
	$exist_number = mysqli_num_rows($exist_sql);
	
	if($exist_number > 0){
			echo  "<script> 
						alert('This Email id is already registered with us.');
						
				   </script>";
	}
	else{
	
		$path = "../images/profile/".$profile_pic;	
		move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$path);
		
		$query ="INSERT INTO `user`(`full_name`, `email`, `mobile`, `profile_pic`, `language`, `u_type`, `add_by`, `validity`, `status`, `dob`, `state`, `country`, `education`, `occupation`, `phone`) VALUES ('$full_name','$email','$mobile','$profile_pic','$language','$u_type','$uid','$validity','$status','$dob','$state','$country','$education','$occupation','$phone')";
		$sql = mysqli_query($conn, $query);
		
		$insert_id = mysqli_insert_id($conn);
		
		if($language == "" || $language == NULL || !isset($language)){
			$language = "lan2";
			}
		
		//welcome_email1
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'welcome_email1'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$welcome_email1 = $result_trans[$language];
		
		//welcome_email2
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'welcome_email2'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$welcome_email2 = $result_trans[$language];
		
		//welcome_email3
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'welcome_email3'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$welcome_email3 = $result_trans[$language];
		
		//welcome_email4
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'welcome_email4'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$welcome_email4 = $result_trans[$language];

		//email script start
		
		$var_key = md5($email);
		
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
			
			$mail->Subject = "Aur Seekho Acount Verification"; 
			//$mail->AddAddress("info@learning-delight.com", $name); //To address who will receive this email
			$mail->AddAddress($email, $full_name); //To address who will receive this email
			
			$mail->MsgHTML($welcome_email1."&nbsp;".$full_name.$welcome_email2.$email.$welcome_email3."
							
							
							<table>
								<tr>
									<td><b>Verification Link:</b></td>
									<td><a href='http://aurseekho.com/verification.php?key=".$var_key."&verify=".$insert_id."'> http://aurseekho.com/verification.php?key=".$var_key."&verify=".$insert_id."</a> </td>
								</tr>
							</table>
							
							<br>
							".$welcome_email4."
							AurSeekho</h2>
							<a href='http://aurseekho.com/'><img src='http://aurseekho.com/images/logo.png' height='70px' /></a>

			
			"); 
			
			
			$send = $mail->Send(); 		
				
			
		//email script end			
		
		if($sql==1)
		{	
			echo  "<script> 
						alert('Successfully Added');
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
						alert('You have reached your maximum user limit.');
						window.location.href='user_list.php'; 
				   </script>";
	}
	
	

}
?>

<link rel="stylesheet" href="css/datepicker3.css">
  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h4 class="page-section-heading">Add User <span class="pull-right"><a href="user_list.php"><button class="btn btn-sm btn-primary">User List</button></a></span></h4>

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">


            <!-- Panes -->
            <div class="tab-content">

              <div id="account" class="tab-pane active">                
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="profile_pic" class="col-sm-2 control-label">Profile Pic</label>
                    <div class="col-md-6">
                      <div class="media v-middle">
                        <div class="media-left">
                          <div class="icon-block width-100 bg-grey-100">
                          </div>
                        </div>
                        <div class="media-body">
                          <input name="profile_pic" class="btn btn-white btn-sm paper-shadow relative" type="file" id="profile_pic">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Full Name</label>
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="full_name" class="form-control used" id="inputEmail3" placeholder="Please enter your full name" value="<?php echo $full_name;?>" required>
<!--                          <label for="inputEmail3">Full Name</label>-->
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
                          <input type="text" class="form-control used" id="dob" placeholder="DOB (yyyy-mm-dd)" name="dob" value="<?php echo $dob;?>">
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
                          <input type="email" name="email" class="form-control used" id="email" placeholder="Email" value="<?php echo $email;?>" required>
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
                          <input type="text" class="form-control used" id="state" placeholder="State" name="state" value="<?php echo $state;?>">
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
                          <input type="text" class="form-control used" id="country" placeholder="Country" name="country" value="<?php echo $country;?>">
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
                          <input type="text" class="form-control used" id="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile;?>">
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
                          <input type="text" class="form-control used" id="phone" placeholder="Phone Number" name="phone" value="<?php echo $phone;?>">
<!--                          <label for="website">Phone No.</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Education" class="col-md-2 control-label">Education</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="Education" name="education">
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
                        <select class="form-control" id="Occupation" name="occupation">
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
                        <select class="form-control" id="Language" name="language">
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
                    <label for="validity_select" class="col-md-2 control-label">Validity</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
<!--                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control used" id="validity" placeholder="Validity (yyyy-mm-dd)" name="validity" value="<?php echo $validity;?>" required>
                          <label for="website">Validity (yyyy-mm-dd)</label>
                        </div>-->
                        <select class="form-control" id="validity_select" name="validity_select" required>
                            <option value="">Select Validity</option>
                            <option value="1m">1 Month</option>
                            <option value="3m">3 Month</option>
                            <option value="6m">6 Month</option>
                            <option value="1y">1 Year</option>
                         </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-material">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control used" id="validity" placeholder="Validity (yyyy-mm-dd)" name="validity1" value="<?php echo $validity;?>" disabled />
                                <input type="hidden" class="form-control used" id="validity_hidden" name="validity" />
                            </div>
                        </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="status" class="col-md-2 control-label">Status</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="status" name="status" required>
<!--                            <option value="">Select Status</option>-->
                            <option value="active" <?php if($status == 'active'){ echo "selected";}?>>Active</option>
                            <option value="deactive" <?php if($status == 'deactive'){ echo "selected";}?>>Deactive</option>
                         </select>
                      </div>
                    </div>
                  </div>
                 
                 
                  <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" name="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Add User</button>
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
    $("#validity_select").change(function(){
        var val = $(this).val();
        var today = new Date();
        var d = '';
        if(val == ''){
            alert("Please select validity");
            $("#validity").val("");
            $("#validity_hidden").val("");
            return false;
        }
        if(val == '1m'){
            var month = new Date(new Date(today).setMonth(today.getMonth()+2));
            d = month.getFullYear()+"-"+month.getMonth()+"-"+month.getDate();
            $("#validity").val(d);
            $("#validity_hidden").val(d);
            return false;
            
        }else if(val == "3m"){
            var month = new Date(new Date(today).setMonth(today.getMonth()+4));
            d = month.getFullYear()+"-"+month.getMonth()+"-"+month.getDate();
            $("#validity").val(d);
            $("#validity_hidden").val(d);
            return false;
        }else if(val == "6m"){
            var month = new Date(new Date(today).setMonth(today.getMonth()+7));
            d = month.getFullYear()+"-"+month.getMonth()+"-"+month.getDate();
            $("#validity").val(d);
            $("#validity_hidden").val(d);
            return false;
        }else{
            var month = new Date(new Date(today).setMonth(today.getMonth()+13));
            d = month.getFullYear()+"-"+month.getMonth()+"-"+month.getDate();
            $("#validity").val(d);
            $("#validity_hidden").val(d);
            return false;
        }
    });
</script> 