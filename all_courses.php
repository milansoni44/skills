 <?php include("header.php");?>
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
	
	if(isset($_POST['lan_redirect'])){
	
	$lan_choosen = $_POST["lan_choosen"];
	$_SESSION['language'] = $lan_choosen;
	$link_redirect = $_POST["link_redirect"];
	header("location:".$link_redirect);
	}
	
?>

  
  <div class="parallax bg-white page-section">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-body">
          <h1 class="text-display-2 margin-none">All Courses</h1>
          <p class="text-light lead">Browse through thousands of lessons.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="page-section">
      <div class="row">

       <div class="col-md-12">
       <div class="container-fluid">
       <div class="page-section"  style="padding:5px 0px;">
                	
                    <!--<div class="col-md-6">
                    <h1 class="text-display-1 margin-none" style="vertical-align:middle;"><img src="images/icons/<?php// echo $cat_icon; ?>" height="50" /><?php// echo $cat_name;?></h1>
             		</div>-->
                    <!--<div class="col-md-6 pull-right" style="padding-right:0px;">
						<form name="frm_searhc" id="frm_search" method="get" action="search.php">
                    <div id="custom-search-input">
                            <div class="input-group col-md-6 pull-right" style="padding-right:0px;">
								
                                <input type="text" name="srch" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
						</form>
                    </div>-->
            </div>
        <div class="clearfix margin-v-0-15"></div>

          <div class="row" data-toggle="isotope">
            <?php
            $query = "SELECT * FROM `courses` where p_id = '0' ";	
			$sql = mysqli_query($conn,$query);
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
                    <a href="category.php?c_id=<?php echo $c_id;?>" class="padding-none overlay overlay-full icon-block ">
                      <span class="v-center">
                            <img src="images/icons/<?php echo $c_icon; ?>" height="100" width="100" alt="<?php echo $c_name; ?>" title="<?php echo $c_name; ?>" >
                      </span>
                    </a>

                    <a href="category.php?c_id=<?php echo $c_id;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                      <span class="v-center">
                <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>

                  <div class="panel-body">
                    <h4 class="text-headline margin-v-0-10"><a href="category.php?c_id=<?php echo $c_id;?>"><?php echo $c_name; ?></a></h4>

                  </div>
                  <hr class="margin-none" />
                  <div class="panel-body" align="center">

                    <?php
                    if (!isset($_SESSION['skills']))
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
					?>

                  </div>

                </div>
              </div>
            <?php
				}
            ?>
          </div>


          <br/>
          <br/>
		</div>
        </div>
        

      </div>
    </div>

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
<script>

    
	function f1(objButton){ 
	
	 var linkget = objButton.value;
	 //alert(linkget);
	$(".link_redirect").attr("value", linkget);
	 $('#lan').modal('show');
	}

</script> 
  <?php include('footer.php');?>