<?php include("header.php"); ?>

<div class="container">
    <?php 
        $total_users = "SELECT u_id FROM user WHERE add_by = '$uid'";
        $result_users = mysqli_query($conn, $total_users);
        if(mysqli_num_rows($result_users) > 0){
            while($row_users = mysqli_fetch_object($result_users)){
                $learning_hours = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(`video`.`v_duration`))) AS total_hours FROM video_view LEFT JOIN video ON video.v_id = video_view.v_id WHERE u_id = '".$row_users->u_id."' GROUP BY u_id";
                $result_hours = mysqli_query($conn, $learning_hours);
                $row_hours[] = mysqli_fetch_object($result_hours)->total_hours;
            }
        }
//        echo "<pre>";
//        print_r($row_hours);
//        echo "</pre>";
        $seconds = 0;
        $temp_hours = array_filter($row_hours);
        if(!empty($temp_hours)){
            foreach($temp_hours as $tot_h){
                $timestr = $tot_h;

                $parts = explode(':', $timestr);

                $seconds += ($parts[0] * 60 * 60) + ($parts[1] * 60) + $parts[2];
            }
        }
        $t = round($seconds);
        echo "<button class='btn btn-sq-sm btn-primary' style='float:right;'>".sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60)."</button>";
    ?>
    <div class="page-section" style="padding-bottom: 0px;">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="./user_list.php" style="text-decoration: none;">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/User-96.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Users</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="./profile.php" style="text-decoration: none;">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/Organization-96.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Organisation Profile</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="./billing.php" style="text-decoration: none;">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/billing.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Billing</h3>
                   </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="./reports.php" style="text-decoration: none;">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/bar_chart.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Reports</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#under_construction">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/online-course.png" /></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Enforce Course</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#under_construction">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/user_group.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">User groups</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#under_construction">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/device_mgt.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Device Management</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="panel material-panel" style="background-color: #f5f5f5; text-align: center; color:#000000;">
                    <a href="./support.php" style="text-decoration: none;">
                        <div class="panel-heading">
                            <div class="row" style="text-align: center;">
                                <i><img src="./css/vendor/support.png" width="64"/></i>
                            </div>
                        </div>
                        <h3 class="panel-title">Support</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-section">
        <div class="row">
            <!-- category vs total duration & category vs complete percentage -->
            <?php 
                $category_list = "SELECT vv.*,vid.cat_id,SUM( TIME_TO_SEC( `vid`.`v_duration` ) ) AS v_duration_temp,cor.p_id,cor1.c_name_lan1 FROM video_view AS vv 
                                LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
                                LEFT JOIN courses AS cor ON vid.cat_id = cor.c_id
                                LEFT JOIN user as u ON u.u_id = vv.u_id
                                LEFT JOIN courses AS cor1 ON cor.p_id = cor1.c_id WHERE u.add_by = '$uid' GROUP BY cor1.c_name_lan1 ORDER BY v_duration_temp DESC";
                $result_cat = mysqli_query($conn, $category_list);
                $sum_total = 0;
                if($result_cat){
                    while($row_cat = mysqli_fetch_object($result_cat)){
                        $tempArr[] = array($row_cat->c_name_lan1=>(int)$row_cat->v_duration_temp);
                    }
                }
                $sumArray = array();

                foreach ($tempArr as $k=>$subArray) {
                  foreach ($subArray as $id=>$value) {
                    $sumArray[$id]+=$value;
                  }
                }


                if (end($sumArray) == "") { 
                    array_pop($sumArray); 
                }

                if(!empty($subArray)){
                    foreach($sumArray as $k=>$v){
                        $f = floatval(round($v/3600, 2));
                        $total[] = $f;
                        $tempArr2[] = array("name"=>$k,"y"=> $f);
                    }
                    $sum_total = array_sum($total);
                    foreach($tempArr2 as $row2){
                        $precentage = floatval(round($row2['y']*100/$sum_total,2));
                        $temp_sum_array[] = array("name"=>$row2['name'], "y"=> $precentage);
                    }
                }
            ?>
            <div class="col-lg-8 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Category vs Total Duration</h3>
                    </div>
                    <div class="panel-body">
                        <div id="category_total_duration_container" style="min-width: 310px; height: 400px; margin: 0 auto; display: block;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Category vs Completion Percentage</h3>
                    </div>
                    <div class="panel-body">
                        <div id="category_total_percentage" style="min-width: 310px; height: 400px; margin: 0 auto; display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- organisation vs language preference and category vs no of enroll users -->
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <?php 
                    $total_enroll_sql = "SELECT cat.c_name_lan1 AS category,cat.c_id,COUNT(cor.u_id) AS no_of_enroll_user 
                                        FROM (SELECT uc.u_id,uc.cat_id,c.c_name_lan1,c.p_id FROM user_course AS uc
                                        LEFT JOIN courses AS c ON c.c_id = uc.cat_id) AS cor
                                        LEFT JOIN courses AS cat ON cat.c_id = cor.p_id
                                        LEFT JOIN `user` AS u ON u.u_id = cor.u_id
                                        WHERE u.add_by = $uid
                                        GROUP BY cat.c_id";
                    $result_total_enroll_users = mysqli_query($conn, $total_enroll_sql);
                    if(mysqli_num_rows($result_total_enroll_users) > 0){
                        while($row_total_enroll_users = mysqli_fetch_object($result_total_enroll_users)){
                            $data_total_enroll_users[] = $row_total_enroll_users;
                        }
                        
                        foreach($data_total_enroll_users as $d_total_enroll_users){
                            $final_total_enroll_users[] = array("name"=>$d_total_enroll_users->category,"y"=>(int)$d_total_enroll_users->no_of_enroll_user);
                        }
                        $json_total_enroll_user = json_encode($final_total_enroll_users);
                    }else{
                        $json_total_enroll_user = json_encode(array());
                    }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Category vs Total Enrolled Users</h3>
                    </div>
                    <div class="panel-body">
                        <div id="category_vs_total_enroll_user" style="min-width: 310px; height: 400px; margin: 0 auto; display: block;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <?php 
                    $lan_sql = "SELECT lan.l_name,COUNT(*) AS total FROM `user` AS usr 
                                LEFT JOIN `language` AS lan ON usr.language = lan.l_slug
                                WHERE add_by = $uid GROUP BY lan.l_id";
                    $result_lan = mysqli_query($conn, $lan_sql);
                    $t = 0;
                    if(mysqli_num_rows($result_lan) > 0){
                        while($row_lan = mysqli_fetch_object($result_lan)){
                            $t += $row_lan->total;
                            $data_lan[] = $row_lan;
                        }
        //                print_r($data_lan);
                        foreach($data_lan as $t_row){
                            $per = round((($t_row->total * 100)/$t),2); 
                            $data_prefere_lan[] = array('name'=>$t_row->l_name,"y"=>$per);
                        }
                        $json_lan = json_encode($data_prefere_lan);
                    }else{
                        echo json_encode(array());
                    }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Organisation vs Language Preferences</h3>
                    </div>
                    <div class="panel-body">
                        <div id="org_lan_prefer" style="min-width: 310px; height: 400px; margin: 0 auto; display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Under construction Modal Pop Up -->
