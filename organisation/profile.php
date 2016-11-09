<?php include("header.php");?>


<?php
if(isset($_POST['submit']))
{
    	$u_id=$_SESSION['id'];
	$full_name=$_POST['full_name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$profile_pic=$_FILES['profile_pic']['name'];
//	$language=$_POST['language'];
//	$dob = $_POST["dob"];
	$state = $_POST["state"];
	$country = $_POST["country"];
//	$education = $_POST["education"];
//	$occupation = $_POST["occupation"];
	$phone = $_POST["phone"];
	$u_type='user';
	$u_name=$_POST['u_name'];
//	$password=$_POST['password'];
        $contact = $_POST['contact_person'];
//	$validity=$_POST['validity'];
//	$status=$_POST['status'];
//        $message = $_POST['message'];
//        $org_strength = $_POST['org_strength'];
	
	
	
	$exist_query ="SELECT * FROM user  WHERE  `email`= '$email' AND u_id != '$u_id'";
	$exist_sql = mysqli_query($conn, $exist_query);
	
	$exist_number = mysqli_num_rows($exist_sql);
	
	if($exist_number > 0){
			echo  "<script> 
						alert('This Email id is already registered with us.');
						
				   </script>";
	}
	else{
	
		$query ="UPDATE `user` SET `full_name`='$full_name',`email`='$email',`mobile`='$mobile',`u_name`='$u_name',`dob`='$dob',`state`='$state',`country`='$country',`education`='$education',`occupation`='$occupation',`phone`='$phone',`contact_person`= '$contact'";
                
		if($profile_pic != ""){
		$path = "../images/profile/".$profile_pic;	
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$path);
		  $query .= ", `profile_pic`='$profile_pic' ";
//                  unset($_SESSION['profile_pic']);
                  $_SESSION['profile_pic'] = $profile_pic;
		}
                
                $query .= " WHERE u_id ='$u_id'";
		
		$sql = mysqli_query($conn, $query);		
		
		if($sql==1)
		{
                    $_SESSION['uname'] = $email;
			echo  "<script> 
						alert('Successfully Updated');
						window.location.href='profile.php'; 
				   </script>";
		   
		}
		else
		{
			 echo  "<script> alert('Sorry Please try again..!!'); </script>";
			 header("Location: profile.php");
                         exit;
		}
	}

}
?>
  <div class="container">

    <div class="page-section">
      <div class="row">
		 <h4 class="page-section-heading">Profile</h4>
        <div class="col-md-8 col-md-offset-2">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">


            <!-- Panes -->
            <div class="tab-content">

              <div id="account" class="tab-pane active">                
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                 <?php  
						$u_id = $_SESSION['id'];
							$query = "SELECT * FROM `user` AS usr
										where usr.u_id = '$u_id'";	
								$sql = mysqli_query($conn,$query);
								$result= mysqli_fetch_array($sql);
								
									$u_id = $result["u_id"]; 
									$full_name = $result["full_name"];
									$email = $result["email"]; 
									$mobile = $result["mobile"];
									$u_name = $result["u_name"];
//									$password = $result["password"];
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
                                                                        $contact_person = $result["contact_person"];
//                                                                        $message = $result["message"];
//                                                                        $org_strength = $result["organisation_strength"];
							?>
							<input type="hidden"  name="u_id" value="<?php echo $u_id?>">
                  <div class="form-group">
                    <label for="company_logo" class="col-sm-2 control-label">Company Logo</label>
                    <div class="col-md-6">
                      <div class="media v-middle">
                        <div class="media-left">
                          <div class="icon-block width-100 bg-grey-100">
                            <img  src="../images/profile/<?php echo $profile_pic; ?>" alt="<?php echo $_SESSION["full_name"]; ?> " width="100" />
                          </div>
                        </div>
                        <div class="media-body">
                          <input name="profile_pic" class="btn btn-white btn-sm paper-shadow relative" type="file" id="company_logo">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="company" class="col-md-2 control-label">Company Name</label>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="full_name" class="form-control used" id="company" placeholder="Your company name" value="<?php echo $full_name;?>">
<!--                          <label for="inputEmail3">Company Name</label>-->
                        </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<!--                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">DOB</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control used" id="dob" placeholder="DOB (yyyy-mm-dd)" name="dob" value="<?php echo $dob;?>">
                          <label for="website">DOB (yyyy-mm-dd)</label>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div class="form-group">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" class="form-control used" id="email" placeholder="Email" value="<?php echo $email;?>">
                          <!--<label for="inputEmail3">Email address</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
<!--                  <div class="form-group">
                    <label for="password" class="col-md-2 control-label">Password</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input type="text" class="form-control used" id="password" placeholder="Password" name="password" value="<?php echo $password;?>" required>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div class="form-group">
                    <label for="state" class="col-md-2 control-label">State</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                          <input type="text" class="form-control used" id="state" placeholder="State" name="state" value="<?php echo $state;?>">
                          <!--<label for="website">State</label>-->
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
                          <!--<label for="website">Country</label>-->
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
                          <!--<label for="website">Mobile No.</label>-->
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
                          <!--<label for="website">Phone No.</label>-->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="contact_person" class="col-md-2 control-label">Contact Person</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" class="form-control used" id="contact_person" placeholder="Contact Person" name="contact_person" value="<?php echo $contact_person;?>">
                          <!--<label for="contact">Contact Person</label>-->
                        </div>
                      </div>
                    </div>
                  </div>
<!--                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Education</label>
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
                  </div>-->
                  
<!--                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Occupation</label>
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
                  </div>-->
                  <!--<div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">User Name</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control used" id="u_name" placeholder="User Name" name="u_name" value="<?php // echo $u_name;?>" required>
                          <label for="website">User Name</label>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  
                  
<!--                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Language</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="Language" name="language" required>
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
                  </div>-->
                  
<!--                   <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Validity</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control used" id="validity" placeholder="Validity (yyyy-mm-dd)" name="validity" value="<?php echo $validity;?>" required>
                          <label for="website">Validity (yyyy-mm-dd)</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Status</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="active" <?php if($status == 'active'){ echo "selected";}?>>Active</option>
                            <option value="deactive" <?php if($status == 'deactive'){ echo "selected";}?>>Deactive</option>
                         </select>
                      </div>
                    </div>
                  </div>-->
                  
<!--                  <div class="form-group">
                    <label for="message" class="col-md-2 control-label">Message</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <input type="text" class="form-control used" id="message" placeholder="Message" name="message" value="<?php echo $message;?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="org_strength" class="col-md-2 control-label">Organisation Strength</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <input type="text" class="form-control used" id="org_strength" placeholder="Organisation Strength" name="org_strength" value="<?php echo $org_strength;?>" />
                        </div>
                      </div>
                    </div>
                  </div>-->
                 
                  <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" name="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Update</button>
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