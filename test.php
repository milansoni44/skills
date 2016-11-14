<?php
	include("config.php");

$query = "select * from video_temp";
$sql = mysqli_query($conn,$query);

while($result = mysqli_fetch_array($sql)){
$v_id = $result['v_id'];
$eng_name = $result['eng_name'];
$hi_name = $result['hi_name'];
$guj_name = $result['guj_name'];
$hi_url = $result['hi_url'];
$guj_url = $result['guj_url'];
$duration = $result['duration'];

$query1 = "UPDATE `video` SET `v_name_lan1`='$eng_name',`v_name_lan2`='$hi_name',`v_name_lan3`='$guj_name',`v_url_lan2`='$hi_url',`v_url_lan3`='$guj_url',`v_duration`='$duration' WHERE  v_id = '$v_id'";
$sql1 = mysqli_query($conn,$query1);

}


?>
