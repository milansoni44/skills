<?php	
	if(isset($_COOKIE['skills'])){
	?>
    <script>
	window.location.href='dashboard.php';
	</script>
    <?php //header("location:dashboard.php");
	}
	include("header.php");
	
?>

  <div class="parallax cover overlay cover-image-full home" id="home">
    <img class="parallax-layer" src="images/homebanner.jpg" alt="Learning Cover" />
    <!--<div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-speed="8" data-opacity="true">
      <div class="v-center">
        <div class="page-section overlay-bg-white-strong relative paper-shadow" data-z="1">
          <h1 class="text-display-2 margin-v-0-15 display-inline-block">Do more.. Know more...</h1>
        </div>
      </div>
    </div>-->
  </div>
  <br>
  <div class="container" id="features">
    <div class="page-section-heading">
      <?php
      //Feature Head
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'feature_head'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$feature_head = $result_trans[$language];
		
	  //Feature Head Text
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'feature_head_text'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$feature_head_text = $result_trans[$language];
	  ?>
      <h2 class="text-display-1"><?php echo $feature_head;?></h2>
    </div>
    <div class="row" data-toggle="gridalicious">

      <?php
	  
	    $query = "SELECT * FROM `website_translate` WHERE `key_value` = 'features_title' ORDER BY seq";
		$sql = mysqli_query($conn, $query);
		while ($result = mysqli_fetch_array($sql))
		{
	
			$wt_id = $result["wt_id"];
			$features_title = $result[$language];
			$extra1 = $result["extra1"];
			$bg_color = $result["extra2"];
			$icon = $result["extra3"];
			
			$query1 = "SELECT * FROM `website_translate` where wt_id = '$extra1'";
			$sql1 = mysqli_query($conn, $query1);
			$result1 = mysqli_fetch_array($sql1);
			$features_text = $result1[$language];
		
	  ?>
          <div class="media">
            <div class="media-left padding-none">
              <div class="<?php echo $bg_color;?> text-white">
                <div class="panel-body">
                  <i class="fa <?php echo $icon;?> fa-2x fa-fw"></i>
                </div>
              </div>
            </div>
            <div class="media-body">
              <div class="panel panel-default height-190">
                <div class="panel-body">
                  <div class="text-headline"><?php echo $features_title;?></div>
                  <p><?php echo $features_text;?></p>
                </div>
              </div>
            </div>
          </div>
      <?php	
		}
      
	  ?>
      

    </div>

  </div>
  <br>
