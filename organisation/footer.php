  <section class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <h4 class="text-headline text-light">Corporate</h4>
          <ul class="list-unstyled">
            <li><a href="#">About the company</a></li>
            <li><a href="#">Company offices</a></li>
            <li><a href="#">Partners</a></li>
            <li><a href="#">Terms of use</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-3">
          <h4 class="text-headline text-light">Explore</h4>
          <ul class="list-unstyled">
            <li><a href="">Courses</a></li>
            <li><a href="">Tutors</a></li>
            <li><a href="">Pricing</a></li>
            <li><a href="">Become Tutor</a></li>
            <li><a href="">Sign Up</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-6">
          <h4 class="text-headline text-light">Social</h4>

          
          <br/>
          <p>
            <a href="#" class="btn btn-indigo-500 btn-circle"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-pink-500 btn-circle"><i class="fa fa-dribbble"></i></a>
            <a href="#" class="btn btn-blue-500 btn-circle"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-danger btn-circle"><i class="fa fa-google-plus"></i></a>
          </p>

          

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
<!--  <footer class="footer">
    <strong>Aur Seekho (Beta)</strong> &copy; Copyright 2016
  </footer>-->
  <!-- // Footer -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>
<!--    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<!--    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff(arr) {

            var data = new google.visualization.arrayToDataTable(arr);

            var options = {
                //          title: 'Chess opening moves',
                width: 1024,
                legend: {position: 'none'},
                chart: {title: 'Person Course',
                    subtitle: 'popularity by percentage'},
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    y: {
                        0: {side: 'top', label: 'Complete Percentage'} // Top x-axis.
                    }
                },
                bar: {groupWidth: "90%"}
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>-->

    <script src="js/vendor/all.js"></script>
    <script src="js/app/app.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="http://code.highcharts.com/modules/no-data-to-display.js">
    <script>
        $(document).ready(function(){
            $("#user_list").on("change",function(){
                var u_id = $(this).val();
                if(u_id == "0"){
                    alert("Please select user.");
                    $("#container").css("display","none");
                    return false;
                }
                $.ajax({
                    url:"chartAjax.php",
                    type:"POST",
                    dataType:"json",
                    cache:false,
                    data:{ id: u_id, act: "courses_vs_complete_percentage"},
                    success:function(data){
                        if(data.error === "no data found"){
                            alert("This user didn't enroll any course.");
                            $("#user_list").val(0);
                            $("#container").css("display","none");
                            return false;
                            
                        }else{
                            $("#container").css("display","block");
//                            google.charts.load('current', {'packages': ['bar']});
//                            google.charts.setOnLoadCallback(drawStuff(data));
                            $('#container').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Courses vs Completion Percentage'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    type: 'category'
                                },
                                yAxis: {
                                    title: {
                                        text: 'Completion Percentage'
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
                                    name: 'Course',
                                    colorByPoint: true,
                                    data: data
                                }],
                            });
                            $("#container svg text").last().remove();
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>