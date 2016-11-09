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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Recent  Watch Video</span></h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Recent  Watch Video</li>
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
									<th>Category</th>
                                    <th>Video Name</th>
									<th>Viewed by</th>
                                    <th>Date</th>
                                    <th>Time</th>
								</tr>
							</thead>
							<tbody>
                            <?php
								$i = "1";
								$query = "SELECT vv.*,vid.v_name_lan2,cor.c_name_lan2,usr.full_name FROM `video_view` AS vv
											LEFT JOIN video as vid ON vid.v_id = vv.v_id
											LEFT JOIN courses as cor ON vid.cat_id = cor.c_id
											LEFT JOIN user as usr ON usr.u_id = vv.u_id																						
											WHERE add_by  = '$uid'
											ORDER BY vv_id desc
											";
								
								$sql = mysqli_query($conn,$query);
								while($result= mysqli_fetch_array($sql)){
								
									$c_name_lan2 = $result["c_name_lan2"];
									$v_name_lan2 = $result["v_name_lan2"]; 
									$full_name = $result["full_name"];
									$date = $result["date"];
									
									$date1 = explode(" ",$date);
									$date = $date1[0];
									$time = $date1[1];
									
									$date = date("d-m-Y", strtotime($date));																
																		
							?>
								<tr>
									<td><?php echo $i++ ;?></td>
									<td><?php echo $c_name_lan2 ;?></td>
                                    <td><?php echo $v_name_lan2 ;?></td>
                                    <td><?php echo $full_name ;?></td>
                                    <td><?php echo $date ;?></td>
                                    <td><?php echo $time ;?></td>
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