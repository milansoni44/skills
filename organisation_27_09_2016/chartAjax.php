<?php
//echo json_encode(array("success"=>1));
include("config.php");
if(isset($_POST["id"])){
    $id = $_POST['id'];
    $action = $_POST['act'];
    switch ($action)
    {
        case "courses_vs_complete_percentage":
        $user_course_query = "SELECT user_course.*,course_complete.*,courses.c_name_lan1 FROM `user_course` LEFT JOIN `course_complete` ON `course_complete`.c_id = `user_course`.cat_id LEFT JOIN `courses` ON `courses`.c_id = `user_course`.cat_id WHERE `user_course`.u_id = $id GROUP BY `course_complete`.`c_id`";
        $result_course = mysqli_query($conn, $user_course_query);
        $num = mysqli_num_rows($result_course);
        $topArr = array();
    //    $topArr[] = array('Courses', 'top line value in Cr.');
        if ($num > 0) {
            while ($row_course = mysqli_fetch_object($result_course)) {
                $data[] = $row_course;
            }
        }
        if (!empty($data)) {
            foreach ($data as $row_data) {
    //            if ($row_data->complete == NULL) {
    //                $temp_arr = array($row_data->c_name_lan1, 0);
    //                $topArr[] = $temp_arr;
    //            } else {
    //                $temp_arr = array($row_data->c_name_lan1, (int) $row_data->complete);
    //                $topArr[] = $temp_arr;
    //            }
                if ($row_data->complete == NULL) {
                    $temp_arr = array("name"=>$row_data->c_name_lan1, "y"=>0);
                    $topArr[] = $temp_arr;
                } else {
                    $temp_arr = array("name"=>$row_data->c_name_lan1, "y"=>(int) $row_data->complete);
                    $topArr[] = $temp_arr;
                }
            }
            echo json_encode($topArr);
        }else{
            echo json_encode(array("error"=>"no data found"));
        }
        exit;
    }
}else{
    echo "Hello";
}
