<?php 
include("header.php");
	
	
	
	$strSearch = $_REQUEST["srch"];
	if($strSearch !='')
	{
	$query1 = "select * from courses where c_name_lan1 like '%".$strSearch."%' or c_name_lan2 like '%".$strSearch."%' or c_name_lan2 like '%".$strSearch."%' ";	
	}
	else
	{
		$query1 = "select * from courses where p_id=1";
	}
	
	$sql1 = mysqli_query($conn,$query1);
	$result1= mysqli_fetch_array($sql1);
		$cat_id = $result1['c_id'];
		$cat_name_str = "c_name_".$language; 
		$cat_name = $result1[$cat_name_str];
		$cat_icon = $result1['c_icon'];
	
?>
<style>
.navbar-brand{
	border-right:none;
}
</style>
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
          <h1 class="text-display-2 margin-none"><?php echo $cat_name;?></h1>
        </div>
      </div>
    </div>
  </div>-->
<!--<div class="parallax bg-white page-section">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-body">
          <h1 class="text-display-2 margin-none">All Courses</h1>
          <p class="text-light lead">Browse through thousands of lessons.</p>
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
                    <h1 class="text-display-1 margin-none" style="vertical-align:middle;">Search Result</h1>
             		</div>
                    
                    <?php /*?><div class="col-md-6 pull-right" style="padding-right:0px;">
						<form name="frm_searhc" id="frm_search" method="get" action="search.php">
                    <div id="custom-search-input">
                            <div class="input-group col-md-6 pull-right" style="padding-right:0px;">
								
                                <input type="text" name="srch" class="  search-query form-control" placeholder="Search" value="<?php echo (isset($_REQUEST["srch"])?$_REQUEST["srch"]:'');?>" />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
						</form>
                    </div><?php */?>
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
				if($strSearch !='')
	{
	$query = "select * from courses where c_name_lan1 like '%".$strSearch."%' or c_name_lan2 like '%".$strSearch."%' or c_name_lan3 like '%".$strSearch."%' ";	
	}
	else
	{
		$query = "select * from courses where p_id=0";
	}
	
          //  $query = "SELECT * FROM `courses` where p_id = '".$cat_id."' ";	
	//echo $query;
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
				
					#watch num
					$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='".$uid."' and video.cat_id = '$c_id'";	
	
					$sqlVV = mysqli_query($conn,$sqlVideoWatch);
					$rsCount = mysqli_fetch_array($sqlVV); 
					$intCount = $rsCount['count'];
					if($intCount > 0){
					$intCount = $intCount-1;
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
                        <?php if(isset($_SESSION['id'])){echo $intCount."/";}?><?php echo $vid_num; ?> Videos
                      </div>
                     <?php if(isset($_SESSION['id'])){
					 ?>
                     <div class="media-right">
                        <div class="progress progress-mini width-100 margin-none">
                          <div class="progress-bar progress-bar-deep-orange-300" role="progressbar" aria-valuenow="<?php echo ($intCount / $vid_num) * 100 ;  ?>" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                          </div>
                        </div>
                      </div>
                      <?php
                      		}
					  ?>
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
                    View Course
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

            <br/>
			<div class="row" align="center">
            <button class="btn btn-deep-orange-500 btn-flat paper-shadow relative" data-z="0" data-hover-z="1" onClick="window.history.back();">Go Back</button>
            </div>
          </div>
		  
        </div>
        
		
      </div>
    </div>
    
    </div>

  </div>

 <?php include('footer.php');?>