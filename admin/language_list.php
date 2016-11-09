<?php include("config.php");?>
<?php include("checklogin.php");?>
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
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_sorting.js"></script>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Language List</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="user_add.php" class="btn btn-link btn-float has-text"><i class="icon-user-plus text-primary"></i><span>Add Language</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="">Language Manage</a></li>
							<li class="active">Language List</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">	

						

						<table class="table datatable-complex-header" style="overflow-x: scroll;">
							<thead>
								<tr>
									<th>#</th>
									<th>Language Name</th>
									<th>Language Code</th>
                                    <th>Status</th>
                                    <th>Option</th>
								</tr>
							</thead>
							<tbody>
                            <?php
								$i = "1";
								$query = "SELECT * FROM `language` ";
								
								$sql = mysqli_query($conn,$query);
								while($result= mysqli_fetch_array($sql)){
								
									$l_id = $result["l_id"]; 
									$l_name = $result["l_name"];
									$l_slug = $result["l_slug"]; 
									$l_code = $result["l_code"];
									$status = $result["status"];   
							?>
								<tr>
									<td><?php echo $i++ ;?></td>
									<td><?php echo $l_name ;?></td>
                                    <td><?php echo $l_code ;?></td>
                                    <td><?php echo $status ;?></td>
									<td><button class="btn-primary" onClick="window.location.href='language_edit.php?l_id=<?php echo $l_id ;?>'"><i class="icon-pencil"></i></button></td>
									
								</tr>
                            <?php
								}
							?>
                            </tbody> 
						</table>
					</div>
					<!-- /page length options -->




					
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
