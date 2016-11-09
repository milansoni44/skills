<?php include("header.php");


if(isset($_POST['submit_user'])){
	
	$full_name = $_POST["full_name"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$language = $_POST["language"];
	$dob = $_POST["dob"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$education = $_POST["education"];
	$occupation = $_POST["occupation"];
	$phone = $_POST["phone"];
	$profile_pic = $_FILES['profile_pic']['name'];
	$u_id = $_SESSION['id'];
	
	$query_user ="UPDATE `user` SET `full_name`='$full_name',`email`='$email',`mobile`='$mobile',`dob`='$dob',`state`='$state',`country`='$country',`education`='$education',`occupation`='$occupation',`phone`='$phone', ";	
	
	if($profile_pic != ""){
		$_SESSION['profile_pic'] = $profile_pic;
		$path = "images/profile/".$profile_pic;	
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$path);
		  $query_user .= "`profile_pic`='$profile_pic', ";	
		}
	
		$query_user .= "`language`='$language' WHERE  `u_id`= '$u_id'";
	

		$sql_user = mysqli_query($conn, $query_user);
	
	
	if($sql_user==1)
	{	
		
	   echo  "<script> alert('Successfully Updated'); </script>";
		 header("location: profile.php");
	   
	}
	else
	{
		 echo  "<script> alert('Sorry Please try again..!!'); </script>";
		 header("location: profile.php");
	}
	
	
	
}
?>
<link rel="stylesheet" href="css/datepicker3.css">
  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-9">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">


            <!-- Panes -->
            <div class="tab-content">

              <div id="account" class="tab-pane active">
                <?php 
				$uid = $_SESSION['id'];
				$user_det = "SELECT * FROM user WHERE u_id = '$uid'";
				$query_user_det = mysqli_query($conn,$user_det);
				$user_res = mysqli_fetch_array($query_user_det);
				
				$full_name = $user_res["full_name"];
				$email = $user_res["email"];
				$mobile = $user_res["mobile"];
				$profile_pic = $user_res["profile_pic"];
				$language = $user_res["language"];
				$dob = $user_res["dob"];
				$state = $user_res["state"];
				$country = $user_res["country"];
				$education = $user_res["education"];
				$occupation = $user_res["occupation"];
				$phone = $user_res["phone"];
				?>
                
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Profile Pic</label>
                    <div class="col-md-6">
                      <div class="media v-middle">
                        <div class="media-left">
                          <div class="icon-block width-100 bg-grey-100">
                            <img  src="images/profile/<?php echo $_SESSION["profile_pic"]; ?>" alt="" width="100" />
                          </div>
                        </div>
                        <div class="media-body">
                          <input name="profile_pic" class="btn btn-white btn-sm paper-shadow relative" type="file">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Full Name</label>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-control-material">
                            <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" name="full_name" class="form-control used" id="inputEmail3" placeholder="Your Full name" value="<?php echo $full_name;?>">
                          <label for="inputEmail3">Full Name</label>
                        </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">DOB</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control used" id="datepicker" placeholder="DOB (yyyy-mm-dd)" name="dob" value="<?php echo $dob;?>" required>
                          <label for="website">DOB (yyyy-mm-dd)</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Email</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" class="form-control used" id="inputEmail3" placeholder="Email" value="<?php echo $email;?>" readonly="readonly">
                          <label for="inputEmail3">Email address</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">State</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="text" class="form-control used" id="state" placeholder="State" name="state" value="<?php echo $state;?>" required>
                          <label for="website">State</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Country</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="text" class="form-control used" id="country" placeholder="Country" name="country" value="<?php echo $country;?>" required>
                          <label for="website">Country</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Mobile No.</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="text" class="form-control used" id="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile;?>">
                          <label for="website">Mobile No.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Phone No.</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="text" class="form-control used" id="phone" placeholder="Phone Number" name="phone" value="<?php echo $phone;?>">
                          <label for="website">Phone No.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Education</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="Education" name="education" required>
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
                    <label for="inputEmail3" class="col-md-2 control-label">Occupation</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="Occupation" name="occupation" required>
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
                    <label for="inputEmail3" class="col-md-2 control-label">Language</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <select class="form-control" id="Language" name="language" required>
                             <option value="" >Select Language</option>
                             <?php
                                    $i = "1";
                                    $query = "SELECT * FROM `language` WHERE status = 'active'";
                                    
                                    $sql = mysqli_query($conn,$query);
                                    while($result= mysqli_fetch_array($sql)){
                                    
                                        $l_id = $result["l_id"]; 
                                        $l_name = $result["l_name"];
                                        $l_slug = $result["l_slug"];    
                                ?>
                                <option value="<?php echo $l_slug;?>" <?php if($language == $l_slug){ echo "selected";}?>><?php echo $l_name;?></option>
                                <?php
                                    }
                                ?>
                         </select>
                      </div>
                    </div>
                  </div>                 
                 
                  <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" name="submit_user" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Save</button>
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
        <div class="col-md-3">
          <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
              <h4 class="panel-title">My Account</h4>
            </div>
            <div class="panel-body list-group">
              <ul class="list-group list-group-menu">
                <li class="list-group-item"><a class="link-text-color" href="dashboard.php">Dashboard</a></li>
                <li class="list-group-item active"><a class="link-text-color" href="profile.php">Profile</a></li>
                <li class="list-group-item"><a class="link-text-color" href="logout.php"><span>Logout</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<?php include("footer.php");?>

<!-- bootstrap datepicker -->
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
	  autoclose: true
    });
</script>   
