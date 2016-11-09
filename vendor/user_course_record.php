<?php include("config.php");?>
<?php include("checklogin.php");?>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Course Record</span></h4>
						</div>

					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="">User Manage</a></li>
							<li class="active">User Course Record</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat" style="overflow-x: scroll;">	

						

						<table class="table datatable-complex-header">
							<thead>
								<tr>
									<th>#</th>
									<th>Course Name</th>
									<th>Total video</th>
                                    <th>Watched Video</th>
                                    <th>Course Persentage</th>
								</tr>
							</thead>
							<tbody>
                            <?php
								$user_id = $_GET['u_id'];
								$i = "1";
								$query = "SELECT * FROM `courses` WHERE p_id  != '0'";
								
								$sql = mysqli_query($conn,$query);
								while($result= mysqli_fetch_array($sql)){
								
									$c_id = $result["c_id"]; 
									$c_name_lan1 = $result["c_name_lan1"];
									
									
									$query_allvideo = "SELECT * FROM `video` WHERE cat_id = '$c_id'";		
									$sql_allvideo = mysqli_query($conn,$query_allvideo);
									$sql_allvideo_num = mysqli_num_rows($sql_allvideo);
									
									
									
									$query_vv_check = "SELECT * FROM `video_view` AS vv 
														LEFT JOIN video AS vid ON vid.v_id = vv.v_id
														WHERE cat_id = '$c_id' AND u_id = '$user_id'";		
									$sql_vv_check = mysqli_query($conn,$query_vv_check);
									
									$sql_vv_check_num = mysqli_num_rows($sql_vv_check);
									
									
									$query_cc = "SELECT * FROM `course_complete` where c_id = '$c_id' AND u_id = '$user_id'";	
	
									$sql_cc = mysqli_query($conn,$query_cc);
									$result_cc= mysqli_fetch_array($sql_cc);
									
										$complete = $result_cc["complete"];
										if($complete == ""){
											$complete = 0 ;
										}
									
							?>
								<tr>
									<td><?php echo $i++ ;?></td>
									<td><?php echo $c_name_lan1 ;?></td>
                                    <td><?php echo $sql_allvideo_num ;?></td>
                                    <td><?php echo $sql_vv_check_num ;?></td>
                                    <td><?php echo $complete ;?></td>
                                   
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
