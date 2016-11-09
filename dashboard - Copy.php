<?php 
	include("config.php");
	include("checklogin.php");
	session_start();
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
	
	
	
?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard | Aur Seekho</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">


</head>

<body>

  <!-- Fixed navbar -->
  <?php include("header.php");?>

  <div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-left text-center">
          <a href="#">
            <img src="images/profile/<?php echo $vendor_pic;?> " alt="people" class="img-circle width-80" />
          </a>
        </div>
        <div class="media-body">
          <h1 class="text-white text-display-1 margin-v-0"><?php echo $vendor_name;?> </h1>
        </div>
        
      </div>
    </div>
  </div>

   <?php 
	$uid = $_SESSION['id'];
	$user_det = "SELECT * FROM user WHERE u_id = '$uid'";
	$query_user_det = mysqli_query($conn,$user_det);
	$user_res = mysqli_fetch_array($query_user_det);
	
	$full_name = $user_res["full_name"];
	$email = $user_res["email"];
	$mobile = $user_res["mobile"];
	$profile_pic = $user_res["profile_pic"];
	$language = $user_res["language"];
	$validity = $user_res["validity"];
	
	$end_date = date("d-M-Y",strtotime($validity));
	?>

  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-9">

          <!--<div class="panel panel-default">
            <div class="media v-middle">
              <div class="media-left">
                <div class="bg-green-400 text-white">
                  <div class="panel-body">
                    <i class="fa fa-credit-card fa-fw fa-2x"></i>
                  </div>
                </div>
              </div>
              <div class="media-body">
                Your subscription ends on <span class="text-body-2"><?php //echo $end_date;?></span>
              </div>
              <div class="media-right media-padding">
                <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated href="#">
                Upgrade
            </a>
              </div>
            </div>
          </div>-->

          <div class="row" data-toggle="isotope">
            <div class="item col-xs-12 col-lg-12">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline margin-none">My Courses</h4>
                </div>
                <div class="row" data-toggle="isotope">
            <?php
			$uid = $_SESSION['id'];
            $query = "SELECT * FROM user_course AS uc
									LEFT JOIN courses AS cor ON uc.cat_id = cor.c_id									
									WHERE u_id = '$uid' ";	
			$sql = mysqli_query($conn,$query);
			while($result= mysqli_fetch_array($sql)){
			
				$c_id = $result["c_id"];
				$c_name_str = "c_name_".$language; 
				$c_name = $result[$c_name_str];
				$c_icon = $result["c_icon"];
			
			
			$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$uid."' and video.cat_id = '$c_id'";	
	
					$sqlVV = mysqli_query($conn,$sqlVideoWatch);
					$rsCount = mysqli_fetch_array($sqlVV); 
					$intCount = $rsCount['count'];
					
					$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
					$sql_vid_num = mysqli_query($conn,$query_vid_num);				
					$vid_num = mysqli_num_rows($sql_vid_num);
			
			
			$uid =$_SESSION['id'];
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $uid";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			
			
			
			
					$cat_id = $c_id;
                    $rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$cat_id' ";
					$sql_rt = mysqli_query($conn, $rt_get);
					$rsrt = mysqli_fetch_array($sql_rt);
					
					$rt = $rsrt['rt'];
					
					$rate_get = "SELECT * FROM rating WHERE cat_id = '$cat_id' ";
					$sql_rate = mysqli_query($conn, $rate_get);
					$rate_num = mysqli_num_rows($sql_rate);
					
			
					
					$total_rate = round($rt/$rate_num);
			?>
            <div class="item col-xs-12 col-sm-6 col-lg-3 col-md-3">
                <div class="panel panel-default paper-shadow" data-z="0.5">

                  <div class="panel-body">
					  <p class="text-headline margin-v-0-10"><a href="syllabus.php?c_id=<?php echo $c_id;?>" style="font-size:14px;"><?php echo $c_name; ?></a></p>

					<p class="small margin-none">
                      <span class="fa fa-fw fa-star<?php if($total_rate < 1){echo "-o";}?> text-yellow-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 2){echo "-o";}?> text-yellow-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 3){echo "-o";}?> text-yellow-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 4){echo "-o";}?> text-yellow-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 5){echo "-o";}?> text-yellow-800"></span>
                    </p>

                  </div>
                  <div class="panel-heading">
                    <div class="media media-clearfix-xs-min v-middle">
                      <div class="media-body text-caption text-light">
                        <?php echo $intCount."/".$vid_num; ?> Videos
                      </div>
                     <div class="media-right">
                        <div class="progress progress-mini width-100 margin-none">
                          <div class="progress-bar progress-bar-deep-orange-300" role="progressbar" aria-valuenow="<?php echo ($intCount / $vid_num) * 100 ;  ?>" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  
                  <hr class="margin-none" />
                  <div class="panel-body" align="center">

                    <a class="btn btn-sm btn-deep-orange-500 btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="syllabus.php?c_id=<?php echo $c_id;?>">
                    <?php 
					if($check_cor ==1 ){					                    
					?>
                    Continue
                    <?php
					}
					else{
					?>
                    Enroll
                    <?php
					}
					?>
                    
                    </a>

                  </div>

                </div>
              </div>
 
            <?php
				}
            ?>
          </div>
                  
                  
                <div class="panel-footer text-right">
                  <a  class="btn btn-white paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="my_courses.php"> View all</a>
                </div>
              </div>
            </div>
            
            <div class="item col-xs-12 col-lg-6">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline margin-none">Courses</h4>
                  <p class="text-subhead text-light">Your recent courses</p>
                </div>
                <ul class="list-group">
                  <?php
                    $user_det = "SELECT * FROM user_course AS uc
									LEFT JOIN courses AS cor ON uc.cat_id = cor.c_id									
									WHERE u_id = '$uid'";
					$query_user_det = mysqli_query($conn,$user_det);
					while($user_res = mysqli_fetch_array($query_user_det)){
					
					$c_id = $user_res["c_id"];
					$c_name_str = "c_name_".$_SESSION['language']; 
					$c_name = $user_res[$c_name_str];
					
					$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$uid."' and video.cat_id = '$c_id'";	
	
					$sqlVV = mysqli_query($conn,$sqlVideoWatch);
					$rsCount = mysqli_fetch_array($sqlVV); 
					$intCount = $rsCount['count'];
					
					$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
					$sql_vid_num = mysqli_query($conn,$query_vid_num);				
					$vid_num = mysqli_num_rows($sql_vid_num);
				  ?>
                  <li class="list-group-item media v-middle">
                    <div class="media-body">
                      <a href="syllabus.php?c_id=<?php echo $c_id;?>" style="font-size:14px;"><?php echo $c_name." (".$intCount."/".$vid_num." )" ; ?></a>
                    </div>
                    <div class="media-right">
                      <div class="progress progress-mini width-100 margin-none">
                        <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="<?php echo ($intCount / $vid_num) * 100 ;  ?>" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                        </div>
                      </div> 
                    </div>
                  </li>
                  <?php
					}
				  ?>
                  
                </ul>
                <div class="panel-footer text-right">
                  <a  class="btn btn-white paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="#"> View all</a>
                </div>
              </div>
            </div>
            
            <div class="item col-xs-12 col-lg-6">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline margin-none">Your Comments</h4>
                  <p class="text-subhead text-light">Your recent comments</p>
                </div>
                <ul class="list-group">
                  <?php
                    $user_det = "SELECT * FROM comment AS co
									LEFT JOIN video  AS vid ON vid.v_id = co.v_id
									LEFT JOIN courses AS cor ON cor.c_id = vid.cat_id									
									WHERE co.u_id = '$uid' AND co.pco_id = '1' LIMIT 6";
					$query_user_det = mysqli_query($conn,$user_det);
					while($user_res = mysqli_fetch_array($query_user_det)){
					
					$co_id = $user_res["co_id"];
					$v_id = $user_res["v_id"];
					$comment = $user_res["comment"];
					$c_id = $user_res["c_id"];
					$c_name_str = "c_name_".$_SESSION['language']; 
					$c_name = $user_res[$c_name_str];
					
					
				  ?>
                  <li class="list-group-item media v-middle">
                    <div class="media-body">
                      <h4 class="text-subhead margin-none">
                      <span class="text-light">Comment:</span>
                        <a href="syllabus.php?c_id=<?php echo $c_id;?>?v_id=<?php echo $v_id;?>" class="list-group-link"><?php echo $comment;?></a>
                      </h4>
                      <div class="caption">
                        <span class="text-light">Course:</span>
                        <a href="syllabus.php?c_id=<?php echo $c_id;?>?v_id=<?php echo $v_id;?>"><?php echo $c_name;?></a>
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

          <br/>
          <br/>

        </div>
        <div class="col-md-3">

          <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
              <h4 class="panel-title">My Account</h4>
            </div>
            <div class="panel-body list-group">
              <ul class="list-group list-group-menu">
                <li class="list-group-item"><a class="link-text-color" href="dashboard.php">Dashboard</a></li>
                <li class="list-group-item active"><a class="link-text-color" href="profile.php">Profile</a></li>
                <li class="list-group-item"><a class="link-text-color" href="logout.php"><span>Logout</span></a></li>
              </ul>
            </div>
          </div>


        </div>

      </div>
    </div>

  </div>

<?php include("footer.php");?>