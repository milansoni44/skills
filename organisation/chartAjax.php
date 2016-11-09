<?php

//echo json_encode(array("success"=>1));
include("config.php");
$month = "";
$year = "";
$c_id = "";
if (isset($_POST["id"]) || $_POST['c_id']) {
    $id = $_POST['id'];
    $c_id = $_POST['c_id'];
    $uid = $_POST['add_by'];
    $action = $_POST['act'];
    switch ($action) {
        case "courses_vs_complete_percentage":
            $user_course_query = "SELECT user_course.*,course_complete.*,courses.c_name_lan1 FROM `user_course` LEFT JOIN `course_complete` ON `course_complete`.c_id = `user_course`.cat_id LEFT JOIN `courses` ON `courses`.c_id = `user_course`.cat_id WHERE `user_course`.u_id = $id GROUP BY `course_complete`.`c_id`";
            $result_course = mysqli_query($conn, $user_course_query);
            $num = mysqli_num_rows($result_course);
            $topArr = array();
            if ($num > 0) {
                while ($row_course = mysqli_fetch_object($result_course)) {
                    $data[] = $row_course;
                }
            } else {
                echo json_encode(array("error" => "no data found"));
            }
            if (!empty($data)) {
                foreach ($data as $row_data) {
                    if ($row_data->complete == NULL) {
                        $temp_arr = array("name" => $row_data->c_name_lan1, "y" => 0);
                        $topArr[] = $temp_arr;
                    } else {
                        $temp_arr = array("name" => $row_data->c_name_lan1, "y" => (int) $row_data->complete);
                        $topArr[] = $temp_arr;
                    }
                }
                echo json_encode($topArr);
            } else {
                echo json_encode(array("error" => "no data found"));
            }
            exit;
            break;
        case "days_vs_person_video_duration":
            $month = $_POST['month'];
            $year = $_POST['year'];
            $dd = $year . "-" . $month . "-" . "01";
            $f_day = date('Y-m-01', strtotime($dd));
            $l_date = date('Y-m-t', strtotime($dd));
            $sql = "SELECT 
                    user.full_name,course_complete.cc_id,course_complete.c_id,course_complete.u_id,course_complete.complete,course_complete.date,video.v_duration,courses.c_name_lan1 
                    FROM `course_complete` 
                    LEFT JOIN user 
                    ON user.u_id = course_complete.u_id 
                    LEFT JOIN `video` 
                    ON `video`.cat_id = course_complete.c_id 
                    LEFT JOIN courses 
                    ON courses.c_id = course_complete.c_id 
                    WHERE MONTH(course_complete.date) = $month 
                    AND YEAR(course_complete.date) = $year
                    AND course_complete.u_id = $id
                    GROUP BY course_complete.c_id";
            
            
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_object($result)){
                    $data[] = $row;
                }
            }
            
            if(!empty($data)){
                foreach($data as $row_data){
                    $week = getWeeks($row_data->date, "monday");
                    $time = explode(":", $row_data->v_duration);
                    $sec = ($time[0]*60)+($time[1]*60)+$time[2];
                    $week_data[] = array(
                        "week"=>$week,
                        "full_name"=>$row_data->full_name,
                        "date"=>$row_data->date,
                        "duration"=>$sec,
                        "c_name_lan1"=>$row_data->c_name_lan1
                    );
                }
                foreach ($week_data as $value)
                {
                  if( ! isset($results[$value['week']]) )
                  {
                     $results[$value['week']] = 0;
                  }

                  $results[$value['week']] += $value['duration'];

                }
                
                foreach($results as $key => $value)
                {
                  $structured_results[] = array('week' => $key, 'duration' => $value);
                }
                
                $j = 1;
                $i = 0;
                foreach($structured_results as $sub){
                    if($sub['week'] != $j){
                        $out[]["week"] = $j;
                        $out[]['duration'] = 0;
                    }
                    $i++;
                    $j++;
                }
                $arr = array_merge($structured_results,$out); 
                foreach ($arr as $key => $row)
                {
                    if($p[$key] = $row['week']){
                        $newArray[] = $row;
                    }
                }
                array_multisort($arr, SORT_ASC, $p);
                foreach($arr as $a){
                    $final[] = array("name"=>$a['week'], "y"=> floatval($a['duration']));
                }
                
                
//                $newArr = array();
                echo json_encode($final);
            }else{
                echo json_encode(array("error" => "no data found"));
            }
            break;
        case "person_vs_course_completed_container":
            $sql = "SELECT course_complete.c_id, course_complete.u_id, course_complete.complete, courses.c_name_lan1, user.full_name
                FROM  `course_complete` 
                LEFT JOIN courses ON courses.c_id = course_complete.c_id
                LEFT JOIN user ON user.u_id = course_complete.u_id
                WHERE course_complete.c_id = $c_id 
                AND user.add_by = $uid
                ORDER BY course_complete.complete DESC";
            $result = mysqli_query($conn, $sql);
            if ($result && $result->num_rows != 0) {
                $num = mysqli_num_rows($result);
                while ($row = mysqli_fetch_object($result)) {
                    $data[] = $row;
                }
            } else {
                echo json_encode(array("error" => "no data found"));
                exit;
            }
            if (!empty($data)) {
                foreach ($data as $row_data) {
//                    $person_name = "[".$row_data->full_name."]";
                    $temp_arr = array("name" => $row_data->full_name, "y" => (int) $row_data->complete);
                    $top_Arr[] = $temp_arr;
                }
                echo json_encode($top_Arr);
            } else {
                echo json_encode(array("error" => "no data found"));
            }
            exit;
            break;
        case "category_courses_vs_video_duration":
            $sql = "SELECT vv.*,vid.cat_id,SUM( TIME_TO_SEC( `vid`.`v_duration` ) ) AS v_duration_temp,cor.p_id,cor.c_name_lan1 FROM video_view AS vv 
                    LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
                    LEFT JOIN courses AS cor ON vid.cat_id = cor.c_id
                    LEFT JOIN user as u ON u.u_id = vv.u_id 
                    WHERE u.add_by = '$uid' AND cor.p_id = $c_id GROUP BY cor.c_name_lan1 ORDER BY v_duration_temp DESC";
            $result = mysqli_query($conn, $sql);
            $sum_total = 0;
            if ($result && $result->num_rows != 0) {
                while ($row_cat = mysqli_fetch_object($result)) {
                    $tempArr[] = array($row_cat->c_name_lan1 => (int) $row_cat->v_duration_temp);
                }
            } else {
                echo json_encode(array("error" => "no data found"));
                exit;
            }
            $sumArray = array();

            foreach ($tempArr as $k => $subArray) {
                foreach ($subArray as $id => $value) {
                    $sumArray[$id]+=$value;
                }
            }

