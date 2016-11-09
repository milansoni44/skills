<?php 
	include("header.php");
	
	//include("checklogin.php");
	session_start();

	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	if(isset($_SESSION['language']) && !isset($_GET['lan'])){
		#$language = "lan1";
		$language = $_SESSION["language"];
		
	}	
	else
	{
		
	
		if(isset($_GET['lan'])){
		$lan = $_GET['lan'];
		$_SESSION['language'] = $lan;

		

		$actual_link = str_replace("&lan=lan1","",$actual_link);
		$actual_link = str_replace("&lan=lan2","",$actual_link);
		$actual_link = str_replace("&lan=lan3","",$actual_link);
		$actual_link = str_replace("&lan=lan4","",$actual_link);
		$actual_link = str_replace("&lan=lan5","",$actual_link);
		$actual_link = str_replace("&lan=lan6","",$actual_link);
		
		header("location:".$actual_link);
		}
		else
		{
			$_SESSION['language'] = "lan2";
			$language = "lan2";
		}
	}
	
	$cat_id = $_GET["c_id"];
	
	$query1 = "SELECT * FROM `courses` where c_id = '$cat_id' ";	
	
	$sql1 = mysqli_query($conn,$query1);
	$result1= mysqli_fetch_array($sql1);
	
		$cat_name_str = "c_name_".$language; 
		$cat_name = $result1[$cat_name_str];
		$cat_icon = $result1['c_icon'];
	
?>

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


  <!-- Fixed navbar -->
 

<!--  <div class="parallax bg-white page-section">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-body">
          <h1 class="text-display-2 margin-none"><?php //echo $cat_name;?></h1>
        </div>
      </div>
    </div>
  </div>-->

  <div class="container">
  <div class="page-section" style="padding:5px 0px;">
      <div class="row">

        <div class="col-md-12">
			<div class="container-fluid">

            <div class="page-section"  style="padding:5px 0px;">
                	<div class="col-md-6">
                    <h1 class="text-display-1 margin-none" style="vertical-align:middle;">My Completed Course</h1>
             		</div>
                    <div class="col-md-6 pull-right" style="padding-right:0px;">
						<form name="frm_searhc" id="frm_search" method="post" action="search.php">
                    <div id="custom-search-input">
                            <div class="input-group col-md-6 pull-right" style="padding-right:0px;">
								
                                <input type="text" name="srch" class="  search-query form-control" placeholder="Search Other Courses" />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
						</form>
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
			$uid = $_SESSION['id'];
            /*$query = "SELECT * FROM user_course AS uc
									LEFT JOIN courses AS cor ON uc.cat_id = cor.c_id									
									WHERE u_id = '$uid' ";	*/
			$query = "SELECT * FROM `course_complete` AS cc 
						LEFT JOIN courses AS cor ON cc.c_id = cor.c_id 
						WHERE  cc.complete = '100' AND u_id = '$uid' ORDER BY cc.cc_id desc";
			$sql = mysqli_query($conn,$query);
			$complete_cor_num = mysqli_num_rows($sql);
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

                  <div class="cover overlay cover-image-full hover">
                    <span class="img icon-block height-10"></span>
                    <a href="category.php?c_id=<?php echo $c_id;?>" class="padding-none overlay overlay-full icon-block ">
                      <span class="v-center">
                            <img src="images/icons/<?php echo $c_icon; ?>"  width="100%" alt="<?php echo $c_name; ?>" title="<?php echo $c_name; ?>" >
                      </span>
                    </a>

                    <a href="syllabus.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                      <span class="v-center">
                <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>
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

                </div>
              </div>
            
            <?php
				}			
            ?>
          </div>
            <?php
				if($complete_cor_num == 0){
			?>
			<div class="panel panel-default" style="clear:both;">
                    <div class="media v-middle">
                      <div class="media-left">
                        <div class="bg-green-400 text-white">
                          <div class="panel-body">
                            <i class="fa fa-credit-card fa-fw fa-2x"></i>
                          </div>
                        </div>
                      </div>
                      <div class="media-body">
                        You Don't Have completed any courses.
                      </div>
                      <div class="media-right media-padding">
                        <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated href="my_courses.php">
                        Go to My Courses
                    </a>
                      </div>
                    </div>
                  </div>
			<?php
				}
			?>
          

            <br/>

          </div>
		  
        </div>
        
		
      </div>
    </div>
    
    </div>

  </div>

 <?php include('footer.php');?>