<div class="container">
	<div class="page-section-heading">
    	<?php
        //Brows Head head
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'browse_cor_head'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$browse_cor_head = $result_trans[$language];
		
		//Brows Head Text
		$query_trans = "SELECT * FROM website_translate WHERE key_value = 'browse_cor_text'";
		$sql_trans = mysqli_query($conn,$query_trans);
		$result_trans = mysqli_fetch_array($sql_trans);
		$browse_cor_text = $result_trans[$language];
		?>
      <h2 class="text-display-1"><?php echo $browse_cor_head;?></h2>
    </div>
    <div class="row">
		<div class="col-md-12">
                <div id="Carousel" class="carousel slide">
                
                <?php
					$query = "SELECT * FROM `courses` where p_id = '0' ";	
					$sql = mysqli_query($conn,$query)or die(mysql_error());
					$cor_total = mysqli_num_rows($sql);				
					$cor_total = round($cor_total);
					$cor_num = mysqli_num_rows($sql_num);
					$nav_num = round($cor_total/4)-1;
				?> 
               
                <ol class="carousel-indicators">
                    <?php 
						$i = 0;
						for($i=0; $i<=$nav_num; $i++ ){
						if($i == 0){
						echo "<li data-target='#Carousel' data-slide-to=".$i." class='active'></li>";
						}
						else{
						echo "<li data-target='#Carousel' data-slide-to=".$i."></li>";
						}
						
						}			
					?>
                </ol>
                 
                <!-- Carousel items -->
                <div class="carousel-inner">
                    
                <?php
				$low_limit = 0;
				$up_limit = 4;
                
				$i = 0;
				for($i=0; $i<=$nav_num; $i++ ){
				
				$query = "SELECT * FROM `courses` where p_id = '0' LIMIT $low_limit,4";	
				$sql = mysqli_query($conn,$query)or die(mysql_error());
				?>
                <div class="item <?php if($i == 0){ echo "active";}?>">
                	<div class="row">
                <?php
				while($result= mysqli_fetch_array($sql)){
					
					
					
					$c_id = $result["c_id"];
					$c_name_str = "c_name_".$language;
                    $c_name = $result[$c_name_str];
					$c_icon = $result["c_icon"];
				
				
				$query_num = "SELECT * FROM `courses` where p_id = '$c_id' ";
				$sql_num = mysqli_query($conn,$query_num);
				$cor_num = mysqli_num_rows($sql_num);
				?>
				
                	<div class="item col-xs-12 col-sm-6 col-lg-3 col-md-3">
                <div class="panel panel-default paper-shadow" data-z="0.5">

                  <div class="panel-heading">
                    <div class="media media-clearfix-xs-min v-middle">
                      <div class="media-body text-caption text-light">
                        <?php echo $cor_num;?> Courses
						
						<?php $link = ($cor_num >0?'category.php?c_id='.$c_id:'syllabus.php?c_id='.$c_id); ?>
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
                    <span class="img icon-block height-100 bg-default"></span>
                    <a href="<?php echo $link;?>" class="padding-none overlay overlay-full icon-block ">
                      <span class="v-center" align="center">
                            <img src="images/icons/<?php echo $c_icon; ?>" height="100" width="100" alt="<?php echo $c_name; ?>" title="<?php echo $c_name; ?>">
                      </span>
                    </a>

                    <a href="<?php echo $link;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                      <span class="v-center">
                <span class="btn btn-circle btn-deep-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>

                  <div class="panel-body">
                    <h4 class="text-headline margin-v-0-10"><a href="<?php echo $link;?>" style="font-size:18px;"><?php echo $c_name; ?></a></h4>

                  </div>
                  <hr class="margin-none" />
                  <div class="panel-body" align="center">

                    <button class="btn btn-deep-orange-500 btn-flat paper-shadow relative" onClick="window.location='<?php echo $link;?>'" ><?php echo $go_to_cat_translate; ?></button>
					<?php /*?><?php
                    if (!isset($_COOKIE['skills']))
                    {
					?>
                    <button class="btn btn-deep-orange-500 btn-flat paper-shadow relative linkget" value='<?php echo $link;?>' onClick="f1(this)"  >Go to course</button>
                    <?php
                    }
                    else{
                    ?>
                    <button class="btn btn-deep-orange-500 btn-flat paper-shadow relative" onClick="window.location='<?php echo $link;?>'" >Go to course</button>
                    <?php
                    }
					?><?php */?>

                  </div>

                </div>
              </div>
                	
				
				<?php
                }
				?>
                	</div><!--.row-->
                </div><!--.item-->
                <?php
				$low_limit = $low_limit+4;
				$up_limit = $up_limit+4;
				}				
				
				?>
            
                 
                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel" class="left carousel-control"><i class="fa fa-arrow-left v-center" style="margin-top:4px;"></i></a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control"><i class="fa fa-arrow-right v-center" style="margin-top:4px;"></i></a>
                </div><!--.Carousel-->
                 
		</div>
	</div>
</div><!--.container--> 



