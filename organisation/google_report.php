<?php 
    include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Google Date And Time Report</title>
        <meta charset="utf-8" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php 
            $category_list = "SELECT vv.*,vid.cat_id,SEC_TO_TIME(SUM( TIME_TO_SEC( `vid`.`v_duration` ) ) ) AS v_duration_temp,cor.p_id,cor1.c_name_lan1 FROM video_view AS vv 
                            LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
                            LEFT JOIN courses AS cor ON vid.cat_id = cor.c_id 
                            LEFT JOIN courses AS cor1 ON cor.p_id = cor1.c_id GROUP BY cor1.c_name_lan1 ORDER BY v_duration_temp DESC";
            $result_cat = mysqli_query($conn, $category_list);
            
            if($result_cat){
                while($row_cat = mysqli_fetch_object($result_cat)){
                    $tempArr[] = array($row_cat->c_name_lan1,  $row_cat->v_duration_temp);
                }
                $json = json_encode($tempArr);
//                    $count_size = count($data_cat);
//                    for($i = 0; $i<=$count_size; $i++){
//                        foreach($data_cat as $row_cat){
////                            $exp = explode(":", $row_cat->v_duration_temp);
////                            $sec = ($exp[0]*60)+($exp[1]*60) + $exp[2];
//                            $tempArr[] = array($row_cat->c_name_lan1=>(int)$row_cat->v_duration_temp);
//                        }
//                    }
            }
            echo $json;
//            echo json_encode($tempArr);
        ?>
        <div id="chart_div"></div>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

              var data = new google.visualization.DataTable();
//              data.addColumn('timeofday', 'Time Duration');
                data.addColumn('string','Categories');
                data.addColumn('timeofday','Time Duration');
//              data.addColumn('number', 'Emails Received');
                data.addRows(<?php echo $json; ?>);
//              data.addRows([
//                [[8, 30, 45], 5],
//                [[9, 0, 0], 10],
//                [[10, 0, 0, 0], 12],
//                [[10, 45, 0, 0], 13],
//                [[11, 0, 0, 0], 15],
//                [[12, 15, 45, 0], 20],
//                [[13, 0, 0, 0], 22],
//                [[14, 30, 0, 0], 25],
//                [[15, 12, 0, 0], 30],
//                [[16, 45, 0], 32],
//                [[16, 59, 0], 42]
//              ]);

              var options = google.charts.Bar.convertOptions({
                title: 'Report',
                height: 600,
                bars: 'horizontal' // Required for Material Bar Charts.
              });

              var chart = new google.charts.Bar(document.getElementById('chart_div'));

              chart.draw(data, options);
            }
        </script>
    </body>
</html>