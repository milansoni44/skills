<?php 
    include("header.php");
	include("checklogin.php");

?>

  <!-- Fixed navbar -->


  <div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-left text-center">
          <a href="#">
          	<?php
				$ven_image = "images/profile/".$_SESSION["vendor_pic"];
				if(!file_exists($ven_image) || !isset($_SESSION['vendor_pic'])){
				$ven_image = "images/user_place.png";
				}
				if($ven_image == "images/profile/" || !isset($_SESSION['vendor_pic'])){
				$ven_image = "images/user_place.png";
				}
			?>
            <img src="<?php echo $ven_image;?>" alt="people" class="img-circle width-80" height="80" width="80" />
          </a>
        </div>
        <div class="media-body">
          <h1 class="text-white text-display-1 margin-v-0"><?php echo $vendor_name;?> </h1>
        </div>
        
      </div>
    </div>
  </div>
  <div class="container">
  <div class="page-section" style="padding:5px 0px;">
      <div class="row">

        <div class="col-md-12">
			<div class="container-fluid">
            <div class="container-fluid">

            <div class="page-section">
              <div class="media v-middle">
                <div class="media-body">
                  <h1 class="text-display-1 margin-none">My Course</h1>
                  <!--<p class="text-subhead">Browse through thousands of lessons.</p>-->
                </div>
                <div class="media-right">
                  <div class="width-100 text-right">
                    <div class="btn-group">
                      <a class="btn btn-grey-800" href="my_courses.php"><i class="">See All</i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" data-toggle="isotope">
              <?php
			$uid = $_SESSION['id'];
            $query = "SELECT * FROM user_course AS uc
									LEFT JOIN courses AS cor ON uc.cat_id = cor.c_id									
									WHERE u_id = '$uid' limit 4";	
			$sql = mysqli_query($conn,$query);
			
			$my_cor_num = mysqli_num_rows($sql);
			while($result= mysqli_fetch_array($sql)){
			
				$c_id = $result["c_id"];
				$c_name_str = "c_name_".$language; 
				$c_name = $result[$c_name_str];
				$c_icon = $result["c_icon"];
			
			
			$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$uid."' and video.cat_id = '$c_id'";	
	
					$sqlVV = mysqli_query($conn,$sqlVideoWatch);
					$rsCount = mysqli_fetch_array($sqlVV); 
					$intCount = $rsCount['count'];
					if($intCount > 0){
					$intCount = $intCount-1;
					}					
					
					$query_vid_num = "SELECT * FROM `video` where cat_id = '$c_id'";	
					$sql_vid_num = mysqli_query($conn,$query_vid_num);				
					$vid_num = mysqli_num_rows($sql_vid_num);
					if($vid_num > 0){
					$vid_num = $vid_num-1;
					}
			
			
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
                <span class="btn btn-circle btn-deep-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>
                  <div class="panel-body">
					  <p class="text-headline margin-v-0-10"><a href="syllabus.php?c_id=<?php echo $c_id;?>" style="font-size:14px;"><?php echo $c_name; ?></a></p>

					<p class="small margin-none">
                      <span class="fa fa-fw fa-star<?php if($total_rate < 1){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 2){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 3){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 4){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 5){echo "-o";}?> text-orange-800"></span>
                    </p>

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
				}if($my_cor_num == 0){
			?>
            <div class="item col-xs-12 col-sm-12 col-lg-12 col-md-12">
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
                        You Don't Have Take any courses.
                      </div>
                      <!--<div class="media-right media-padding">
                        <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated href="my_courses.php">
                        Go to My Courses
                    </a>
                      </div>-->
                    </div>
                  </div>
            </div>
            <?php		
				
				}
            ?>

            </div>
           

          </div>
          
     
            <div class="container-fluid">
        
                    <div class="page-section">
                      <div class="media v-middle">
                        <div class="media-body">
                          <h1 class="text-display-1 margin-none">Recommended</h1>
                          <!--<p class="text-subhead">Browse through thousands of lessons.</p>-->
                        </div>
                        <div class="media-right">
                          <div class="width-100 text-right">
                            <div class="btn-group">
                              <a class="btn btn-grey-800" href="all_courses.php"><i class="">See All</i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        
                    <div class="row" data-toggle="isotope">
                    <?php
                    $query = "SELECT * FROM `courses` AS cor  
                                LEFT JOIN user_course AS uc ON cor.c_id = uc.cat_id 
                                WHERE p_id != '0' 
                                GROUP BY c_id  
                                ORDER BY u_id
                                LIMIT 4";	
                    $sql = mysqli_query($conn,$query);
                    while($result= mysqli_fetch_array($sql)){
                    
                        $c_id = $result["c_id"];
                        $c_name_str = "c_name_".$language; 
                        $c_name = $result[$c_name_str];
                        $c_icon = $result["c_icon"];
                    
                    
                    $query_num = "SELECT * FROM `video` where cat_id = '$c_id' ";	
                    $sql_num = mysqli_query($conn,$query_num);			
                    $vid_num = mysqli_num_rows($sql_num);
					if($vid_num > 0){
					$vid_num = $vid_num-1;
					}
                    
                    
                    $uid =$_SESSION['id'];
                    $query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $uid";	
                    $sql_check_cor = mysqli_query($conn,$query_check_cor);			
                    $check_cor = mysqli_num_rows($sql_check_cor);
					if($check_cor > 0){
					$check_cor = $check_cor-1;
					}
                    
                    
                    
                    
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
        
                            <a href="syllabus.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                              <span class="v-center">
                        <span class="btn btn-circle btn-deep-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                              </span>
                            </a>
        
                          </div>
                          <div class="panel-body">
                              <p class="text-headline margin-v-0-10"><a href="syllabus.php?c_id=<?php echo $c_id;?>" style="font-size:20px;"><?php echo $c_name; ?></a></p>
        
                            <p class="small margin-none">
                              <span class="fa fa-fw fa-star<?php if($total_rate < 1){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 2){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 3){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 4){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 5){echo "-o";}?> text-orange-800"></span>
                            </p>
        
                          </div>
                          <hr class="margin-none" />
                          <div class="panel-body" align="center">
        
                            <a class="btn btn-deep-orange-500 btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="syllabus.php?c_id=<?php echo $c_id;?>">
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
                   
        
                  </div> 
        
            
            <div class="container-fluid">
        
                    <div class="page-section">
                      <div class="media v-middle">
                        <div class="media-body">
                          <h1 class="text-display-1 margin-none">New Course</h1>
                          <!--<p class="text-subhead">Browse through thousands of lessons.</p>-->
                        </div>
                        <div class="media-right">
                          <div class="width-100 text-right">
                            <div class="btn-group">
                              <a class="btn btn-grey-800" href="all_courses.php"><i class="">See All</i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        
                    <div class="row" data-toggle="isotope">
                    <?php
                    $query = "SELECT * FROM `courses` where p_id != '0' ORDER BY c_id desc LIMIT 4 ";	
                    $sql = mysqli_query($conn,$query);
                    while($result= mysqli_fetch_array($sql)){
                    
                        $c_id = $result["c_id"];
                        $c_name_str = "c_name_".$language; 
                        $c_name = $result[$c_name_str];
                        $c_icon = $result["c_icon"];
                    
                    
                    $query_num = "SELECT * FROM `video` where cat_id = '$c_id' ";	
                    $sql_num = mysqli_query($conn,$query_num);			
                    $vid_num = mysqli_num_rows($sql_num);
					if($vid_num > 0){
					$vid_num = $vid_num-1;
					}
                    
                    
                    $uid =$_SESSION['id'];
                    $query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $uid";	
                    $sql_check_cor = mysqli_query($conn,$query_check_cor);			
                    $check_cor = mysqli_num_rows($sql_check_cor);
					if($check_cor > 0){
					$check_cor = $check_cor-1;
					}
                    
                    
                    
                    
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
        
                            <a href="syllabus.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                              <span class="v-center">
                        <span class="btn btn-circle btn-deep-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                              </span>
                            </a>
        
                          </div>
                          <div class="panel-body">
                              <p class="text-headline margin-v-0-10"><a href="syllabus.php?c_id=<?php echo $c_id;?>" style="font-size:20px;"><?php echo $c_name; ?></a></p>
        
                            <p class="small margin-none">
                              <span class="fa fa-fw fa-star<?php if($total_rate < 1){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 2){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 3){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 4){echo "-o";}?> text-orange-800"></span>
                              <span class="fa fa-fw fa-star<?php if($total_rate < 5){echo "-o";}?> text-orange-800"></span>
                            </p>
        
                          </div>
                          <hr class="margin-none" />
                          <div class="panel-body" align="center">
        
                            <a class="btn btn-deep-orange-500 btn-flat paper-shadow relative" data-z="0" data-hover-z="1" data-animated href="syllabus.php?c_id=<?php echo $c_id;?>">
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
                   
        
                  </div>
            
            <div class="container-fluid" style="clear:both;">

            <div class="page-section">
              <div class="media v-middle">
                <div class="media-body">
                  <h1 class="text-display-1 margin-none">My Completed Course</h1>
                  <!--<p class="text-subhead">Browse through thousands of lessons.</p>-->
                </div>
                <div class="media-right">
                  <div class="width-100 text-right">
                    <div class="btn-group">
                      <a class="btn btn-grey-800" href="my_complete_courses.php"><i class="">See All</i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" data-toggle="isotope">
            <?php
            $query = "SELECT * FROM `course_complete` AS cc 
						LEFT JOIN courses AS cor ON cc.c_id = cor.c_id 
						WHERE  cc.complete = '100' AND cc.u_id = '$uid' ORDER BY cc.cc_id desc LIMIT 4 ";	
			$sql = mysqli_query($conn,$query);
			$complete_cor_num = mysqli_num_rows($sql);
			while($result= mysqli_fetch_array($sql)){
			
				$c_id = $result["c_id"];
				$c_name_str = "c_name_".$language; 
				$c_name = $result[$c_name_str];
				$c_icon = $result["c_icon"];
			
			
			$query_num = "SELECT * FROM `video` where cat_id = '$c_id' ";	
			$sql_num = mysqli_query($conn,$query_num);			
			$vid_num = mysqli_num_rows($sql_num);
			if($vid_num > 0){
			$vid_num = $vid_num-1;
			}
			
			
			$uid =$_SESSION['id'];
			$query_check_cor = "SELECT * FROM `user_course` where cat_id = '$c_id' AND u_id = $uid";	
			$sql_check_cor = mysqli_query($conn,$query_check_cor);			
			$check_cor = mysqli_num_rows($sql_check_cor);
			if($check_cor > 0){
			$check_cor = $check_cor-1;
			}
						
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

                    <a href="syllabus.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                      <span class="v-center">
                <span class="btn btn-circle btn-deep-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>
                  <div class="panel-body">
					  <p class="text-headline margin-v-0-10"><a href="syllabus.php?c_id=<?php echo $c_id;?>" style="font-size:20px;"><?php echo $c_name; ?></a></p>

					<p class="small margin-none">
                      <span class="fa fa-fw fa-star<?php if($total_rate < 1){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 2){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 3){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 4){echo "-o";}?> text-orange-800"></span>
                      <span class="fa fa-fw fa-star<?php if($total_rate < 5){echo "-o";}?> text-orange-800"></span>
                    </p>

                  </div>
                </div>
              </div>
            
            <?php
				}
				if($complete_cor_num == 0){
			?>
            <div class="item col-xs-12 col-sm-12 col-lg-12 col-md-12">
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
                      <!--<div class="media-right media-padding">
                        <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated href="my_courses.php">
                        Go to My Courses
                    </a>
                      </div>-->
                    </div>
                  </div>
            </div>
            <?php		
				
				}
            ?>
          </div>
           

          </div>
            </div>
        </div>
    </div>
   </div>
   </div>
	
    
     
    
<?php include("footer.php");?>
