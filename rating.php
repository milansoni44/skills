<?php

include('config.php');
session_start();

if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $conn->real_escape_string($_POST['rate']);
	$cat_id = $conn->real_escape_string($_POST['cat_id']);
	$uid =$_SESSION['id'];
// check if user has already rated
    $sql = "SELECT `ur_id` FROM `rating` WHERE `u_id`='$uid' AND cat_id = '$cat_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $ur_id =  $row['ur_id'];
		
		$sql = "UPDATE `rating` SET `rate`='$rate' WHERE ur_id = '$ur_id'";
        if (mysqli_query($conn, $sql)) {
            echo "0";
        }
    } else {

        $sql = "INSERT INTO `rating` ( `rate`, `cat_id`, `u_id`) VALUES ('$rate','$cat_id','$uid'); ";
        if (mysqli_query($conn, $sql)) {
            echo "0";
        }
    }
}
$conn->close();
?>