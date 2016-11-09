<?php 

	include("config.php");
	session_start();
	
	$vid_id = "1";
	$query1 = "SELECT * FROM `video` where v_id = '$vid_id' ";	
	
	$sql1 = mysqli_query($conn,$query1);
	$result1= mysqli_fetch_array($sql1);
	
		$v_name_str = "v_name_".$language; 
		$v_name_str = trim($v_name_str);
		$v_name = $result1[$v_name_str];
		$v_url_str = "v_url_".$language; 
		$v_url_str = trim($v_url_str);
		$v_url = $result1[$v_url_str];
		$vid_level = $result1["v_level"]; 
		$cat_id = $result1["cat_id"];
	
		 
	
?>

<?php
	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	
	
	if(isset($_GET['lan'])){
	$lan = $_GET['lan'];
	$_SESSION['language'] = $lan;
	$language = $_SESSION["language"];
	$actual_link = str_replace("?lan=lan1","",$actual_link);
	$actual_link = str_replace("?lan=lan2","",$actual_link);
	$actual_link = str_replace("?lan=lan3","",$actual_link);
	$actual_link = str_replace("?lan=lan4","",$actual_link);
	$actual_link = str_replace("?lan=lan5","",$actual_link);
	$actual_link = str_replace("?lan=lan6","",$actual_link);
	
	header("location:".$actual_link);
	}
	
	if($language == ""){
	
	$language ="lan2";
	
	}
	
?>

<?php
	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	if(isset($_GET['lan'])){
	$lan = $_GET['lan'];
	$_SESSION['language'] = $lan;
	$language = $_SESSION["language"];
	$actual_link = str_replace("&lan=lan1","",$actual_link);
	$actual_link = str_replace("&lan=lan2","",$actual_link);
	$actual_link = str_replace("&lan=lan3","",$actual_link);
	$actual_link = str_replace("&lan=lan4","",$actual_link);
	$actual_link = str_replace("&lan=lan5","",$actual_link);
	$actual_link = str_replace("&lan=lan6","",$actual_link);
	
	header("location:".$actual_link);
	}
	
	
	
?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Learning</title>

  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">


