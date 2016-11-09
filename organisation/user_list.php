<?php include("header.php");?>
<?php
if(isset($_GET['active'])){	

	$id = $_GET['id'];
	
	$limit_query ="SELECT * FROM user  WHERE  `add_by`= '$uid' and status = 'active'";
	$limit_sql = mysqli_query($conn, $limit_query);
	
	$limit_number = mysqli_num_rows($limit_sql);
	
	if($limit_number < $ulimit){
	
	$query ="UPDATE `user` SET `status`='active' WHERE u_id ='$id' ";
	$sql = mysqli_query($conn, $query);
	
	$query_user = "SELECT * FROM user WHERE u_id = '$id'";
	$sql_user = mysqli_query($conn, $query_user);
	$result_user = mysqli_fetch_array($sql_user);
	
	$email = $result_user['email'];
	$full_name = $result_user['full_name'];
	
	if($email != ""){
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
			$mail->MsgHTML("
							
							<p>Hi ".$full_name.",</p>

							<p>Welcome to AurSeekho!</p>
							
							<p>On AurSeekho, you can take hundreds of courses from the best instructors in your native language. Courses are open to anyone, and are available anytime, anywhere. Join and accomplish your learning goals, and discover what you're capable of today.</p>
							
							<p>AurSeekho envisions a world in which anyone, anywhere can transform their life through access to the best education. We�re here to help you reach your goals, and we can�t wait to see what you achieve!</p>
							
							<p>Your account email is: ".$email." . Use this email address when you login to your AurSeekho account. If you signed up with a social media account, please login using your account credentials.</p>
							
							<p>You can download our app � Android</p>
							
							
							<table>
								<tr>
									<td><b>Verification Link:</b></td>
									<td><a href='http://aurseekho.com/verification.php?key=".$var_key."&verify=".$id."'> http://aurseekho.com/verification.php?key=".$var_key."&verify=".$id."</a> </td>
								</tr>
							</table>
							
							<br>
							<h2>Team<br>
							AurSeekho</h2>
							<a href='http://aurseekho.com/'><img src='http://aurseekho.com/images/logo.png' height='70px' /></a>

			
			"); 
			$send = $mail->Send(); 		
				
			
		//email script end	
	}
	header('Location: user_list.php');
	
	}	
	else if($limit_number >= $ulimit){
		echo  "<script> 
					alert('You have reached your maximum active user limit.');
					window.location.href='user_list.php'; 
			   </script>";
	}
		

}

if(isset($_GET['deactive'])){	

	$id = $_GET['id'];	
	$query ="UPDATE `user` SET `status`='deactive' WHERE u_id ='$id' ";
	$sql = mysqli_query($conn, $query);
	
	$query_user = "SELECT * FROM user WHERE u_id = '$id'";
	$sql_user = mysqli_query($conn, $query_user);
	$result_user = mysqli_fetch_array($sql_user);
	
	$email = $result_user['email'];
	$full_name = $result_user['full_name'];
	
	if($email != ""){
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
			
			$mail->Subject = "Aur Seekho Acount Deactivated"; 
			//$mail->AddAddress("info@learning-delight.com", $name); //To address who will receive this email
			$mail->AddAddress($email, $full_name); //To address who will receive this email
			$mail->MsgHTML("	
							<p>Hi ".$full_name.",</p>

							<h3>Your Account With ".$email." User ID is Deactivate.</h3>
							<p>Please Visit <a href='http://aurseekho.com/'>Aur Seekho</a>.</p>							
							<br>
							<h2>Team<br>
							AurSeekho</h2>
							<a href='http://aurseekho.com/'><img src='http://aurseekho.com/images/logo.png' height='70px' /></a>
							
			
			"); 
			$send = $mail->Send(); 		
				
			
		//email script end
	}
		
	header('Location: user_list.php');
	
}
?>
<script>
	function confirmActive(id){
		var answer = confirm('Do You Really Want To Reactivate User ?');
		if(answer){
			window.location.href="user_list.php?active=true&id="+id;
		}
	}
	
	function confirmDeactive(id){
		var answer = confirm('Do You Really Want To Deactive User ?');
		if(answer){
			window.location.href="user_list.php?deactive=true&id="+id;
		}
	}
</script>

  <div class="container">
    

    <div class="page-section">
      <div class="row">
        <div class="col-md-12 col-lg-12">

  

          <h4 class="page-section-heading">User List</h4>
                   
          <div class="tabbable tabs-blocks">

            <!-- Tabs -->
            <ul class="nav nav-tabs" style="white-space: normal !important;">
              <li class="active"><a href="#active" data-toggle="tab">Active</a></li>
              <li><a href="#deactive" data-toggle="tab"> Inactive</a></li>
<!--              <li class="pull-right" style="margin: 14px 0;"><span><a href="user_add.php"><button class="btn btn-primary">Add User</button></a></span></li>-->
              <li class="pull-right">
                  <a href="user_add.php">
<!--                      <div class="col-xs-4 col-sm-3 col-lg-2">-->
<!--                        <div class="box">							
                                        <div class="icon" title="Add User">
                                            <div class="image"><i class="glyphicon glyphicon-plus" style="top: 14px !important;left: 1px !important;"></i></div>
                                        </div>
                                        <div class="space"></div>
                                </div> -->
<!--</div>--></a>
              </li>
            </ul>
            <!-- // END Tabs -->

            <!-- Panes -->
            <div class="tab-content">
              <div id="active" class="tab-pane active">
              <!-- Data table -->
                <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Last Login</th>
                      <!--<th>Mobile</th>-->
                      <th>Email</th>
                      <th>Language</th>
                      <th>Validity</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Last Login</th>
                      <!--<th>Mobile</th>-->
                      <th>Email</th>
                      <th>Language</th>
                      <th>Validity</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>               
                    <?php
                        $i = "1";
                        $query = "SELECT usr.*,lan.l_name FROM `user` AS usr 
                                    LEFT JOIN language AS lan ON lan.l_slug = usr.language WHERE usr.add_by = '$uid' AND usr.status = 'active'";
                        
                        $sql = mysqli_query($conn,$query);
                        while($result= mysqli_fetch_array($sql)){
                        
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
                            $add_by = $result["add_by"];
                            $validity = $result["validity"];
                            $last_login = $result['last_login'];
                            $status = $result["status"];         
                    ?>
                        <tr>
                            <td><?php echo $i++ ;?></td>
                            <td><?php echo $full_name ;?></td>
                            <td><?php echo $last_login; ?></td>
                            <!--<td><?php echo $mobile ;?></td>-->
                            <td><?php echo $email ;?></td>
                            <td><?php echo $l_name ;?></td>
                            <td><?php echo $validity ;?></td>
                            <td><a data-original-title="Edit" href="user_edit.php?u_id=<?php echo $u_id ;?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye"></i></a>
<!--                                <a data-original-title="View" href="user_course_record.php?u_id=<?php echo $u_id ;?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye"></i></a>	-->
                                <a data-original-title="Deactive" onClick="confirmDeactive(<?php echo $u_id ?>);" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="">Deactivate</a>				                     
                            </td>
                            
                        </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
                <!-- // Data table -->
              </div>
              <div id="deactive" class="tab-pane">
              <!-- Data table -->
                <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Language</th>
                      <th>Validity</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Language</th>
                      <th>Validity</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>               
                    <?php
                        $i = "1";
                        $query = "SELECT usr.*,lan.l_name FROM `user` AS usr 
                                    LEFT JOIN language AS lan ON lan.l_slug = usr.language WHERE usr.add_by = '$uid' AND usr.status = 'deactive'";
                        
                        $sql = mysqli_query($conn,$query);
                        while($result= mysqli_fetch_array($sql)){
                        
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
                            $add_by = $result["add_by"];
                            $validity = $result["validity"];
                            $status = $result["status"];         
                    ?>
                        <tr>
                            <td><?php echo $i++ ;?></td>
                            <td><?php echo $full_name ;?></td>
                            <td><?php echo $mobile ;?></td>
                            <td><?php echo $email ;?></td>
                            <td><?php echo $l_name ;?></td>
                            <td><?php echo $validity ;?></td>
                            <td><a data-original-title="Edit" href="user_edit.php?u_id=<?php echo $u_id ;?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye"></i></a>
<!--                                <a data-original-title="View" href="user_course_record.php?u_id=<?php echo $u_id ;?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye"></i></a>-->
                                <a data-original-title="Reactivate" onClick="confirmActive(<?php echo $u_id ?>);" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="">Reactivate</a>			                     
                            </td>
                            
                        </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
                <!-- // Data table -->
              </div>
            </div>
            <!-- // END Panes -->

          </div>
          <a href="./user_add.php">
            <div class="box pull-right">							
                <div class="icon" title="Add User">
                    <div class="image"><i class="glyphicon glyphicon-plus" style="top:-4px !important;left:1px !important;"></i></div>
                </div>
                <div class="space"></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

<?php include("footer.php");?>