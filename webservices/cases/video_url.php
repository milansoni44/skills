<?php

$true = 0;
$false = 1;
$v_url = !empty($_REQUEST['v_url']) ? $_REQUEST['v_url'] : "";
$c_id = !empty($_REQUEST['c_id']) ? $_REQUEST['c_id'] : "";
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";
$v_id = !empty($_REQUEST['v_id']) ? $_REQUEST['v_id'] : "";

$return_array = array();


		
    if ($v_url == "" || $c_id == "" || $u_id == "" || $v_id == "") {
        $status = array("status" => $false, "message" => "Data should Not Empty");
        _sendResponse(200, '{ "data" : ' . json_encode($status) . '} ');
    } else {
		
		//total vid end
		$query_num = "SELECT * FROM `video` where cat_id = ".$c_id;	
		$sql_num = mysqli_query($conn,$query_num);			
		$vid_num = mysqli_num_rows($sql_num);
		if($vid_num > 0){
		$vid_num = $vid_num-1;
		}
		//total vid end
		
		//watched video	end		
		$query_watch = "SELECT * FROM `video_view` AS vv 
						LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
						where vid.cat_id = '".$c_id."' AND  vv.u_id = $u_id";	
		$sql_watch = mysqli_query($conn,$query_watch);			
		$check_watch = mysqli_num_rows($sql_watch);
		if($check_watch > 0){
		$check_watch = $check_watch-1;
		}
		//watch video end
				
		#mp4 link start
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'https://api.vimeo.com/users/48281944/videos/'.$v_url.'?access_token=cb2fb13f37f16e864e5a137d0b413736');
		$result = curl_exec($ch);
		curl_close($ch);
	    $mp4link = (json_decode($result)->files[2]->link);
    	#mp4 link end
		
		#video list
		$query ="SELECT * FROM `video` where cat_id = '".$c_id."'";
		$sql = mysqli_query($conn, $query);
		$res_num = mysqli_num_rows($sql);
		$data_list = array();
			$data_det = array();
		
		while($data_res = mysqli_fetch_array($sql))
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
			
			array_push($data_list, $data_det);
			$i++;
		}
		
		//comment list start
		//$query_comment ="SELECT * FROM `comment` WHERE v_id = '".$v_id"'";
		$query_comment ="SELECT * FROM `comment` AS cmt  
							LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
							where cmt.v_id = '".$v_id."' 
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
		
		
		
		$return_array["total_video"] = $vid_num;
		$return_array["watched_video"] = $check_watch;
		$return_array["comment_list"] = $comment_list;
		$return_array["data_list"] = $data_list;
		$return_array["mp4link"] = $mp4link;
		$return_array["status"] = $true;
        $return_array["message"] = "Video Mp4 Link";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
