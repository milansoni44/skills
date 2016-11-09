<?php

$true = 0;
$false = 1;
$c_id = !empty($_REQUEST['c_id']) ? $_REQUEST['c_id'] : "";
$u_id = !empty($_REQUEST['u_id']) ? $_REQUEST['u_id'] : "";

$return_array = array();


	$query ="SELECT * FROM `video` where cat_id = '".$c_id."'";
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
				$data_com["profile_pic"] = "http://learning-delight.com/skills/images/profile/".$result2['profile_pic'];
				$data_com["date"] = $result2['date']; 
				
				/*$query_sub_co = "SELECT * FROM `comment` AS cmt  
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
				
				
				$data_com["subcomment_array"] = $subcomment_array;*/
				
				array_push($comment_array, $data_com);
				$j++;
			}
			$data_det["comment_array"] = $comment_array;
			array_push($data_list, $data_det);
			$i++;
		}
		
		$return_array["data_list"] = $data_list;
		$return_array["status"] = $true;
        $return_array["message"] = "Video list";
        _sendResponse(200, '{ "data" : ' . json_encode($return_array) . '} ');
    }

?>
