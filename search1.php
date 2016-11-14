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
	$_COOKIE['language'] = $lan;
	$language = $_COOKIE["language"];
	$actual_link = str_replace("?lan=lan1","",$actual_link);
	$actual_link = str_replace("?lan=lan2","",$actual_link);
	$actual_link = str_replace("?lan=lan3","",$actual_link);
	$actual_link = str_replace("?lan=lan4","",$actual_link);
	$actual_link = str_replace("?lan=lan5","",$actual_link);
	$actual_link = str_replace("?lan=lan6","",$actual_link);
	
	header("location:".$actual_link);
	}
	
	if($language == ""){
	
	$language ="lan1";
	
	}
	
?>

<?php
	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	if(isset($_GET['lan'])){
	$lan = $_GET['lan'];
	$_COOKIE['language'] = $lan;
	$language = $_COOKIE["language"];
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
<style>
    #custom-search-form {
        margin:0;
        margin-top: 5px;
        padding: 0;
    }
 
    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }

</style>
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

    <div class="page-section" style="padding:5px 0px;">
      <div class="row">

        <div class="col-md-12">
			<div class="container-fluid">

            <div class="page-section"  style="padding:5px 0px;">
                	<div class="col-md-6">
                    <h1 class="text-display-1 margin-none" style="vertical-align:middle;"><img src="images/icons/business.jpg" height="50" />Business</h1>
             		</div>
                    <div class="col-md-6 pull-right">
                    <div id="custom-search-input">
                            <div class="input-group col-md-6 pull-right">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
            </div>
			<!--<div class="page-section">

                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group form-control-material">
                        <input id="forumSearch" type="text" class="form-control used" placeholder="Type to search" />
                        <label for="forumSearch">Search ...</label>
                      </div>
                      <a href="#" class="btn btn-inverse paper-shadow relative" data-z="0.5" data-hover-z="1">Search</a>
                    </div>
                  </div>
                  

                </div>-->
                <div class="clearfix margin-v-0-15"></div>
            <div class="row" data-toggle="isotope">
            <?php
            $query = "SELECT * FROM `courses` where p_id = '1' ";	
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
            <div class="item col-xs-12 col-sm-6 col-lg-3 col-md-3">
                <div class="panel panel-default paper-shadow" data-z="0.5">

                  <div class="panel-heading">
                    <div class="media media-clearfix-xs-min v-middle">
                      <div class="media-body text-caption text-light">
                        <?php echo $vid_num; ?> Videos
                      </div>
                     <!-- <div class="media-right">
                        <div class="progress progress-mini width-100 margin-none">
                          <div class="progress-bar progress-bar-deep-orange-300" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%;">
                          </div>
                        </div>
                      </div>-->
                    </div>
                  </div>

                  <div class="cover overlay cover-image-full hover">
                    <span class="img icon-block height-10"></span>
                    <a href="category.php?c_id=<?php echo $c_id;?>" class="padding-none overlay overlay-full icon-block ">
                      <span class="v-center">
                            <img src="images/icons/<?php echo $c_icon; ?>"  width="100%" alt="<?php echo $c_name; ?>" title="<?php echo $c_name; ?>" >
                      </span>
                    </a>

                    <a href="category.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                      <span class="v-center">
                <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>

                  <div class="panel-body">
                    <p class="text-headline margin-v-0-10"><a href="category.php?c_id=<?php echo $c_id;?>" style="font-size:20px;"><?php echo $c_name; ?></a></p>

					<p class="small margin-none">
                      <span class="fa fa-fw fa-star text-yellow-800"></span>
                      <span class="fa fa-fw fa-star text-yellow-800"></span>
                      <span class="fa fa-fw fa-star text-yellow-800"></span>
                      <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                    </p>

                  </div>
                  <hr class="margin-none" />
                  <div class="panel-body" align="center">

                    <a class="btn btn-deep-orange-500 btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="category.php?c_id=<?php echo $c_id;?>">Take Course</a>

                  </div>

                </div>
              </div>
             
            <?php /*?><div class="item col-xs-12 col-sm-6 col-lg-3 col-md-3">
              <div class="panel panel-default paper-shadow" data-z="0.5">

                <div class="cover overlay cover-image-full hover">
                  <span class="img icon-block height-150 bg-default"></span>
                  <a href="category.php?c_id=<?php echo $c_id;?>" class="padding-none overlay overlay-full icon-block bg-default">
                    <span class="v-center">
                        <img src="images/icons/<?php echo $c_icon; ?>" height="100" width="100" alt="<?php echo $c_name; ?>" title="<?php echo $c_name; ?>" >
                    </span>
                  </a>

                  <a href="category.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                    <span class="v-center">
                <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-play"></i></span>
                    </span>
                  </a>
                </div>

                <div class="panel-body">
                  <h4 class="text-headline margin-v-0-10"><a href="category.php?c_id=<?php echo $c_id;?>"><?php echo $c_name; ?></a></h4>
                </div>
                <hr class="margin-none" />
              </div>
            </div><?php */?>
            <?php
				}
            ?>
          </div>

            <br/>

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