</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand navbar-brand-logo">
          <a href="dashboard.php">
            <img src="images/logo.png"  height="70" />
          </a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forum <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="app-forum.html">Forum Home</a></li>
                <li><a href="app-forum-category.html">Forum Category</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="app-directory-grid.html">Courses Grid</a></li>
                <li><a href="app-directory-list.html">Courses List</a></li>
                <li><a href="app-student-course.html">Course Details</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="app-student-dashboard.html">Dashboard</a></li>
                <li><a href="app-student-courses.html">My Courses</a></li>
                <li><a href="app-take-course.html">Enroll Course</a></li>
                <li><a href="app-course-forums.html">Course Forums</a></li>
                <li><a href="app-take-quiz.html">Take Quiz</a></li>
                <li><a href="app-student-profile.html">Edit Profile</a></li>
                <li><a href="app-student-billing.html">Edit Billing</a></li>
                <li><a href="app-student-messages.html">Messages</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Instructor <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="app-instructor-dashboard.html">Dashboard</a></li>
                <li><a href="app-instructor-courses.html">My Courses</a></li>
                <li><a href="app-instructor-course-edit-course.html">Edit Course</a></li>
                <li><a href="app-instructor-earnings.html">Earnings</a></li>
                <li><a href="app-instructor-statement.html">Statement</a></li>
                <li><a href="app-instructor-profile.html">Edit Profile</a></li>
                <li><a href="app-instructor-billing.html">Edit Billing</a></li>
                <li><a href="app-instructor-messages.html">Messages</a></li>
              </ul>
            </li>
          </ul>
        <div class="navbar-right">
          <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
            <!-- user -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Select Language<span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
                <?php
					if($pagename == "all_courses.php" || $pagename == "dashboard.php"){
				?>		
						<?php
							$i = "1";
							$query = "SELECT * FROM `language` WHERE status='active' ";
							
							$sql = mysqli_query($conn,$query);
							while($result= mysqli_fetch_array($sql)){
							
								$l_id = $result["l_id"]; 
								$l_name = $result["l_name"];
								$l_slug = $result["l_slug"]; 
								$l_code = $result["l_code"];
								$status = $result["status"];   
						?>
                        <li><a href="<?php echo $actual_link?>?lan=<?php echo $l_slug?>"><?php echo $l_name?></a></li>
                        <?php
						}?>
				<?php
                	}
					else{
				?>
						<?php
							$i = "1";
							$query = "SELECT * FROM `language` WHERE status='active' ";
							
							$sql = mysqli_query($conn,$query);
							while($result= mysqli_fetch_array($sql)){
							
								$l_id = $result["l_id"]; 
								$l_name = $result["l_name"];
								$l_slug = $result["l_slug"]; 
								$l_code = $result["l_code"];
								$status = $result["status"];   
						?>
                        <li><a href="<?php echo $actual_link?>&lan=<?php echo $l_slug?>"><?php echo $l_name?></a></li>
                        <?php
						}?>					
				<?php
                	}
				?>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle ripple" data-toggle="dropdown">Courses <span class="caret"></span></a>
              <ul class="dropdown-menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
                 <li><a href="all_courses.php">All Courses</a></li>
				 <?php
						$i = "1";
						$query = "SELECT * FROM `courses` where p_id = '0' ";	
						$sql = mysqli_query($conn,$query);
						while($result= mysqli_fetch_array($sql)){
						
							$c_id = $result["c_id"];
							$c_name_str = "c_name_".$language; 
							$c_name = $result[$c_name_str];
							$c_icon = $result["c_icon"];         
				  ?>
                <li><a href="category.php?c_id=<?php echo $c_id;?>"><?php echo $c_name;?></a></li>
                <?php
                		}
				?>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                <img src="images/people/110/guy-3.jpg" alt="<?php echo $full_name;?> " class="img-circle" width="40"/> <?php echo $u_name;?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
                <li class="active"><a href="dashboard.php"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-mortar-board"></i> My Courses</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
             </ul>
            </li>
            <!-- // END user -->
          </ul>
        </div>
      </div>
      <!-- /.navbar-collapse -->

    </div>
  </div>

  

  <div class="container">

    <div class="page-section">
    	<div class="row">
        	<h1>Microsoft Excel Part 1</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
          
        </div>
    </div>
    <div class="page-section">
      <div class="row">

        <div class="col-md-8">
			<!-- video div-->
          <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
          <iframe id="player1" src="https://player.vimeo.com/video/<?php echo $v_url;?>?api=1&player_id=player1"
                    width="100%" height="400" data-seek="false" frameborder="0" webkitallowfullscreen mozallowfullscreen
                    allowfullscreen></iframe>
          <?php /*?><iframe src="https://player.vimeo.com/video/<?php echo $v_url;?>?byline=0&portrait=0&badge=0" width="100%" height="400"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php */?>
          <!-- // END video div-->

		  
        </div>
        <div class="col-md-4">
          <div class="panel panel-default paper-shadow"  data-animated>
            <div class="panel-heading">
              <h4 class="text-headline">Course</h4>
            </div>
            <div class="panel-body">
              <p class="text-caption" style="font-size:16px;">
                <i class="fa fa-clock-o fa-fw" style="margin:10px 0px;"></i>Total Duration:&nbsp;&nbsp;&nbsp;&nbsp;<b>4 hrs</b>
              
                <br/>
                <i class="fa fa-play fa-fw" style="margin:10px 0px;"></i> Total Videos:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>35</b>
                <br/>
                <i class="fa fa-mortar-board fa-fw" style="margin:10px 0px;"></i> Current Level:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Beginner</b>
				 <br/>
                <i class="fa fa-users fa-fw" style="margin:10px 0px;"></i> Course Opted:&nbsp;&nbsp;&nbsp;&nbsp;<b>30 Students</b>
                <br/>
				<i class="fa fa-area-chart  fa-fw" style="margin:10px 0px;"></i> Progress:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12/35 Videos</b>
					<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
						  <span class="sr-only">40% Complete (success)</span>
						</div>
					  </div>
               
              </p>
            </div>
           <!--
			<hr class="margin-none" />
            <div class="panel-body text-center">
              <p><a class="btn btn-success btn-lg paper-shadow relative" data-z="1" data-hover-z="2" data-animated href="website-take-course.html">Enroll Course</a></p>
              <p class="text-body-2">or <a href="#">buy course for $1</a></p>
            </div>
		  -->
            <ul class="list-group">
              <li class="list-group-item">
                <a href="#" class="text-light"><i class="fa fa-facebook fa-fw"></i> Share on facebook</a>
              </li>
              <li class="list-group-item">
                <a href="#" class="text-light"><i class="fa fa-twitter fa-fw"></i> Tweet this course</a>
              </li>
            </ul>
          </div>
        </div>
		
      </div>
    </div>
	<div class="page-section">
      <div class="row">
        <div class="col-md-8 col-lg-8">
   

          <!-- Tabbable Widget -->
          <div class="tabbable tabs-blocks tabs-center-h tabs-primary" style="background-color:#FFFFFF;">

            <!-- Tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#blocks-home-2" data-toggle="tab"><i class="fa fa-comment"></i> Comments</a></li>
              <li><a href="#blocks-profile-2" data-toggle="tab"><i class="fa fa-list"></i>  Curriculum </a></li>
              
            </ul>
            <!-- // END Tabs -->

            <!-- Panes -->
            <div class="tab-content">
              <div id="blocks-home-2" class="tab-pane active">
              
                    <div class="page-section padding-top-none">
                <div class="panel panel-default paper-shadow" data-z="0.5">
                  <div class="panel-heading">
                    <h4 class="text-headline">Post a comment</h4>
                  </div>
                  <div class="panel-body">
                    <form>
                      <div class="form-group form-control-material">
                        <input type="hidden" name="video_id" id="video_id" value="<?php echo $vid_id;?>" >
                        <textarea id="comment" class="form-control used" placeholder="Your comment .."></textarea>
                        <label for="reply">Your comment</label>
                      </div>
                      <div class="text-right">
                        <button class="btn btn-primary submit" type="button">Post comment <i class="fa fa-plus"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>		 
         
                  <div class="panel panel-default paper-shadow" data-z="0.5">
                    <ol class="list-group timeline" id="update">
                    </ol>
                    <ul class="list-group">
        
                      
                      <?php
                        $query2 = "SELECT * FROM `comment` AS cmt  
                                    LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
                                    where cmt.v_id = '$vid_id' 
                                    ORDER BY cmt.co_id desc";	
            
                        $sql2 = mysqli_query($conn,$query2);
                        while($result2= mysqli_fetch_array($sql2)){
                            
                            $full_name = $result2['full_name'];
                            $comment = $result2['comment'];
                            $profile_pic = $result2['profile_pic'];
                            $date = $result2['date'];
                      ?>
                      <li class="list-group-item media v-middle">
                        <div class="media-left">
                          <div class="icon-block half img-circle bg-grey-300">
                            <?php
                            if($profile_pic != ""){
                            ?>
                            <img src="images/profile/<?php echo $profile_pic;?>" alt="person" class="img-circle width-50" />
                            <?php					
                            }
                            ?>
                            
                          </div>
                        </div>
                        <div class="media-body">
                          <h4 class="text-subhead margin-none">
                            <a href="#" class="link-text-color"><?php echo $comment;?></a>
                          </h4>
                          <div class="text-light text-caption">
                            posted by
                            <a href="#">
                              <?php echo $full_name;?></a> &nbsp; | <i class="fa fa-clock-o fa-fw"></i> <?php echo $date;?>
                          </div>
                        </div>
                      </li>
                      <?php
                        }
                      ?>
                      
                      
                      
                                   
                    </ul>
                  </div>
                
              </div>
              <div id="blocks-profile-2" class="tab-pane">
          		<?php
					$i = "1";
					$query = "SELECT * FROM `video` where cat_id = '$cat_id' ORDER BY v_order";	
					$sql = mysqli_query($conn,$query);
					while($result= mysqli_fetch_array($sql)){
					
						
						$v_id = $result["v_id"];
						$v_name_str = "v_name_".$language; 
						$v_name = $result[$v_name_str];
						$v_url_str = "v_url_".$language; 
						$v_url = $result[$v_url_str];
						$v_order = $result["v_order"];
						        
				?>
				<div class="list-group-item media" data-target="video.php?v_id=<?php echo $v_id;?>">
					<div class="media-left">
					  <div class="text-crt"><?php echo $i ++;?></div>
					</div>
					<div class="media-body">
						<?php echo $v_name;?>
					</div>
					
					<?php
					$query_vv_check = "SELECT * FROM `video_view` WHERE v_id = '$v_id' AND u_id = '$uid'";		
					$sql_vv_check = mysqli_query($conn,$query_vv_check);
					
					$sql_vv_check_num = mysqli_num_rows($sql_vv_check);
					
					?>
					<div class="media-right">
					  <i class="fa fa-clock-o">3:55</i>
					</div>
		
				</div>
				<?php
						}
				?>  
               
              </div>
              
              
            </div>
            <!-- // END Panes -->

          </div>

       


        </div>
        <div class="col-md-4 col-lg-4">
			<div class="panel panel-default paper-shadow" data-z="0.5">
                <ul class="list-group">
                  <li class="list-group-item">
                    <div class="media v-middle">
                      <div class="media-body">
                        <h4 class="text-headline margin-none">Recommended for you</h4>
