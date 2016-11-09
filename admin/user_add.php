<?php include("config.php");?>
<?php include("checklogin.php");?>

<?php
if(isset($_POST['submit']))
{
	$full_name=$_POST['full_name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$profile_pic=$_FILES['profile_pic']['name'];
	$language=$_POST['language'];
	$u_type=$_POST['u_type'];
	$u_name=$_POST['u_name'];
	$password=$_POST['password'];
	$user_limit=$_POST['user_limit'];	
	$validity=$_POST['validity'];	
	$status=$_POST['status'];	
	
	$path = "../images/profile/".$profile_pic;	
	move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$path);
	
	$query ="INSERT INTO `user`(`full_name`, `email`, `mobile`, `u_name`, `password`, `profile_pic`, `language`, `u_type`, `user_limit`, `add_by`, `validity`, `status`) VALUES ('$full_name','$email','$mobile','$u_name','$password','$profile_pic','$language','$u_type','$user_limit','$uid','$validity','$status')";
	$sql = mysqli_query($conn, $query);
	
	
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add User</span></h4>
					  </div>

				  
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="#">User Manage</a></li>
							<li class="active">User Add</li>
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
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Add User</h5>
										
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label>Full Name:</label>
											<input type="text" class="form-control" placeholder="Full Name" name="full_name" required>
										</div>
										<div class="form-group">
											<label>Mobile:</label>
											<input type="text" class="form-control" placeholder="Mobile" name="mobile" required>
										</div> 
                                        <div class="form-group">
											<label>Email:</label>
											<input type="email" class="form-control" placeholder="Email" name="email">
										</div>   
                                        <div class="form-group">
											<label>Proile Pic:</label>
											<input type="file" class="file-styled" name="profile_pic">
										</div>                                    
                                        <?php /*?><div class="form-group">
											<label>User Name:</label>
											<input type="text" class="form-control" placeholder="User Name" name="u_name" required>
										</div><?php */?>
                                        <div class="form-group">
											<label>Password:</label>
											<input type="text" class="form-control" placeholder="Password" name="password" required>
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
													
														$l_id = $result["l_id"]; 
														$l_name = $result["l_name"];
														$l_slug = $result["l_slug"];    
												?>
                                                <option value="<?php echo $l_slug;?>"><?php echo $l_name;?></option>
                                                <?php
                                                	}
												?>
                                            </select>
										</div> 
                                        <div class="form-group">
											<label>User Type:</label>
                                            <select name="u_type" class="form-control"  required>
                                            	<option value="">Select User Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="vendor">Vendor</option>
                                                <option value="user">User</option>
                                            </select>
										</div>
                                        
                                        <div class="form-group" id="provinceselect" style="display:none;">
											<label>License Allocation:</label>
                                            <input type="number" class="form-control" placeholder="User Limit" name="user_limit">
										</div> 
                                        <div class="form-group">
											<label>Validity:</label>
											<input type="text" class="form-control" placeholder="Validity (yyyy-mm-dd)" name="validity" required>
										</div>
                                        <div class="form-group">
											<label>Status:</label>
											<select name="status" class="form-control" required>
                                            	<option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="deactive">Deactive</option>
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
<script type='text/javascript'> 

$('select[name=u_type]').change(function () {
        if ($(this).val() == 'vendor') {
            $('#provinceselect').show();
            $('#provinceselect').prop('required',true);
        } else {
            $('#provinceselect').prop('required',false);
            $('#provinceselect').hide();
        }
    });

</script>
</body>
</html>
