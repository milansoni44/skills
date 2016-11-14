<?php

	include("config.php");

	error_reporting(0);
	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	session_start();
	$language = $_COOKIE["language"];
	if(!isset($_COOKIE['language'])){
		$language = "lan2";
	}
	
	
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
	
	if(isset($_POST['lan_redirect'])){
	
	$lan_choosen = $_POST["lan_choosen"];
	$_COOKIE['language'] = $lan_choosen;
	$link_redirect = $_POST["link_redirect"];
	header("location:".$link_redirect);
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
  <title>Aur Seekho</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="css/vendor/all.css" rel="stylesheet">

 
  <link href="css/app/app.css" rel="stylesheet">
 
 <script type="text/javascript">
       function change_lan(lan)
		{
		
		var actual_link="<?php echo $actual_link ;?> ";
		var dataString = 'actual_link='+ actual_link + '&lan=' + lan;
		
			$.ajax({
				type: "POST",
				url: "language_change.php",
			   data: dataString,
			   cache: false,
				success: function(html){
				window.location.href=html;				  
	
				}
			 });
		 
		}

 </script>
	<style>
    .navbar-brand{
        border-right:none;
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
			<a href="index.php">
            <img src="images/logo.png"  height="70" />
          </a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-nav-margin-left">
          <li><a href="#home">Home</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#course">Featured Courses</a></li>
          <li><a href="#feedback">feedback</a></li>          
        </ul>
        <div class="navbar-right">
          <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
            <!-- user -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Choose Language<span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
                <li><a value="lan2"  onClick="change_lan('lan2')">Hindi</a></li>
                <li><a value="lan3"  onClick="change_lan('lan3')">Gujarati</a></li>
              </ul>
            </li>
            <!-- // END user -->
			<?php
	if (isset($_COOKIE['skills']))
	{
		?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle user" data-toggle="dropdown">
											<img src="images/profile/<?php echo $_COOKIE["profile_pic"]; ?>" alt="<?php echo $_COOKIE["full_name"]; ?> " class="img-circle" width="40"/> <?php echo $_COOKIE["u_name"]; ?> <span class="caret"></span>
										</a>
										<ul class="dropdown-menu" role="menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
											<li class="active"><a href="dashboard.php"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
											<li><a href="my_courses.php"><i class="fa fa-mortar-board"></i> My Courses</a></li>
											<li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
											<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
										</ul>
									</li>
									<?php
								}
								else
								{
									?>

									<a href="#" class="navbar-btn btn btn-primary" data-toggle="modal" data-target="#login">Log In</a>

		<?php }
?>
          </ul>
         
		 
        </div>
      </div>
      <!-- /.navbar-collapse -->

    </div>
  </div>

  <div class="parallax cover overlay cover-image-full home" id="home">
    <img class="parallax-layer" src="images/homebanner.jpg" alt="Learning Cover" />
    <div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-speed="8" data-opacity="true">
      <div class="v-center" style="vertical-align:top;">
        <div class="page-section overlay-bg-white-strong relative paper-shadow" data-z="1">
        	<h2>Search...</h2>
          <span class="text-display-2 margin-v-0- display-inline-block"><form name="frm_searhc" id="frm_search" method="post" action="search.php"><input type="text" name="srch" style="height:40px; vertical-align:middle;" placeholder="Search Courses..."><br>
		  <button class="btn btn-sm btn-primary" style="padding:5px; bottom:0; font-size:12px;" ><i class="icon icon-search"> Search</i></button></form>
          </span>
          <h2></h2>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container" id="features">
    <div class="page-section-heading">
      <h2 class="text-display-1">Features</h2>
      <p class="lead text-muted">Learn about all of the features we offer.</p>
    </div>
    <div class="row" data-toggle="gridalicious">

      <div class="media">
        <div class="media-left padding-none">
          <div class="bg-green-300 text-white">
            <div class="panel-body">
              <i class="fa fa-film fa-2x fa-fw"></i>
            </div>
          </div>
        </div>
        <div class="media-body">
          <div class="panel panel-default height-180">
            <div class="panel-body">
              <div class="text-headline">Language</div>
              <p>We have created content on the most relevant topics in your local language, so language is not a barrier for learning.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="media">
        <div class="media-left padding-none">
          <div class="bg-purple-300 text-white">
            <div class="panel-body">
              <i class="fa fa-life-bouy fa-2x fa-fw"></i>
            </div>
          </div>
        </div>
        <div class="media-body">
          <div class="panel panel-default height-180">
            <div class="panel-body">
              <div class="text-headline">Track progress</div>
              <p>Monitor your progress on your Dashboard. Learn achievements.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="media">
        <div class="media-left padding-none">
          <div class="bg-orange-400 text-white">
            <div class="panel-body">
              <i class="fa fa-user fa-2x fa-fw"></i>
            </div>
          </div>
        </div>
        <div class="media-body">
          <div class="panel panel-default height-180">
            <div class="panel-body">
              <div class="text-headline">Get Certified</div>
              <p>Get certified on your courses and move up in your career.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="media">
        <div class="media-left padding-none">
          <div class="bg-cyan-400 text-white">
            <div class="panel-body">
              <i class="fa fa-code fa-2x fa-fw"></i>
            </div>
          </div>
        </div>
        <div class="media-body">
          <div class="panel panel-default height-180">
            <div class="panel-body">
              <div class="text-headline">Diversified Skills</div>
              <p>Courses for everyone and everywhere.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="media">
        <div class="media-left padding-none">
          <div class="bg-pink-400 text-white">
            <div class="panel-body">
              <i class="fa fa-print fa-2x fa-fw"></i>
            </div>
          </div>
        </div>
        <div class="media-body">
          <div class="panel panel-default height-180">
            <div class="panel-body">
              <div class="text-headline">Multi-platform</div>
              <p>Enjoy learning through videos across your mobile, tablet or PC. You can also pause-resume or even replay whenever needed.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="media">
        <div class="media-left padding-none">
          <div class="bg-red-400 text-white">
            <div class="panel-body">
              <i class="fa fa-tasks fa-2x fa-fw"></i>
            </div>
          </div>
        </div>
        <div class="media-body">
          <div class="panel panel-default height-180">
            <div class="panel-body">
              <div class="text-headline">Learning Management System</div>
              <p>Range from systems for managing training and educational records to software for distributing online or blended/hybrid courses over the Internet with features for online </p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
  <br>
 

<br>
  <div class="container" id="course">
    <div class="page-section-heading">
      <h2 class="text-display-1">Browse Our Top Courses</h2>
      <p class="lead text-muted">Learn about all of the feature Courses we offer.</p>
    </div>
    
    
     <div class="slick-basic slick-slider" data-items="4" data-items-lg="3" data-items-md="2" data-items-sm="1" data-items-xs="1">
            <?php
            $query = "SELECT * FROM `courses` where p_id = '0' ";	
			$sql = mysqli_query($conn,$query)or die(mysql_error());
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
                            <img src="images/icons/<?php echo $c_icon; ?>" height="100" width="100" alt="<?php echo $c_name; ?>" title="<?php echo $c_name; ?>" style="margin-left:25%;">
                      </span>
                    </a>

                    <a href="<?php echo $link;?>" class="overlay overlay-full overlay-hover overlay-bg-white">
                      <span class="v-center">
                <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-play"></i></span>
                      </span>
                    </a>

                  </div>

                  <div class="panel-body">
                    <h4 class="text-headline margin-v-0-10"><a href="<?php echo $link;?>"><?php echo $c_name; ?></a></h4>

                  </div>
                  <hr class="margin-none" />
                  <div class="panel-body" align="center">

                    <?php
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
					?>

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
  
  <br/>

  

  <div class="parallax cover overlay height-300 margin-none" id="feedback">
    <img class="parallax-layer" data-auto-offset="true" data-auto-size="false" src="images/photodune-6745579-modern-creative-man-relaxing-on-workspace-m.jpg" alt="Learning Cover" />
    <div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-opacity="true" data-speed="8">
      <div class="v-center">
        <div class="page-section">
          <h1 class="text-display-2 overlay-bg-white margin-v-0-15 inline-block">Feedback</h1>
          <br/>
          <p class="lead text-overlay overlay-bg-white-strong inline-block">How others use E-learning to improve their skills</p>
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
  
<script>
  
	function f1(objButton){ 
	
	 var linkget = objButton.value;
	 //alert(linkget);
	$(".link_redirect").attr("value", linkget);
	 $('#lan').modal('show');
	}

</script> 
<?php include('footer.php');?>