<div id="under_construction" class="modal grow modal-backdrop-white fade" role='dialog'>
    <div class="modal-dialog modal-sm">
      <div class="v-cell">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Feature Coming soon</h4>
          </div>
          <div class="modal-body">
                This feature is coming soon.
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include("footer.php"); ?>
<script type="text/javascript">
    function under_construction(){
        $('#under_construction').modal('show');
    }
    $(document).ready(function(){
        //Category vs total duration played 
        $('#category_total_duration_container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Category vs Total Duration'
            },
            subtitle: {
                text: "",
            },
            xAxis: {
                type: 'category',
                title: {
                    text: "Category"
                }
            },
            yAxis: {
                title: {
                    text: 'Total Hours'
                },
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                      dataLabels: {
                        enabled: true,
                        format: '{point.y} hours'
                    }
                }
            },
            scrollbar: {
                enabled: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> hours<br/>'
            },
            series: [{
                name: 'Course',
                colorByPoint: true,
                data: <?php echo json_encode($tempArr2); ?>
            }],
        });
        $("text").last().remove();
        
        //Category vs total duration played 
        $('#category_total_percentage').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Courses vs Completion Percentage'
            },
            subtitle: {
                text: "",
            },
            xAxis: {
                type: 'category',
                title: {
                    text: "Category"
                }
            },
            yAxis: {
                title: {
                    text: 'Total Hours'
                },
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                      dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f}%'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b><br/>'
            },
            series: [{
                name: 'Course',
                colorByPoint: true,
                data: <?php echo json_encode($temp_sum_array); ?>
            }],
        });
        $("text").last().remove();
        //organisation vs language preference
        $('#org_lan_prefer').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Organisation vs Language Preferences'
            },
            subtitle: {
                text: '',
            },
            xAxis: {
                type: 'category',
                title: {
                    text: "Language"
                }
            },
            yAxis: {
                title: {
                    text: 'Language Preferences'
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
                        format: '<b>{point.name}</b>: {point.y:.2f} %'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} %</b><br/>'
            },
            series: [{
                name: 'Language',
                colorByPoint: true,
                data: <?php echo $json_lan; ?>
            }],
        });
        $("#org_lan_prefer svg text").last().remove();
        
        // category vs total enroll users
        $('#category_vs_total_enroll_user').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Category vs Total Enrolled Users'
            },
            subtitle: {
                text: '',
            },
            xAxis: {
                type: 'category',
                title: {
                    text: "Category"
                }
            },
            yAxis: {
                title: {
                    text: 'Total Enrolled Users'
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
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
            },
            series: [{
                name: 'Language',
                colorByPoint: true,
                data: <?php echo $json_total_enroll_user; ?>
            }],
        });
        $("#category_vs_total_enroll_user svg text").last().remove();
    });
</script>

