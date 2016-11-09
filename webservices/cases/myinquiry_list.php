<?php include("../config.php");?>

<?php include("checklogin.php");?>
<?php

if(isset($_GET['i_id'])){
	$i_id = $_GET['i_id'];
	$status = "On visit";
	$u_id = $_SESSION['id'];
	$second_round_date = date("Y-m-d");
	
	$query ="INSERT INTO `inquiry_status_update`(`i_id`, `second_round_date`, `status`, `u_id`) VALUES ('$i_id','$second_round_date','$status','$u_id')";
	$sql = mysqli_query($conn, $query);
		
	$query_update ="UPDATE `inquiry` SET `status`='$status' WHERE i_id = '$i_id'";
	$sql_update = mysqli_query($conn, $query_update);
	
	
	
	$query_detail = "SELECT * FROM `inquiry` WHERE i_id ='$i_id'";	
	$sql_detail = mysqli_query($conn,$query_detail);
	$result_detail= mysqli_fetch_array($sql_detail);
	

		$name_client = $result_detail["name"];
		$mobile_client = $result_detail["mobile"];
	
	
	
	
	/*Message to client start*/
	echo "<span style='display:none;'>";
			
	$ch=curl_init();

	$msg = "Dear Client, As per our appointment we are coming to meet you. Please call Mr.".$full_name." on Mobile no: ".$session_mobile." for any assistance. Log on quickdealproperty.com";
	$msg = urlencode($msg);
	
	curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=ugxcF8hoezk&MobileNo=$mobile_client&SenderID=QKDEAL&Message=$msg&ServiceName=TEMPLATE_BASED");
	$output =curl_exec($ch);
	
	curl_close($ch);
	echo "</span>";
	/*Message to client end*/
	
	
	/*Message to admin start*/
	echo "<span style='display:none;'>";
			
	$ch=curl_init();

	$msg = "Mr.".$full_name." is on visit to meet Mr.".$name_client;
	
	$msg = urlencode($msg);
	
	curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=ugxcF8hoezk&MobileNo=$admin_mobile&SenderID=QKDEAL&Message=$msg&ServiceName=TEMPLATE_BASED");
	$output =curl_exec($ch);
	
	curl_close($ch);
	echo "</span>";
	/*Message to admin end*/
	
	
	
	
	
	
	
	
	
	
	if($sql==1)
	{	
		echo  "<script>
					window.location.href='myinquiry_list.php'; 
			   </script>";
	   
	}
	else
	{
	
		 echo  "<script> 
					window.location.href='myinquiry_list.php'; 
			   </script>";
	}


}
	
	

?>
<!DOCTYPE html>

<html lang="en">

<head>

	<script>
    function confirmDelete(id){
		var answer = confirm('Do You Really Want To go on Visit');
		if(answer){
			window.location.href="myinquiry_list.php?i_id="+id;
		}
	}
    </script>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Inquiry List | Quickdeal Property</title>



	<!-- Global stylesheets -->

<!--	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
-->	<link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	<!-- Core JS files -->

	<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/ui/drilldown.js"></script>

	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/forms/selects/select2.min.js"></script>
	
    <script type="text/javascript" src="../assets/js/pages/datatables_sorting.js"></script>
	<script type="text/javascript" src="../assets/js/core/app.js"></script>
	<script type="text/javascript" src="../assets/js/navbar_fixed_secondary.js"></script>

	<!-- /theme JS files -->



</head>



<body>



	<?php include("menu.php");?>


	<!-- Page header -->

	<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Quickdeal Property</span> - My Inquiry List</h4>



				<!--<ul class="breadcrumb position-right">

					<li><a href="index.php">Home</a></li>

					<li><a href="layout_navbar_fixed_secondary.html">Starters</a></li>

					<li class="active">Fixed secondary</li>

				</ul>-->

			</div>

		</div>

	</div>

	<!-- /page header -->





	<!-- Page container -->

	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat"  style="overflow-x: scroll;">	

						

						<table class="table datatable-complex-header">
							<thead>
								<tr>
								  <th>#</th>
								  <th>Date</th>
                                  <th>On Visit</th>
								  <th>Name</th>
                                  <th>Mobile</th>
                                  <th>Email</th>
                                  <th>Location</th>
                                  <th>Requirement</th>
                                  <th>Status</th>
                                  <th>Option</th>                       
							  </tr>
							</thead>
							<tbody>
                            <?php
								$i = "1";
								$query = "SELECT inq.*,usr.full_name FROM `inquiry` AS inq 
											LEFT JOIN user AS usr ON usr.u_id = inq.assigned_to
											WHERE inq.assigned_to ='$uid' 
											ORDER BY i_id desc
											";
								
								$sql = mysqli_query($conn,$query);
								while($result= mysqli_fetch_array($sql)){
								
									$i_id = $result["i_id"];
									$name = $result["name"];
									$mobile = $result["mobile"];
									$email = $result["email"];
									$i_date = $result["i_date"];
									$i_date = date("d-m-Y", strtotime($i_date));
									$location = $result["location"];
									$requirment = $result["requirment"];
									$assigned_to = $result["assigned_to"];
									$insert_by = $result["insert_by"];
									$status = $result["status"];
									$full_name = $result["full_name"];
									        
							?>
								<tr>
									<td><?php echo $i++ ;?></td>
									<td><?php echo $i_date ;?></td>
                                    <td>
										<?php 
										$query_is = "SELECT * FROM `inquiry_status_update` WHERE i_id ='$i_id' AND u_id = $uid 
											ORDER BY is_id desc
											";
										$sql_is = mysqli_query($conn,$query_is);
										$result_is= mysqli_fetch_array($sql_is);
										$is_status = $result_is["status"];
										
										if(($is_status != "Reject" && $is_status != "Cancelled") || $status == "Pending"){
										?>
                                        <input type="button" value="On VIsit" class="btn btn-xs btn-success" onClick="confirmDelete(<?php echo $i_id ?>);" style="cursor:pointer;">
										<?php
										}?>
                                    </td>
                                    <td><?php echo $name ;?></td>
                                    <td><?php echo $mobile ;?></td>
                                    <td><?php echo $email ;?></td>
                                    <td><?php echo $location ;?></td>
                                    <td><?php echo $requirment ;?></td>
                                    <td><?php echo $status ;?></td>
                                    <td>
                                    	<?php 
										
										if(($is_status != "Reject" && $is_status != "Cancelled") || $status == "Pending"){
										?>
                                        <i class="icon-pencil"  onClick="window.location.href='inquiry_edit.php?i_id=<?php echo $i_id ;?>'" style="cursor:pointer;"></i>
                                    	
										<?php
										}?>
                                    	
                                    </td>
                                    
									
									
								</tr>
                            <?php
								}
							?>
                            </tbody> 
						</table>
					</div>
					<!-- /page length options -->
					
					<!-- Footer -->
					                 
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