//                print_r($sumArray);exit;
            if (end($sumArray) == "") {
                array_pop($sumArray);
            }
//                print_r($sumArray);exit;
            if (!empty($subArray)) {
                foreach ($sumArray as $k => $v) {
                    $f = floatval(round($v / 3600, 2));
                    $total[] = $f;
                    $tempArr2[] = array("name" => $k, "y" => $f);
                }
//                    print_r($tempArr2);exit;
                $sum_total = array_sum($total);
                foreach ($tempArr2 as $row2) {
                    $precentage = floatval(round($row2['y'] * 100 / $sum_total, 2));
                    $temp_sum_array[] = array("name" => $row2['name'], "y" => $precentage);
                }

//                    print_r($temp_sum_array);exit;
            }
            echo json_encode($tempArr2);
            exit;
            break;
        case "category_courses_vs_video_percentage":
            $sql = "SELECT vv.*,vid.cat_id,SUM( TIME_TO_SEC( `vid`.`v_duration` ) ) AS v_duration_temp,cor.p_id,cor.c_name_lan1 FROM video_view AS vv 
                    LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
                    LEFT JOIN courses AS cor ON vid.cat_id = cor.c_id
                    LEFT JOIN user as u ON u.u_id = vv.u_id 
                    WHERE u.add_by = '$uid' AND cor.p_id = $c_id GROUP BY cor.c_name_lan1 ORDER BY v_duration_temp DESC";
            $result = mysqli_query($conn, $sql);

            $sum_total = 0;
            if ($result && $result->num_rows != 0) {
                while ($row_cat = mysqli_fetch_object($result)) {
                    $tempArr[] = array($row_cat->c_name_lan1 => (int) $row_cat->v_duration_temp);
                }
            } else {
                echo json_encode(array("error" => "no data found"));
                exit;
            }
//                print_r($tempArr);exit;
            $sumArray = array();

            foreach ($tempArr as $k => $subArray) {
                foreach ($subArray as $id => $value) {
                    $sumArray[$id]+=$value;
                }
            }

//                print_r($sumArray);exit;
            if (end($sumArray) == "") {
                array_pop($sumArray);
            }
//                print_r($sumArray);exit;
            if (!empty($subArray)) {
                foreach ($sumArray as $k => $v) {
                    $f = floatval(round($v / 3600, 2));
                    $total[] = $f;
                    $tempArr2[] = array("name" => $k, "y" => $f);
                }
//                    print_r($tempArr2);exit;
                $sum_total = array_sum($total);
                foreach ($tempArr2 as $row2) {
                    $precentage = floatval(round($row2['y'] * 100 / $sum_total, 2));
                    $temp_sum_array[] = array("name" => $row2['name'], "y" => $precentage);
                }

//                    print_r($temp_sum_array);exit;
            }
            echo json_encode($temp_sum_array);
            exit;
            break;
    }
} else {
    echo json_encode(array("error" => "no data found"));
    exit;
}

function weekOfMonth($date) {
    //Get the first day of the month.
    $firstOfMonth = strtotime(date("Y-m-d", $date));
    //Apply above formula.
    return intval(date("W", $date)) - intval(date("W", $firstOfMonth)) + 1;
}

function TimeToSec($time) {
    $sec = 0;
    foreach (array_reverse(explode(':', $time)) as $k => $v) $sec += pow(60, $k) * $v;
    return $sec;
}
/**
     * Returns the amount of weeks into the month a date is
     * @param $date a YYYY-MM-DD formatted date
     * @param $rollover The day on which the week rolls over
     */
    function getWeeks($date, $rollover)
    {
        $cut = substr($date, 0, 8);
        $daylen = 86400;

        $timestamp = strtotime($date);
        $first = strtotime($cut . "00");
        $elapsed = ($timestamp - $first) / $daylen;

        $weeks = 1;

        for ($i = 1; $i <= $elapsed; $i++)
        {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);

            $day = strtolower(date("l", $daytimestamp));

            if($day == strtolower($rollover))  $weeks ++;
        }

        return $weeks;
    }