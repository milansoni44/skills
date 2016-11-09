<?php
	include("config.php");

$query = "select * from video";
$sql = mysqli_query($conn,$query);

while($result = mysqli_fetch_array($sql)){
$v_id = $result['v_id'];
$v_duration = $result['v_duration'];

$vid_dur = "00:".$v_duration;

$query1 = "UPDATE `video` SET `v_duration`='$vid_dur' WHERE  v_id = '$v_id'";
$sql1 = mysqli_query($conn,$query1);

}


?>
