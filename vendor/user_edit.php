<?php include("config.php");?>
<?php include("checklogin.php");?>

<?php
if(isset($_POST['submit']))
{
	$u_id=$_POST['u_id'];
	$full_name=$_POST['full_name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$profile_pic=$_FILES['profile_pic']['name'];
	$language=$_POST['language'];
	$u_type='user';
	$u_name=$_POST['u_name'];
	$password=$_POST['password'];
	$validity=$_POST['validity'];
	$status=$_POST['status'];
	
	$limit_query ="SELECT * FROM user  WHERE  `add_by`= '$uid' and status = 'active' and u_id != $u_id";
	$limit_sql = mysqli_query($conn, $limit_query);
	
	$limit_number = mysqli_num_rows($limit_sql);
	
	if($limit_number < $ulimit || $status == 'deactive'){
	
		$query ="UPDATE `user` SET `full_name`='$full_name',`email`='$email',`mobile`='$mobile',`u_name`='$u_name',`password`='$password', ";
		
		if($profile_pic != ""){
		$path = "../images/profile/".$profile_pic;	
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$path);
		  $query .= "`profile_pic`='$profile_pic', ";	
		}
		  
		  $query .= "`language`='$language',`validity`='$validity',`status`='$status' WHERE u_id ='$u_id'";
		
		$sql = mysqli_query($conn, $query);
		
		
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
	else{
			
			echo  "<script> 
						alert('You have reached your maximum active user limit.');
						window.location.href='user_list.php'; 
				   </script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aur Seekho</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<?php include("header.php");?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php include("menu.php");?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Edit</span></h4>
						</div>

					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="#">User Manage</a></li>
							<li class="active">User Edit</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Vertical form options -->
					<div class="row">
						<div class="col-md-6 col-md-offset-3">

							<!-- Basic layout-->
							<form action="" method="post" enctype="multipart/form-data">
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
							?>
							<input type="hidden"  name="u_id" value="<?php echo $u_id?>">
                            	<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">User Edit</h5>
										
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label>Full Name:</label>
											<input type="text" class="form-control" placeholder="Full Name" name="full_name" value="<?php echo $full_name;?>" required>
										</div>
										<div class="form-group">
											<label>Mobile:</label>
											<input type="text" class="form-control" placeholder="Mobile" name="mobile"  value="<?php echo $mobile;?>" required>
										</div> 
                                        <div class="form-group">
											<label>Email:</label>
											<input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email;?>">
										</div>      
                                        <div class="form-group">
											<label>Proile Pic:</label>
											<input type="file" class="file-styled" name="profile_pic">
										</div>                                   
                                        <div class="form-group">
											<label>User Name:</label>
											<input type="text" class="form-control" placeholder="User Name" name="u_name" value="<?php echo $u_name;?>" required>
										</div>
                                        <div class="form-group">
											<label>Password:</label>
											<input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $password;?>" required>
										</div>
                                        <div class="form-group">
											<label>Language:</label>
											<select name="language" class="form-control"  required>
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
                                        <div class="form-group">
											<label>Validity:</label>
											<input type="text" class="form-control" placeholder="Validity (yyyy-mm-dd)" name="validity" value="<?php echo $validity;?>" required>
										</div>
                                        <div class="form-group">
											<label>Status:</label>
											<select name="status" class="form-control" >
                                            	<option value="">Select Status</option>
                                                <option value="active" <?php if($status == 'active'){ echo "selected";}?>>Active</option>
                                                <option value="deactive" <?php if($status == 'deactive'){ echo "selected";}?>>Deactive</option>
                                            </select>
										</div>
                                         
										<div class="text-right">
											<button type="submit" name="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /basic layout -->

						</div>						
					</div>
					<!-- /vertical form options -->




					<!-- Footer -->
					<?php include("footer.php"); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