<!--                        <p class="text-subhead text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, illo.</p>
-->                      </div>                     
                    </div>
                  </li>
    		<?php
				$query = "SELECT * FROM `courses` where p_id = '1' LIMIT 6";	
				$sql = mysqli_query($conn,$query);
				while($result= mysqli_fetch_array($sql)){
				
					$c_id = $result["c_id"];
					$c_name_str = "c_name_".$language; 
					$c_name = $result[$c_name_str];
					$c_icon = $result["c_icon"];
				
				
				$query_num = "SELECT * FROM `video` where cat_id = '$c_id' ";	
				$sql_num = mysqli_query($conn,$query_num);
				
				$vid_num = mysqli_num_rows($sql_num);
			
			?>
                  <li class="list-group-item media v-middle">
                    <div class="media-left">
                      <div class="icon-block img-responsive">
                        <img src="images/icons/<?php echo $c_icon; ?>"  width="100">
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="text-subhead margin-none">
                        <a href="" class="link-text-color"><?php echo $c_name; ?></a>
                      </h4>
                      <p class="small margin-none">
                      <span class="fa fa-fw fa-star text-yellow-800"></span>
                      <span class="fa fa-fw fa-star text-yellow-800"></span>
                      <span class="fa fa-fw fa-star text-yellow-800"></span>
                      <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                    </p>
                      <div class="text-light text-caption">
                        
                         <i class="fa"></i> <?php echo $vid_num; ?> videos
                      </div>
                    </div>
                   
                  </li>
    		<?php
				}
            ?>
    
                </ul>
        	</div>
        </div>
      </div>
    </div>
  </div>
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
          <h4 class="text-headline text-light">Newsletter</h4>

          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Enter email here...">
              <span class="input-group-btn">
								<button class="btn btn-grey-800" type="button">Subscribe</button>
							  </span>
            </div>
          </div>
          <br/>
          <p>
            <a href="#" class="btn btn-indigo-500 btn-circle"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-pink-500 btn-circle"><i class="fa fa-dribbble"></i></a>
            <a href="#" class="btn btn-blue-500 btn-circle"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-danger btn-circle"><i class="fa fa-google-plus"></i></a>
          </p>

          <p class="text-subhead">
            Aur Seekho (Beta) © Copyright 2016 
          </p>

        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Footer -->
  <footer class="footer">
    <strong>Aur Seekho </strong>(Beta) © Copyright 2016 
  </footer>
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


  <script src="js/vendor/all.js"></script>
  <script src="js/app/app.js"></script>


