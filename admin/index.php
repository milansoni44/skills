<?php
include("config.php");

    if(isset($_POST["submit"]))
	{
		$u_name = $_POST["u_name"];
		$password = $_POST["password"];
		
		        $query = "Select * from user where u_name = '$u_name' and password ='$password' and u_type = 'admin'";
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
				    }
			        if($u_name == $u_name && $password == $dbpassword)
				    {
				        session_destroy();
						session_start();
						$_SESSION['id'] = $id;
	                    $_SESSION['admin'] = "skills_admin";
						$_SESSION['uname'] = $u_name;
			            $_SESSION['password'] = $password;
						$_SESSION['utype'] = $u_type;
			            header("Location: dashboard.php");
		            } 
		        }
		        else
		            {
			            echo  "<script> alert('Login Unsucessully'); </script>";
		            }
	       
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Skills Shiksha</title>

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
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body class="bg-slate-800">

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form action="" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div><img src="assets/images/cover.png" alt="Skills Shiksha" title="Skills Shiksha" width="100%" /></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="u_name">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" name="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
							</div>

						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-white">
						&copy; 2016. <a href="#" class="text-white">Skills Shiksha</a> by <a href="http://letsenkindle.com" class="text-white" target="_blank">Let's Enkindle.com</a>
					</div>
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
