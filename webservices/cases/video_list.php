<?php

$true = 0;
$false = 1;
$c_id = !empty($_REQUEST['c_id']) ? $_REQUEST['c_id'] : "";
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";

$return_array = array();


	#count Rating start
	$rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$c_id' ";
	$sql_rt = mysqli_query($conn, $rt_get);
	$rsrt = mysqli_fetch_array($sql_rt);
	
	$rt = $rsrt['rt'];
	
	$rate_get = "SELECT * FROM rating WHERE cat_id = '$c_id' ";
	$sql_rate = mysqli_query($conn, $rate_get);
	$rate_num = mysqli_num_rows($sql_rate);
				
	$total_rate = round($rt/$rate_num);
	if($total_rate == "" || $total_rate == NULL || !isset($total_rate)){
	$total_rate = "0";
	}
	#count Rating end
	
	//total users number rating start
	$total_users_rat = "SELECT * FROM rating WHERE cat_id = '$c_id' AND u_id = '$u_id'";
	$sql_total_users_rat = mysqli_query($conn, $total_users_rat);
	$user_rate_num = mysqli_num_rows($sql_total_users_rat);
	$user_rate = mysqli_fetch_array($sql_total_users_rat);			
	$user_rating = $user_rate['rate'];
	if($user_rating == "" || $user_rating == NULL || !isset($user_rating)){
	$user_rating = "0";
	}
	//total users number rating end


	//course taken or not
	#total video
	$query_taken_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = '$u_id'";	
	$sql_taken_cor = mysqli_query($conn,$query_taken_cor);			
	$taken_cor_num = mysqli_num_rows($sql_taken_cor);
	if($taken_cor_num == "" || $taken_cor_num == NULL || !isset($taken_cor_num)){
	$taken_cor_num = "0";
	}
	
	
	//course complete percentage
	#total video
	$query_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
	$sql_num = mysqli_query($conn,$query_num);			
	$vid_num = mysqli_num_rows($sql_num);
	if($vid_num > 0){
	$vid_num = $vid_num-1;
	}
	
	#watched video
	$query_watch = "SELECT * FROM `video_view` AS vv 
					LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
					where vid.cat_id = '$c_id' AND  vv.u_id = '$u_id'";	
	$sql_watch = mysqli_query($conn,$query_watch);			
	$check_watch = mysqli_num_rows($sql_watch);
	if($check_watch > 0){
	$check_watch = $check_watch-1;
	}
	
	$course_completed =  round(($check_watch / $vid_num) * 100) ;
	//cpurse complete persentage
	$query ="SELECT * FROM `video` where cat_id = '".$c_id."'";
	$sql = mysqli_query($conn, $query);
	$res_num = mysqli_num_rows($sql);
	
	$data_res_mp4 = mysqli_fetch_array($sql);
	
	/*$video_mp4_lan1 = $data_res_mp4['v_url_lan1'];
	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch1, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$video_mp4_lan1.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
	$result_mp4_lan1 = curl_exec($ch1);
	curl_close($ch1);
	$mp4link1 = (json_decode($result_mp4_lan1)->files[2]->link);*/
	
	$video_mp4_v_id = $data_res_mp4['v_id'];
	$video_mp4_lan2 = $data_res_mp4['v_url_lan2'];
	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch2, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$video_mp4_lan2.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
	$result_mp4_lan2 = curl_exec($ch2);
	curl_close($ch2);	
	$mp4link2 = (json_decode($result_mp4_lan2)->files[2]->link);
	
	$video_mp4_lan3 = $data_res_mp4['v_url_lan3'];
	$ch3 = curl_init();
	curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch3, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$video_mp4_lan3.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
	$result_mp4_lan3 = curl_exec($ch3);
	curl_close($ch1);
	$mp4link3 = (json_decode($result_mp4_lan3)->files[2]->link);
	
	/*$video_mp4_lan4 = $data_res_mp4['v_url_lan4'];
	$ch4 = curl_init();
	curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch4, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$video_mp4_lan4.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
	$result_mp4_lan4 = curl_exec($ch4);
	curl_close($ch4);
	$mp4link4 = (json_decode($result_mp4_lan4)->files[2]->link);
	
	$video_mp4_lan5 = $data_res_mp4['v_url_lan5'];
	$ch5 = curl_init();
	curl_setopt($ch5, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch5, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$video_mp4_lan5.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
	$result_mp4_lan5 = curl_exec($ch5);
	curl_close($ch5);
	$mp4link5 = (json_decode($result_mp4_lan5)->files[2]->link);
	
	$video_mp4_lan6 = $data_res_mp4['v_url_lan6'];
	$ch6 = curl_init();
	curl_setopt($ch6, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch6, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch6, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$video_mp4_lan6.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
	$result_mp4_lan6 = curl_exec($ch6);
	curl_close($ch6);
	$mp4link6 = (json_decode($result_mp4_lan6)->files[2]->link);*/
		
    if ($res_num == 0) {
        $status = array("status" => $false, "message" => "Sorry data not found");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		$i = 0;
		
   		$data_list = array();
		$data_det = array();
		
		while($data_res = mysqli_fetch_array($sql_num))
		{
						
			/*$cat_id = $data_res['c_id'];
			$query_num = "SELECT * FROM `video` where cat_id = ".$data_res['c_id'];	
			$sql_num = mysqli_query($conn,$query_num);			
			$vid_num = mysqli_num_rows($sql_num);*/
			
			$query_check_cor = "SELECT * FROM `video_view` where v_id = '".$data_res['v_id']."' AND u_id = $u_id";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			
			if($check_cor >= 1)
			{
				$watch = 1;
			}
			else
			{
				$watch = 0;
			}
			$comment_array =array();
			$subcomment_array =array();
			
			$vid_id = $data_res['v_id'];
			$data_det["v_id"] = $data_res['v_id'];
			$data_det["cat_id"] = $data_res['cat_id'];
			$data_det["v_name_lan1"] = $data_res['v_name_lan1'];
			$data_det["v_name_lan2"] = $data_res['v_name_lan2'];
			$data_det["v_name_lan3"] = $data_res['v_name_lan3'];
			$data_det["v_name_lan4"] = $data_res['v_name_lan4'];
			$data_det["v_name_lan5"] = $data_res['v_name_lan5'];
			$data_det["v_name_lan6"] = $data_res['v_name_lan6'];
			$data_det["v_url_lan1"] = $data_res['v_url_lan1'];
			$data_det["v_url_lan2"] = $data_res['v_url_lan2'];
			$data_det["v_url_lan3"] = $data_res['v_url_lan3'];
			$data_det["v_url_lan4"] = $data_res['v_url_lan4'];
			$data_det["v_url_lan5"] = $data_res['v_url_lan5'];
			$data_det["v_url_lan6"] = $data_res['v_url_lan6'];			
			$data_det["v_duration"] = $data_res['v_duration']; 
			$data_det["watch"] = $watch;
			
			$query2 = "SELECT * FROM `comment` AS cmt  
						LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
						where cmt.v_id = '$vid_id' AND pco_id = '0' 
						ORDER BY cmt.co_id desc";	
			$j = 0;
			$sql2 = mysqli_query($conn,$query2);
			while($result2= mysqli_fetch_array($sql2)){
				
				$co_id = $result2['co_id'];
				
				$data_com["co_id"] = $result2['co_id'];
				$data_com["full_name"] = $result2['full_name'];
				$data_com["comment"] = $result2['comment'];
				$data_com["profile_pic"] = "http://aurseekho.com/images/profile/".$result2['profile_pic'];
				$data_com["date"] = $result2['date']; 
				
				$query_sub_co = "SELECT * FROM `comment` AS cmt  
							LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
							where cmt.v_id = '$vid_id' AND pco_id = $co_id 
							ORDER BY cmt.co_id desc";	
	
				$sql_sub_co = mysqli_query($conn,$query_sub_co);
				while($result_sub_co= mysqli_fetch_array($sql_sub_co)){
					
					$data_subcom["co_id_sub"] = $result_sub_co['co_id'];
					$data_subcom["full_name_sub"] = $result_sub_co['full_name'];
					$data_subcom["comment_sub"] = $result_sub_co['comment'];
					$data_subcom["profile_pic_sub"] = $result_sub_co['profile_pic'];
					$data_subcom["date_sub"] = $result_sub_co['date'];
					
					array_push($subcomment_array, $data_subcom);
				}
				
				
				$data_com["subcomment_array"] = $subcomment_array;
				
				array_push($comment_array, $data_com);
				$j++;
			}
			$data_det["comment_array"] = $comment_array;
			array_push($data_list, $data_det);
			$i++;
		}
		
		
		//comment list start
		$query_comment ="SELECT * FROM `comment` WHERE v_id = '1'";
		$query_comment ="SELECT * FROM `comment` AS cmt  
							LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
							where cmt.v_id = '1' 
							ORDER BY cmt.co_id desc";
		$sql_comment = mysqli_query($conn, $query_comment);		
		
		$i = 0;		
		$comment_list = array();
		$comment_det = array();
		
		while($comment_res = mysqli_fetch_array($sql_comment))
		{						
			
			$comment_det["co_id"] = $comment_res['co_id'];
			$comment_det["full_name"] = $comment_res['full_name'];
			$comment_det["comment"] = $comment_res['comment'];
			$comment_det["profile_pic"] = "http://aurseekho.com/images/profile/".$comment_res['profile_pic'];
			$comment_det["date"] = $comment_res['date']; 			
			
			array_push($comment_list, $comment_det);
			$i++;
		}
		//comment list end
		
		#start video		
		$query_first_vid="SELECT * FROM `intro_vid` where c_id = '".$c_id."'";
		$sql_comment_first_vid = mysqli_query($conn, $query_first_vid);
		$comment_res_first_vid = mysqli_fetch_array($sql_comment_first_vid);
		$cat_video = $comment_res_first_vid['v_url'];
		
		//$return_array["mp4link1"] = $mp4link1;
		$return_array["user_rating"] = $user_rating;
		$return_array["rating"] = $total_rate;
		$return_array["taken_cor_num"] = $taken_cor_num;
		$return_array["video_mp4_v_id"] = $video_mp4_v_id;
		$return_array["mp4link2"] = $mp4link2;
		$return_array["mp4link3"] = $mp4link3;
		/*$return_array["mp4link4"] = $mp4link4;
		$return_array["mp4link5"] = $mp4link5;
		$return_array["mp4link6"] = $mp4link6;*/
		$return_array["course_progress"] = $course_completed;
		$return_array["cat_video"] = $cat_video;
		$return_array["comment_list"] = $comment_list;
		$return_array["data_list"] = $data_list;
		$return_array["status"] = $true;
        $return_array["message"] = "Video list";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
