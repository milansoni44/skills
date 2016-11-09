<?php
    include("config.php");
    $month = '09';
    $year = '2016';
    $query_date = $year."-".$month."-"."01";
    $f_date = date('Y-m-01', strtotime($query_date));
    $l_date = date('Y-m-t', strtotime($query_date));
    
    $last = explode("-", $l_date);
    $sql = "SELECT WEEKDAY(cc.date)AS weekdays,cc.cc_id,cc.c_id,cc.u_id,cc.complete,v.v_duration,cc.date,c.c_name_lan1
            FROM course_complete AS cc 
            LEFT JOIN video AS v ON v.cat_id = cc.c_id 
            LEFT JOIN `user` AS u ON u.u_id = cc.u_id 
            LEFT JOIN courses AS c ON c.c_id = cc.c_id 
            WHERE MONTH(cc.date) = '09' 
            AND YEAR(cc.date) = '2016' 
            AND u.u_id = '1' 
            GROUP BY cc.c_id
            ORDER BY cc.date ASC";
    $result = mysqli_query($conn, $sql);
    
    if($result->num_rows > 0){
        $week = 1;
        while($row = mysqli_fetch_object($result)){
            for($i = 0; $i <= $last[2]; $i++){
            
//                echo substr($row->date,-11, -9);
//                echo "<br/>";
//                echo substr($row->date,-11, -9) ."==". $i;
//                echo "<br/>";
                if(substr($row->date,-11, -9) == $i){
                    if($row->weekdays == $i){
                        $week++;
                    }
                }else{
                    
                }
            }
            $week++;
        }
        echo $week;
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
?>