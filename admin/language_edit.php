<?php include("config.php");?>
<?php include("checklogin.php");?>

<?php
if(isset($_POST['submit']))
{
	$l_id=$_POST['l_id'];
	$l_name=$_POST['l_name'];
	$l_code=$_POST['l_code'];
	$status=$_POST['status'];
	
	$query ="UPDATE `language` SET `l_name`='$l_name',`l_code`='$l_code',`status`='$status' WHERE l_id = '$l_id'";
	$sql = mysqli_query($conn, $query);
	
	
	if($sql==1)
	{	
		echo  "<script> 
					alert('Successfully Updated');
					window.location.href='language_list.php'; 
			   </script>";
	   
	}
	else
	{
		 echo  "<script> alert('Sorry Please try again..!!'); </script>";
		 header("Location: language_list.php");
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Language Edit</span></h4>
						</div>

					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="#">Language Manage</a></li>
							<li class="active">Language Edit</li>
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
							<form action="" method="post">
                            <?php  
							$l_id = $_GET['l_id'];
							$query = "SELECT * FROM `language` where l_id = '$l_id'";	
								$sql = mysqli_query($conn,$query);
								$result= mysqli_fetch_array($sql);
								
									$l_id = $result["l_id"]; 
									$l_name = $result["l_name"];
									$l_slug = $result["l_slug"]; 
									$l_code = $result["l_code"];
									$status = $result["status"];  
							?>
							<input type="hidden"  name="l_id" value="<?php echo $l_id?>">
                            	<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Language Edit</h5>
										
									</div>

									<div class="panel-body">
										<div class="form-group">
											<label>Language Name:</label>
											<input type="text" class="form-control" placeholder="Language Name" name="l_name" value="<?php echo $l_name;?>">
										</div>
										<div class="form-group">
											<label>Language Code:</label>
											<input type="text" class="form-control" placeholder="Language Code" name="l_code"  value="<?php echo $l_code;?>">
										</div> 
                                        <div class="form-group">
											<label>Labhuage Status:</label>
                                            <select name="status" class="form-control" >
                                            	<option value="">Select Status</option>
                                                <option value="active" <?php if($status == "active"){ echo "selected";}?>>Active</option>
                                                <option value="deactive" <?php if($status == "deactive"){ echo "selected";}?>>Deactive</option>
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
