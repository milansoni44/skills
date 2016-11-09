<?php include("config.php"); ?>
<!--<!DOCTYPE html>-->
<html>
    <head>
        <title>High Chart Demo</title>
        <meta charset="utf-8"/>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    </head>
    <body>
        <?php
        $user_course_query = "SELECT user_course.*,course_complete.*,courses.c_name_lan2 FROM `user_course` LEFT JOIN `course_complete` ON `course_complete`.c_id = `user_course`.cat_id LEFT JOIN `courses` ON `courses`.c_id = `user_course`.cat_id WHERE `user_course`.u_id = 1";
        $result_course = mysqli_query($conn, $user_course_query);
        $num = mysqli_num_rows($result_course);
        $topArr = array();
//        $topArr[] = array('Courses', 'top line value in Cr.');
        if ($num > 0) {
            while ($row_course = mysqli_fetch_object($result_course)) {
                $data[] = $row_course;
            }
        }
        if (!empty($data)) {
            foreach ($data as $row_data) {
                if ($row_data->complete == NULL) {
                    $temp_arr = array("name"=>$row_data->c_name_lan2, "y"=>0);
                    $topArr[] = $temp_arr;
                } else {
                    $temp_arr = array("name"=>$row_data->c_name_lan2, "y"=>(int) $row_data->complete);
                    $topArr[] = $temp_arr;
                }
            }
        }
        ?>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script>
            $(function () {
                // Create the chart
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Person Course Completed'
                    },
                    subtitle: {
                        text: 'Click the columns to view course.'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Complete Percentage'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}%'
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: <?php echo json_encode($topArr); ?>
                    }],
                });
            });
        </script>
    </body>
</html>