<br/>  
  
  <br/>

  

  <div class="parallax cover overlay height-300 margin-none" id="feedback">
    <img class="parallax-layer" data-auto-offset="true" data-auto-size="false" src="images/photodune-6745579-modern-creative-man-relaxing-on-workspace-m.jpg" alt="Learning Cover" />
    <div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-opacity="true" data-speed="8">
      <div class="v-center">
        <div class="page-section">
          <h1 class="text-display-2 overlay-bg-white margin-v-0-15 inline-block">
			<?php
			$query = "SELECT * FROM `website_translate` where wt_id = '13'";
			$sql = mysqli_query($conn, $query);
			$result = mysqli_fetch_array($sql);
			echo $feedback_head = $result[$language];
			?>
		  </h1>
          <br/>
          <p class="lead text-overlay overlay-bg-white-strong inline-block">
		    <?php
			$query = "SELECT * FROM `website_translate` where wt_id = '14'";
			$sql = mysqli_query($conn, $query);
			$result = mysqli_fetch_array($sql);
			echo $feedback_text = $result[$language];
			?>
		  </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="page-section">
      <div class="row">
        <div class="col-md-4">
          <div class="testimonial">
            <div class="panel panel-default">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet doloremque enim error id, inventore magni odio odit quo tenetur.</p>
              </div>
            </div>
            <div class="media v-middle">
              <div class="media-left">
                <img src="images/people/50/guy-8.jpg" alt="People" class="img-circle width-40" />
              </div>
              <div class="media-body">
                <p class="text-subhead margin-v-5-0">
                  <strong>User1 <span class="text-muted">@ Aur Seekho</span></strong>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial">
            <div class="panel panel-default">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet doloremque enim error id, inventore magni odio odit quo tenetur.</p>
              </div>
            </div>
            <div class="media v-middle">
              <div class="media-left">
                <img src="images/people/50/guy-6.jpg" alt="People" class="img-circle width-40" />
              </div>
              <div class="media-body">
                <p class="text-subhead margin-v-5-0">
                  <strong>User2 <span class="text-muted">@ Aur Seekho</span></strong>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial">
            <div class="panel panel-default">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet doloremque enim error id, inventore magni odio odit quo tenetur.</p>
              </div>
            </div>
            <div class="media v-middle">
              <div class="media-left">
                <img src="images/people/50/guy-3.jpg" alt="People" class="img-circle width-40" />
              </div>
              <div class="media-body">
                <p class="text-subhead margin-v-5-0">
                  <strong>User1 <span class="text-muted">@ Aur Seekho</span></strong>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/>

  </div>
  
    <div class="modal grow modal-backdrop-white fade" id="lan">
    <div class="modal-dialog modal-sm">
      <div class="v-cell">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Choose Language</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
             
              <div class="form-group">
                <br/>
                <input type="hidden" value="" name="link_redirect" class="link_redirect"/>
                <select class="form-control" name="lan_choosen">            
                  <option value="lan2" selected>Hindi</option>
                  <option value="lan3">Gujarati</option>
                </select>
              </div>
              <button type="submit" name="lan_redirect" class="btn btn-success paper-shadow relative" data-z="0.5" data-hover-z="1">Select</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
     <!----modal starts here--->
  <div id="modal_first" class="modal grow modal-backdrop-white fade" role='dialog'>
    <div class="modal-dialog modal-sm">
      <div class="v-cell">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Choose Language</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
             
              <div class="form-group">
                <br/>
                <input type="hidden" value="index.php" name="link_redirect"/>
                <select class="form-control" name="lan_choosen">            
                  <option value="lan2" selected>Hindi</option>
                  <option value="lan3">Gujarati</option>
                </select>
              </div>
              <button type="submit" name="lan_redirect" class="btn btn-success paper-shadow relative" data-z="0.5" data-hover-z="1">Select</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Modal ends here--->
<script>
  
	function f1(objButton){ 
	
	 var linkget = objButton.value;
	 //alert(linkget);
	$(".link_redirect").attr("value", linkget);
	 $('#lan').modal('show');
	}

</script> 



<?php include('footer.php');?>

<script src="js/jquery.min.js"></script>

 	<script  type="text/javascript" src="js/typeahead.min.js"></script>
	<script type="text/javascript">
    var $j = jQuery.noConflict();
    $j(document).ready(function(){
		<?php
		if(!isset($_COOKIE['language'])){
		
		?>        
		$('#modal_first').modal({
				backdrop: 'static',
				keyboard: true, 
				show: true
		}); 
		<?php
		}
		?>
        var course_list_sugest = <?php echo '["' . implode('", "', $course_list_sugest) . '"]' ?>;
		
		/*alert(course_list_sugest);*/
		
        $j('input.typeahead').typeahead({
            name: 'accounts',
            local: course_list_sugest
        });
    });  
    </script>