<script>
            $(function () {
                var iframe = $('#player1')[0];
                var player = $f(iframe);
                var status = $('.status');

                // When the player is ready, add listeners for pause, finish, and playProgress
                player.addEvent('ready', function () {
                    status.text('ready');

                    player.addEvent('playProgress', onPlayProgress);
					
					
                });

				
                var done = false;
                var myTimer;
                var lasttime = 0;
                var count = 0;
                var setDatabase = 0;
                function onPlayProgress(data, id) {



                    myTimer = setInterval(function () {
                        var time;
                        var durTime;
                        time = data.seconds;
                        durTime = data.duration;
                        if (lasttime <= time) {
                            var dif;
                            dif = time - lasttime;
                            if (dif > 1) {
                                count += dif - 1;
                            }
                            lasttime = time;

                            var viewP;
                            viewP = (time - count) * 100 / durTime;
                            if (viewP >= 90 && setDatabase == 0) {
                                var v_id = <?php echo $_GET['v_id'];?>;
								var dataString = 'v_id=' + v_id;
						
								$.ajax({
                                    type: 'POST',
                                    url: 'video_view.php',
                                    data: dataString,
                                    async: false,
                                    error: function ()
                                    { console.log('there is some error'); }
                                });
                                setDatabase = 1;
                            }
                        }
                    }, 1000);
                    status.text(data.seconds + '/' + data.duration + 's played' + ' - ' + count);
                }
            });
</script>


<script type="text/javascript">
$(function() {

$(".submit").click(function() {

	var comment = $("#comment").val();
	var video_id = $("#video_id").val();
	var comment = $("#comment").val();
	var post_id = $("#post_id").val();
    var dataString = 'comment='+ comment + '&video_id=' + video_id;
	
	if(comment=='' )
     {
    alert('Please Enter Comment...');
     }
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "commentajax.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("ol#update").append(html);
  $("ol#update li:first").fadeIn("slow");
   document.getElementById('comment').value='';
	$("#name").focus();
 
  $("#flash").hide();
	
  }
 });
}
return false;
	});



});


</script>

</body>

</html>