<?php
include("../../config.php");

$d_name = "snehal";


    	 		 
		$query ="INSERT INTO `donor`(`d_name`) VALUES ('$d_name')";
		$sql = mysqli_query($conn, $query);
		
		$id = mysqli_insert_id($conn);
		
		$num= sprintf("%06d", $id);
		$r_no="M".$num;
		$query1 ="UPDATE `donor` SET `receipt_no`='$r_no' WHERE d_id = '$id'";
		$sql1 = mysqli_query($conn, $query1);
	echo $sql1;
			
			


?>
