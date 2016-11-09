<?php

$true = 0;
$false = 1;
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$return_array = array();


	
		
    if ($u_id == "") {
        $status = array("status" => $false, "message" => "User ID can not be Blank.");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		
		//my course list start
		$query_mycourse = "SELECT * FROM user_course AS uc
					LEFT JOIN courses AS cor ON uc.cat_id = cor.c_id									
					WHERE u_id = '$u_id'";
		$sql_mycourse = mysqli_query($conn, $query_mycourse);		
		
		$i = 0;		
		$mycourse_list = array();
		$mycourse_det = array();
		
		while($mycourse_res = mysqli_fetch_array($sql_mycourse))
		{
						
			$c_id = $mycourse_res["c_id"];
			$c_name_lan1 = $mycourse_res['c_name_lan1'];
			$c_name_lan2 = $mycourse_res['c_name_lan2'];
			$c_name_lan3 = $mycourse_res['c_name_lan3'];
			$c_name_lan4 = $mycourse_res['c_name_lan4'];
			$c_name_lan5 = $mycourse_res['c_name_lan5'];
			$c_name_lan6 = $mycourse_res['c_name_lan6'];
			$c_description_lan1 = $mycourse_res['c_description_lan1'];
			$c_description_lan2 = $mycourse_res['c_description_lan2'];
			$c_description_lan3 = $mycourse_res['c_description_lan3'];
			$c_description_lan4 = $mycourse_res['c_description_lan4'];
			$c_description_lan5 = $mycourse_res['c_description_lan5'];
			$c_description_lan6 = $mycourse_res['c_description_lan6'];
			$c_icon = $mycourse_res["c_icon"];
			
			#watched wideo count start
			$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$u_id."' and video.cat_id = '$c_id'";		
			$sqlVV = mysqli_query($conn,$sqlVideoWatch);
			$rsCount = mysqli_fetch_array($sqlVV); 
			$intCount = $rsCount['count'];
			if($intCount > 0){
			$intCount = $intCount-1;
			}
			#watched wideo count end
			
			#total video num in category start
			$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
			$sql_vid_num = mysqli_query($conn,$query_vid_num);				
			$vid_num = mysqli_num_rows($sql_vid_num);
			if($vid_num > 0){
			$vid_num = $vid_num-1;
			}
			#total video num in category end
			
			#check course takken or not start
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $u_id";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			#check course takken or not start			
			
			
			#count Rating start
			$rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$c_id' ";
			$sql_rt = mysqli_query($conn, $rt_get);
			$rsrt = mysqli_fetch_array($sql_rt);
			
			$rt = $rsrt['rt'];
			
			$rate_get = "SELECT * FROM rating WHERE cat_id = '$c_id' ";
			$sql_rate = mysqli_query($conn, $rate_get);
			$rate_num = mysqli_num_rows($sql_rate);
						
			$total_rate = round($rt/$rate_num);
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
			
			#total minutes start
			$query1 = "SELECT sum(v_duration) as duration FROM `video` where cat_id = '$c_id' ";
			$sql1 = mysqli_query($conn,$query1);
			$rsDuration = mysqli_fetch_array($sql1); 
			$duration = $rsDuration['duration'];
			#total minutes end
			
			#percentage of course completion
			$percentage = round(($intCount / $vid_num) * 100) ;
			
		
			
			
			$mycourse_det["c_icon"] = "http://aurseekho.com/images/icons/".str_replace(" ","%20",$c_icon);
			$mycourse_det["c_id"] = $c_id;
			$mycourse_det["c_name_lan1"] = $c_name_lan1;
			$mycourse_det["c_name_lan2"] = $c_name_lan2;
			$mycourse_det["c_name_lan3"] = $c_name_lan3;
			$mycourse_det["c_name_lan4"] = $c_name_lan4;
			$mycourse_det["c_name_lan5"] = $c_name_lan5;
			$mycourse_det["c_name_lan6"] = $c_name_lan6;			
			$mycourse_det["c_description_lan1"] = $c_description_lan1;			
			$mycourse_det["c_description_lan2"] = $c_description_lan2;			
			$mycourse_det["c_description_lan3"] = $c_description_lan3;			
			$mycourse_det["c_description_lan4"] = $c_description_lan4;			
			$mycourse_det["c_description_lan5"] = $c_description_lan5;			
			$mycourse_det["c_description_lan6"] = $c_description_lan6;
			$mycourse_det["rating"] = $total_rate;
			$mycourse_det["total_video"] = $vid_num;
			$mycourse_det["watched_video"] = $intCount;
			$mycourse_det["percentage"] = $percentage;
			$mycourse_det["course_taken"] = $check_cor;
			$mycourse_det["duration"] = $duration;
			$mycourse_det["user_rating"] = $user_rating;
			
			
			array_push($mycourse_list, $mycourse_det);
			$i++;
		}
		//recent list end
		
		//Recommended list start
		$query_recommended = "SELECT * FROM `courses` AS cor  
                                LEFT JOIN user_course AS uc ON cor.c_id = uc.cat_id 
                                WHERE p_id != '0' 
                                GROUP BY c_id  
                                ORDER BY u_id";
		$sql_recommended = mysqli_query($conn, $query_recommended);		
		
		$i = 0;		
		$recommended_list = array();
		$recommended_det = array();
		
		while($recommended_res = mysqli_fetch_array($sql_recommended))
		{
						
			$c_id = $recommended_res["c_id"];
			$c_name_lan1 = $recommended_res['c_name_lan1'];
			$c_name_lan2 = $recommended_res['c_name_lan2'];
			$c_name_lan3 = $recommended_res['c_name_lan3'];
			$c_name_lan4 = $recommended_res['c_name_lan4'];
			$c_name_lan5 = $recommended_res['c_name_lan5'];
			$c_name_lan6 = $recommended_res['c_name_lan6'];
			$c_description_lan1 = $recommended_res['c_description_lan1'];
			$c_description_lan2 = $recommended_res['c_description_lan2'];
			$c_description_lan3 = $recommended_res['c_description_lan3'];
			$c_description_lan4 = $recommended_res['c_description_lan4'];
			$c_description_lan5 = $recommended_res['c_description_lan5'];
			$c_description_lan6 = $recommended_res['c_description_lan6'];
			$c_icon = $recommended_res["c_icon"];
			
			#watched wideo count start
			$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$u_id."' and video.cat_id = '$c_id'";		
			$sqlVV = mysqli_query($conn,$sqlVideoWatch);
			$rsCount = mysqli_fetch_array($sqlVV); 
			$intCount = $rsCount['count'];
			if($intCount > 0){
			$intCount = $intCount-1;
			}
			#watched wideo count end
			
			#total video num in category start
			$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
			$sql_vid_num = mysqli_query($conn,$query_vid_num);				
			$vid_num = mysqli_num_rows($sql_vid_num);
			if($vid_num > 0){
			$vid_num = $vid_num-1;
			}
			#total video num in category end
			
			#check course takken or not start
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $u_id";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			#check course takken or not start			
			
			
			#count Rating start
			$rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$c_id' ";
			$sql_rt = mysqli_query($conn, $rt_get);
			$rsrt = mysqli_fetch_array($sql_rt);
			
			$rt = $rsrt['rt'];
			
			$rate_get = "SELECT * FROM rating WHERE cat_id = '$c_id' ";
			$sql_rate = mysqli_query($conn, $rate_get);
			$rate_num = mysqli_num_rows($sql_rate);
						
			$total_rate = round($rt/$rate_num);
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
			
			
			#total minutes start
			$query1 = "SELECT sum(v_duration) as duration FROM `video` where cat_id = '$c_id' ";
			$sql1 = mysqli_query($conn,$query1);
			$rsDuration = mysqli_fetch_array($sql1); 
			$duration = $rsDuration['duration'];
			#total minutes end
			
			#percentage of course completion
			$percentage = round(($intCount / $vid_num) * 100) ;
			
			
			$recommended_det["c_icon"] = "http://aurseekho.com/images/icons/".str_replace(" ","%20",$c_icon);
			$recommended_det["c_id"] = $c_id;
			$recommended_det["c_name_lan1"] = $c_name_lan1;
			$recommended_det["c_name_lan2"] = $c_name_lan2;
			$recommended_det["c_name_lan3"] = $c_name_lan3;
			$recommended_det["c_name_lan4"] = $c_name_lan4;
			$recommended_det["c_name_lan5"] = $c_name_lan5;
			$recommended_det["c_name_lan6"] = $c_name_lan6;
			$recommended_det["c_description_lan1"] = $c_description_lan1;			
			$recommended_det["c_description_lan2"] = $c_description_lan2;			
			$recommended_det["c_description_lan3"] = $c_description_lan3;			
			$recommended_det["c_description_lan4"] = $c_description_lan4;			
			$recommended_det["c_description_lan5"] = $c_description_lan5;			
			$recommended_det["c_description_lan6"] = $c_description_lan6;
			$recommended_det["rating"] = $total_rate;
			$recommended_det["total_video"] = $vid_num;
			$recommended_det["watched_video"] = $intCount;
			$recommended_det["percentage"] = $percentage;
			$recommended_det["course_taken"] = $check_cor;
			$recommended_det["duration"] = $duration;
			$recommended_det["user_rating"] = $user_rating;
			
			
			array_push($recommended_list, $recommended_det);
			$i++;
		}
		//Recommended list end
		
		//New Course list start
		$query_newcor = "SELECT * FROM `courses` where p_id != '0' ORDER BY c_id desc";
		$sql_newcor = mysqli_query($conn, $query_newcor);		
		
		$i = 0;		
		$newcor_list = array();
		$newcor_det = array();
		
		while($newcor_res = mysqli_fetch_array($sql_newcor))
		{
						
			$c_id = $newcor_res["c_id"];
			$c_name_lan1 = $newcor_res['c_name_lan1'];
			$c_name_lan1 = $newcor_res['c_name_lan1'];
			$c_name_lan1 = $newcor_res['c_name_lan1'];
			$c_name_lan1 = $newcor_res['c_name_lan1'];
			$c_name_lan1 = $newcor_res['c_name_lan1'];
			$c_name_lan1 = $newcor_res['c_name_lan1'];
			$c_description_lan1 = $newcor_res['c_description_lan1'];
			$c_description_lan2 = $newcor_res['c_description_lan2'];
			$c_description_lan3 = $newcor_res['c_description_lan3'];
			$c_description_lan4 = $newcor_res['c_description_lan4'];
			$c_description_lan5 = $newcor_res['c_description_lan5'];
			$c_description_lan6 = $newcor_res['c_description_lan6'];
			$c_icon = $newcor_res["c_icon"];
			
			#watched wideo count start
			$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$uid."' and video.cat_id = '$c_id'";		
			$sqlVV = mysqli_query($conn,$sqlVideoWatch);
			$rsCount = mysqli_fetch_array($sqlVV); 
			$intCount = $rsCount['count'];
			if($intCount > 0){
			$intCount = $intCount-1;
			}
			#watched wideo count end
			
			#total video num in category start
			$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
			$sql_vid_num = mysqli_query($conn,$query_vid_num);				
			$vid_num = mysqli_num_rows($sql_vid_num);
			if($vid_num > 0){
			$vid_num = $vid_num-1;
			}
			#total video num in category end
			
			#check course takken or not start
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $u_id";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			#check course takken or not start			
			
			
			#count Rating start
			$rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$c_id' ";
			$sql_rt = mysqli_query($conn, $rt_get);
			$rsrt = mysqli_fetch_array($sql_rt);
			
			$rt = $rsrt['rt'];
			
			$rate_get = "SELECT * FROM rating WHERE cat_id = '$cat_id' ";
			$sql_rate = mysqli_query($conn, $rate_get);
			$rate_num = mysqli_num_rows($sql_rate);
						
			$total_rate = round($rt/$rate_num);
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
			
			
			#total minutes start
			$query1 = "SELECT sum(v_duration) as duration FROM `video` where cat_id = '$c_id' ";
			$sql1 = mysqli_query($conn,$query1);
			$rsDuration = mysqli_fetch_array($sql1); 
			$duration = $rsDuration['duration'];
			#total minutes end
			
			#percentage of course completion
			$percentage = ($intCount / $vid_num) * 100 ;
			
			
			$newcor_det["c_icon"] = "http://aurseekho.com/images/icons/".str_replace(" ","%20",$c_icon);
			$newcor_det["c_id"] = $c_id;
			$newcor_det["c_name_lan1"] = $c_name_lan1;
			$newcor_det["c_name_lan2"] = $c_name_lan2;
			$newcor_det["c_name_lan3"] = $c_name_lan3;
			$newcor_det["c_name_lan4"] = $c_name_lan4;
			$newcor_det["c_name_lan5"] = $c_name_lan5;
			$newcor_det["c_name_lan6"] = $c_name_lan6;
			$newcor_det["c_description_lan1"] = $c_description_lan1;			
			$newcor_det["c_description_lan2"] = $c_description_lan2;			
			$newcor_det["c_description_lan3"] = $c_description_lan3;			
			$newcor_det["c_description_lan4"] = $c_description_lan4;			
			$newcor_det["c_description_lan5"] = $c_description_lan5;			
			$newcor_det["c_description_lan6"] = $c_description_lan6;
			$newcor_det["rating"] = $total_rate;
			$newcor_det["total_video"] = $vid_num;
			$newcor_det["watched_video"] = $intCount;
			$newcor_det["percentage"] = $percentage;
			$newcor_det["course_taken"] = $check_cor;
			$newcor_det["duration"] = $duration;
			$newcor_det["user_rating"] = $user_rating;
			
			
			array_push($newcor_list, $newcor_det);
			$i++;
		}
		//New Course list end
		
		//My Completed Course list start
		$query_mycompleted = "SELECT * FROM `course_complete` AS cc 
								LEFT JOIN courses AS cor ON cc.c_id = cor.c_id 
								WHERE  cc.complete = '100' AND cc.u_id = '$u_id' ORDER BY cc.cc_id desc";
		$sql_mycompleted = mysqli_query($conn, $query_mycompleted);		
		
		$i = 0;		
		$mycompleted_list = array();
		$mycompleted_det = array();
		
		while($mycompleted_res = mysqli_fetch_array($sql_mycompleted))
		{
						
			$c_id = $mycompleted_res["c_id"];
			$c_name_lan1 = $mycompleted_res['c_name_lan1'];
			$c_name_lan2 = $mycompleted_res['c_name_lan2'];
			$c_name_lan3 = $mycompleted_res['c_name_lan3'];
			$c_name_lan4 = $mycompleted_res['c_name_lan4'];
			$c_name_lan5 = $mycompleted_res['c_name_lan5'];
			$c_name_lan6 = $mycompleted_res['c_name_lan6'];
			$c_description_lan1 = $mycompleted_res['c_description_lan1'];
			$c_description_lan2 = $mycompleted_res['c_description_lan2'];
			$c_description_lan3 = $mycompleted_res['c_description_lan3'];
			$c_description_lan4 = $mycompleted_res['c_description_lan4'];
			$c_description_lan5 = $mycompleted_res['c_description_lan5'];
			$c_description_lan6 = $mycompleted_res['c_description_lan6'];
			$c_icon = $mycompleted_res["c_icon"];
			
			#watched wideo count start
			$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$u_id."' and video.cat_id = '$c_id'";		
			$sqlVV = mysqli_query($conn,$sqlVideoWatch);
			$rsCount = mysqli_fetch_array($sqlVV); 
			$intCount = $rsCount['count'];
			if($intCount > 0){
			$intCount = $intCount-1;
			}
			#watched wideo count end
			
			#total video num in category start
			$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
			$sql_vid_num = mysqli_query($conn,$query_vid_num);				
			$vid_num = mysqli_num_rows($sql_vid_num);
			if($vid_num > 0){
			$vid_num = $vid_num-1;
			}
			#total video num in category end
			
			#check course takken or not start
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $u_id";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			#check course takken or not start			
			
			
			#count Rating start
			$rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$c_id' ";
			$sql_rt = mysqli_query($conn, $rt_get);
			$rsrt = mysqli_fetch_array($sql_rt);
			
			$rt = $rsrt['rt'];
			
			$rate_get = "SELECT * FROM rating WHERE cat_id = '$c_id' ";
			$sql_rate = mysqli_query($conn, $rate_get);
			$rate_num = mysqli_num_rows($sql_rate);
						
			$total_rate = round($rt/$rate_num);
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
			
			#total minutes start
			$query1 = "SELECT sum(v_duration) as duration FROM `video` where cat_id = '$c_id' ";
			$sql1 = mysqli_query($conn,$query1);
			$rsDuration = mysqli_fetch_array($sql1); 
			$duration = $rsDuration['duration'];
			#total minutes end
			
			
			
			$mycompleted_det["c_icon"] = "http://aurseekho.com/images/icons/".str_replace(" ","%20",$c_icon);
			$mycompleted_det["c_id"] = $c_id;
			$mycompleted_det["c_name_lan1"] = $c_name_lan1;
			$mycompleted_det["c_name_lan2"] = $c_name_lan2;
			$mycompleted_det["c_name_lan3"] = $c_name_lan3;
			$mycompleted_det["c_name_lan4"] = $c_name_lan4;
			$mycompleted_det["c_name_lan5"] = $c_name_lan5;
			$mycompleted_det["c_name_lan6"] = $c_name_lan6;
			$mycompleted_det["c_description_lan1"] = $c_description_lan1;			
			$mycompleted_det["c_description_lan2"] = $c_description_lan2;			
			$mycompleted_det["c_description_lan3"] = $c_description_lan3;			
			$mycompleted_det["c_description_lan4"] = $c_description_lan4;			
			$mycompleted_det["c_description_lan5"] = $c_description_lan5;			
			$mycompleted_det["c_description_lan6"] = $c_description_lan6;
			$mycompleted_det["rating"] = $total_rate;
			$mycompleted_det["total_video"] = $vid_num;
			$mycompleted_det["duration"] = $duration;
			$mycompleted_det["user_rating"] = $user_rating;
			
			
			array_push($mycompleted_list, $mycompleted_det);
			$i++;
		}
		//My Completed Course list end
		
		//category list start
		$query_category ="SELECT * FROM `courses` WHERE p_id = '0'";
		$sql_category = mysqli_query($conn, $query_category);		
		
		$i = 0;		
		$category_list = array();
		$category_det = array();
		
		while($category_res = mysqli_fetch_array($sql_category))
		{	
			$category_det["c_icon"] = "http://aurseekho.com/images/icons/".str_replace(" ","%20",$category_res['c_icon']);
			$category_det["c_id"] = $category_res['c_id'];
			$category_det["c_name_lan1"] = $category_res['c_name_lan1'];
			
			
			array_push($category_list, $category_det);
			$i++;
		}
		//category list end
		
		$return_array["category_list"] = $category_list;
		$return_array["mycourse_list"] = $mycourse_list;
		$return_array["recommended_list"] = $recommended_list;
		$return_array["newcor_list"] = $newcor_list;
		$return_array["mycompleted_list"] = $mycompleted_list;		
		$return_array["status"] = $true;
        $return_array["message"] = "Home Page Details";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
