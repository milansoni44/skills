<?php

$true = 0;
$false = 1;
$c_id = !empty($_REQUEST['c_id']) ? $_REQUEST['c_id'] : "";
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";

$return_array = array();


	$query ="SELECT * FROM `courses` where p_id = '".$c_id."'";
	$sql = mysqli_query($conn, $query);
	$res_num = mysqli_num_rows($sql);
		
    if ($res_num == 0) {
        $status = array("status" => $false, "message" => "Sorry data not found");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		$i = 0;
		
   		$data_list = array();
		$data_det = array();
		
		while($data_res = mysqli_fetch_array($sql))
		{
						
			$cat_id = $data_res['c_id'];
			$query_num = "SELECT * FROM `video` where cat_id = ".$data_res['c_id'];	
			$sql_num = mysqli_query($conn,$query_num);			
			$vid_num = mysqli_num_rows($sql_num);
			if($vid_num > 0){
			$vid_num = $vid_num-1;
			}
			
			
			//rating average start
			$rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = ".$data_res['c_id'];
			$sql_rt = mysqli_query($conn, $rt_get);
			$rsrt = mysqli_fetch_array($sql_rt);
			$rt = $rsrt['rt'];
			
			$rate_get = "SELECT * FROM rating WHERE cat_id = ".$data_res['c_id'];
			$sql_rate = mysqli_query($conn, $rate_get);
			$rate_num = mysqli_num_rows($sql_rate);
			
			$total_rate = round($rt/$rate_num);
			//rating average end
			
			//total users number rating start
			$total_users_rat = "SELECT * FROM rating WHERE cat_id = ".$data_res['c_id'];
			$sql_total_users_rat = mysqli_query($conn, $total_users_rat);
			$user_rate_num = mysqli_num_rows($sql_total_users_rat);
			$user_rate = mysqli_fetch_array($sql_total_users_rat);			
			$user_rating = $user_rate['rate'];
			if($user_rating == "" || $user_rating == NULL || !isset($user_rating)){
			$user_rating = "0";
			}
			//total users number rating end
			
			//check take course start
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '".$data_res['c_id']."' AND u_id = '$u_id'";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			
			
			//watched video			
			$query_watch = "SELECT * FROM `video_view` AS vv 
							LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
							where vid.cat_id = '".$data_res['c_id']."' AND  vv.u_id = $u_id";	
			$sql_watch = mysqli_query($conn,$query_watch);			
			$check_watch = mysqli_num_rows($sql_watch);
			if($check_watch > 0){
			$check_watch = $check_watch-1;
			}
			
			$course_completed =  round(($check_watch / $vid_num) * 100) ;
			
			//total dration

			
			$query1 = "SELECT sec_to_time(sum(
    extract(hour from v_duration) * 3600
  + extract(minute from v_duration) * 60
  + extract(second from v_duration)
  )) as duration FROM `video` where cat_id = '".$data_res['c_id']."' ";	
	
			$sql1 = mysqli_query($conn,$query1);
			$rsDuration = mysqli_fetch_array($sql1); 
			$str_time = $rsDuration['duration'];
			
			$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

$time_seconds = round(($hours * 3600 + $minutes * 60 + $seconds)/60);
			
			
			if($check_cor >= 1)
			{
				$take_course = 1;
			}
			else
			{
				$take_course = 0;
			}
			//check take course end
			
			
			$data_det["c_id"] = $data_res['c_id'];
			$data_det["c_name_lan1"] = $data_res['c_name_lan1'];
			$data_det["c_name_lan2"] = $data_res['c_name_lan2'];
			$data_det["c_name_lan3"] = $data_res['c_name_lan3'];
			$data_det["c_name_lan4"] = $data_res['c_name_lan4'];
			$data_det["c_name_lan5"] = $data_res['c_name_lan5'];
			$data_det["c_name_lan6"] = $data_res['c_name_lan6'];
			$data_det["c_description_lan1"] = $data_res['c_description_lan1'];
			$data_det["c_description_lan2"] = $data_res['c_description_lan2'];
			$data_det["c_description_lan3"] = $data_res['c_description_lan3'];
			$data_det["c_description_lan4"] = $data_res['c_description_lan4'];
			$data_det["c_description_lan5"] = $data_res['c_description_lan5'];
			$data_det["c_description_lan6"] = $data_res['c_description_lan6'];
			$data_det["cat_v_url"] = $data_res['cat_v_url'];
			$data_det["c_icon"] = "http://aurseekho.com/images/icons/".str_replace(" ","%20",$data_res['c_icon']);
			$data_det["vid_num"] = $vid_num;
			$data_det["total_rate"] = $total_rate;
			$data_det["user_rate_num"] = $user_rating;
			$data_det["take_course"] = $take_course;
			$data_det["watched_total"] = $check_watch;
			$data_det["duration"] = $time_seconds." minutes";
			$data_det["course_completed"] = $course_completed;
			
			array_push($data_list, $data_det);
			$i++;
		}
		
		$return_array["data_list"] = $data_list;
		$return_array["status"] = $true;
        $return_array["message"] = "courses list";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
