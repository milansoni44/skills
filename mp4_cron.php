<?php
	include("config.php");

$query = "select * from video";
$sql = mysqli_query($conn,$query);

while($result = mysqli_fetch_array($sql)){

	$v_id = $result['v_id'];
	
	#video1 url
	$v_url_lan1 = $result['v_url_lan2'];
	if($v_url_lan1 != ""){
	$query_check1 = "SELECT * FROM `video_mp4link` WHERE v_url = '$v_url_lan1'";
	$sql_check1 = mysqli_query($conn,$query_check1);
	$sql_num1 = mysqli_num_rows($sql_check1);
	if($sql_num1 == 0){
		#mp4 link start
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$v_url_lan1.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
		echo $result1 = curl_exec($ch);
		curl_close($ch);
	    $mp4link1 = (json_decode($result1)->files[2]->link);
    	#mp4 link end
		if($mp4link1 != ""){
		$query1 = "INSERT INTO `video_mp4link`(`v_url`, `v_mp4`) VALUES ('$v_url_lan1','$mp4link1')";
		$sql1 = mysqli_query($conn,$query1);
		}
		
	}
	
	}
	#video1 url
	
	#video2 url
	$v_url_lan2 = $result['v_url_lan3'];
	if($v_url_lan2 != ""){
	$query_check2 = "SELECT * FROM `video_mp4link` WHERE v_url = '$v_url_lan2'";
	$sql_check2 = mysqli_query($conn,$query_check2);
	$sql_num2 = mysqli_num_rows($sql_check2);
	if($sql_num2 == 0){
		#mp4 link start
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$v_url_lan2.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
		$result2 = curl_exec($ch);
		curl_close($ch);
	    $mp4link2 = (json_decode($result2)->files[2]->link);
    	#mp4 link end
		if($mp4link2 != ""){
		$query2 = "INSERT INTO `video_mp4link`(`v_url`, `v_mp4`) VALUES ('$v_url_lan2','$mp4link2')";
		$sql1 = mysqli_query($conn,$query2);
		}
		
	}
	
	}
	#video2 url

}


?>
