<?php include("header.php"); ?>
<br/>
<div class="page-wrapper">
    <div class="container">
        <div class="row">
            <!-- courses vs completed percentage -->
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Courses vs Completion Percentage</h3>
                        <span class="pull-right" style="margin-top: -26px">
                            <select name="user" id="user_list" class="form-control" style="width: 100%;">
                                <option value="0">--Select User--</option>
                                <?php
                                $user_query = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
                                $result_user = mysqli_query($conn, $user_query);
                                if (mysqli_num_rows($result_user) > 0) {
                                    while ($row_user = mysqli_fetch_object($result_user)) {
                                        ?>
                                        <option value="<?php echo $row_user->u_id; ?>"><?php echo ucfirst($row_user->full_name); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Person vs completed course -->
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Person vs Completion Course</h3>
                        <span class="pull-right" style="margin-top: -26px">
                            <select name="course" id="course_list" class="form-control" style="width: 100%;">
                                <option value="0">--Select Course--</option>
                                <?php
                                $courses = "SELECT * FROM `courses` WHERE p_id != 0";
                                $result_course = mysqli_query($conn, $courses);
                                if (mysqli_num_rows($result_course) > 0) {
                                    while ($row_course = mysqli_fetch_object($result_course)) {
                                        ?>
                                        <option value="<?php echo $row_course->c_id; ?>"><?php echo ucfirst($row_course->c_name_lan1); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="person_vs_course_completed_container" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- day vs person video duration played -->
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Day vs Person Video duration played</h3>
                        <div class="panel-body" style="background-color: #fff;">
                            <form action="#" method="post" id="days_vs_person_video_duration">
                            <table border="0" width="50%" cellpadding="4px" cellspacing="2px">
                                <tr><span id="error" style="color:red;"></span></tr>
                                <tr>
                                    <td>User</td>
                                    <td>
                                        <select name="user" id="user_list_video_duration" class="form-control" style="width: 50%;" id="user_select">
                                            <option value="">--Select User--</option>
                                            <?php
                                            $user_query = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
                                            $result_user = mysqli_query($conn, $user_query);
                                            if (mysqli_num_rows($result_user) > 0) {
                                                while ($row_user = mysqli_fetch_object($result_user)) {
                                                    ?>
                                                    <option value="<?php echo $row_user->u_id; ?>"><?php echo ucfirst($row_user->full_name); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td><br/></td></tr>
                                <tr>
                                    <td>Month Year</td>
                                    <td>
                                        <input type="text" name="month_year" id="month_year" class="form-control" style="width: 50%;"/>
                                <tr><td><br/></td></tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-primary paper-shadow relative" name="submit" id="submit_days_vs_person_video" value="Submit"/></td>
                                </tr>
                            </table>
                            </form>
                            <div id="days_vs_person_video_duration_container" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Category Courses vs Video Duration</h3>
                        <span class="pull-right" style="margin-top: -26px">
                            <select name="category" id="category_list" class="form-control" style="width: 100%;">
                                <option value="0">--Select Category--</option>
                                <?php
                                    $sql_cat_list = "SELECT c_id,c_name_lan1 FROM courses WHERE p_id = 0";
                                    $result_cat_list = mysqli_query($conn, $sql_cat_list);
                                    if($result_cat_list){
                                        while($row_cat_list = mysqli_fetch_object($result_cat_list)){
                                ?>
                                <option value="<?php echo $row_cat_list->c_id; ?>"><?php echo $row_cat_list->c_name_lan1; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="cat_courses_video_duration" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #EEEEEE;">
                        <h3 class="panel-title">Category Courses vs Video Percentage</h3>
                        <span class="pull-right" style="margin-top: -26px;">
                            <select name="category" id="category_list_video_percentage" class="form-control" style="width: 100%;">
                                <option value="0">--Select Category--</option>
                                <?php
                                    $sql_cat_list = "SELECT c_id,c_name_lan1 FROM courses WHERE p_id = 0";
                                    $result_cat_list = mysqli_query($conn, $sql_cat_list);
                                    if($result_cat_list){
                                        while($row_cat_list = mysqli_fetch_object($result_cat_list)){
                                ?>
                                <option value="<?php echo $row_cat_list->c_id; ?>"><?php echo $row_cat_list->c_name_lan1; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="cat_courses_video_percentage" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function(){
        $("#month_year").datepicker( {
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months"
        }).on('changeDate', function(ev){
            $(this).datepicker('hide');
        });
        // days vs person video
        $("#days_vs_person_video_duration").submit(function(){
            var return_type = true;
            var user = $("#user_list_video_duration").val();
            var month_year = $("#month_year").val();
            var str = month_year.split("-");
            
            if(user == "" && month_year == ""){
                return_type = false;
            }else if(user != "" && month_year == ""){
                return_type = false;
            }else{
                return_type = true;
            }
            
            if(return_type === false){
                $("#error").html("Please fill all the fields.");
                return false;
            }else{
                $("#error").html("");
                month = str[0];
                year = str[1];
                $.ajax({
                    url: "chartAjax.php",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: { month: month, year: year, id: user, act: "days_vs_person_video_duration"},
                    success: function(data){
                        console.log(data);
                        if(data.error === "no data found"){
                            alert("No data found.");
                            $("#user_list_video_duration").val("");
                            $("#month_year").val("");
                            return false;
                        }else{
                            $("#days_vs_person_video_duration_container").css("display","block");
                            
                            $('#days_vs_person_video_duration_container').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Day vs Person Video Duration Played'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    type: 'category',
                                    title: {
                                        text: 'Week'
                                    }
                                },
                                yAxis: {
                                    type: 'time',
                                    title: {
                                        text: 'Duration'
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
                                            format: '{point.y}'
                                        }
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
                                },
                                series: [{
                                    name: 'Duration',
                                    colorByPoint: true,
                                    data: data
                                }],
                            });
//                            $("text").last().remove();
                        }
                    }
                });
                return false;
            }
        });
        
        // person_vs_course_completed_container
        $("#course_list").on("change", function(e){
            e.preventDefault();
            var c = $(this).val();
            if(c == "0"){
                alert("Please select course.");
                $("#person_vs_course_completed_container").css("display","none");
                return false;
            }
            var c_name = $('#course_list option:selected').html();
            $.ajax({
                url: "chartAjax.php",
                type: "POST",
                cache: false,
                dataType: "json",
                data: { c_id: c, add_by:<?php echo $uid; ?>,act: "person_vs_course_completed_container"},
                success: function(data){
                    if(data.error == "no data found"){
                        alert("User didn't enroll this course.");
                        $("#course_list").val(0);
                        $("#person_vs_course_completed_container").css("display","none");
                        return false;
                    }else{
                        $("#person_vs_course_completed_container").css("display","block");
//                            google.charts.load('current', {'packages': ['bar']});
//                            google.charts.setOnLoadCallback(drawStuff(data));
                            $('#person_vs_course_completed_container').highcharts({
                                chart: {
                                    type: 'bar'
                                },
                                title: {
                                    text: 'Courses vs Completion Percentage'
                                },
                                subtitle: {
                                    text: c_name,
                                },
                                xAxis: {
                                    type: 'category',
                                    title: {
                                        text: "Person"
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'Completion Percentage'
                                    }
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
                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> completed<br/>'
                                },
                                series: [{
                                    name: 'Percentage',
                                    colorByPoint: true,
                                    data: data
                                }],
                            });
                            $("#person_vs_course_completed_container svg text").last().remove();
                    }
                }
            });
        });
        
        // category courses vs video duration
        $("#category_list").on("change", function(){
            var cat_id = $(this).val();
            
            $.ajax({
                url: 'chartAjax.php',
                type: 'POST',
                dataType: 'json',
                cache:false,
                data: { c_id: cat_id, act: "category_courses_vs_video_duration", add_by: <?php echo $uid; ?> },
                success: function(data){
                    if(data.error == "no data found"){
                        alert("User didn't enroll this category.");
                        $("#category_list").val(0);
                        $("#cat_courses_video_duration").css("display","none");
                        return false;
                    }else{
                        $("#cat_courses_video_duration").css("display","block");
                        
                        $('#cat_courses_video_duration').highcharts({
                                chart: {
                                    type: 'bar'
                                },
                                title: {
                                    text: 'Courses vs Completion Percentage'
                                },
                                subtitle: {
                                    text: 'Courses vs Completion Percentage',
                                },
                                xAxis: {
                                    type: 'category',
                                    title: {
                                        text: "Category Courses"
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'Total Video Duration'
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
                                            format: '{point.y:.2f} hours'
                                        }
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> hours<br/>'
                                },
                                series: [{
                                    name: 'User',
                                    colorByPoint: true,
                                    data: data
                                }],
                                scrollbar: {
                                    enabled: true
                                },
                                scrollbar: {
                                    enabled:true,
                                    barBackgroundColor: 'gray',
                                    barBorderRadius: 7,
                                    barBorderWidth: 0,
                                    buttonBackgroundColor: 'gray',
                                    buttonBorderWidth: 0,
                                    buttonArrowColor: 'yellow',
                                    buttonBorderRadius: 7,
                                    rifleColor: 'yellow',
                                    trackBackgroundColor: 'white',
                                    trackBorderWidth: 1,
                                    trackBorderColor: 'silver',
                                    trackBorderRadius: 7
                                }
                            });
                            $("#cat_courses_video_duration svg text").last().remove();
                    }
                }
            });
        });
        
        //category_list_video_percentage
        $("#category_list_video_percentage").on("change", function(){
            var cat_id = $(this).val();
            
            $.ajax({
                url: 'chartAjax.php',
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: { c_id: cat_id, act: "category_courses_vs_video_percentage", add_by: <?php echo $uid; ?> },
                success: function(data){
                    if(data.error == "no data found"){
                        alert("User didn't enroll this category.");
                        $("#category_list_video_percentage").val(0);
                        $("#cat_courses_video_percentage").css("display","none");
                        return false;
                    }else{
                        $("#cat_courses_video_percentage").css("display","block");
                        $('#cat_courses_video_percentage').highcharts({
                            chart: {
                                type: 'pie'
                            },
                            title: {
                                text: 'Category Courses vs Total Video Duration Percentage'
                            },
                            subtitle: {
                                text: 'Category Courses vs Total Video Duration Percentage',
                            },
                            xAxis: {
                                type: 'category',
                                title: {
                                    text: "Person"
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Video Duration Percentage'
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
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                    }
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b><br/>'
                            },
                            series: [{
                                name: 'User',
                                colorByPoint: true,
                                data: data
                            }],
                        });
                        $("#cat_courses_video_percentage svg text").last().remove();
                    }
                }
            });
        });
    });
</script>