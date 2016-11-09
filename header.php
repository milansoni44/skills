<?php

	include("config.php");
	
	$website_name = $_SERVER['HTTP_HOST'];

	error_reporting(0);
	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	session_start();
	$language = $_SESSION["language"];
	if(!isset($_SESSION['language'])){
		$language = "lan2";
	}
	
	if(isset($_GET['lan'])){
	$lan = $_GET['lan'];
	$_SESSION['language'] = $lan;
	$language = $_SESSION["language"];
	$actual_link = str_replace("&lan=lan1", "", $actual_link);
	$actual_link = str_replace("&lan=lan2", "", $actual_link);
	$actual_link = str_replace("&lan=lan3", "", $actual_link);
	$actual_link = str_replace("&lan=lan4", "", $actual_link);
	$actual_link = str_replace("&lan=lan5", "", $actual_link);
	$actual_link = str_replace("&lan=lan6", "", $actual_link);
	$actual_link = str_replace("?lan=lan1", "", $actual_link);
	$actual_link = str_replace("?lan=lan2", "", $actual_link);
	$actual_link = str_replace("?lan=lan3", "", $actual_link);
	$actual_link = str_replace("?lan=lan4", "", $actual_link);
	$actual_link = str_replace("?lan=lan5", "", $actual_link);
	$actual_link = str_replace("?lan=lan6", "", $actual_link);
	
	header("location:".$actual_link);
	}
	
	if(isset($_POST['lan_redirect'])){
	
	$lan_choosen = $_POST["lan_choosen"];
	$_SESSION['language'] = $lan_choosen;
	$link_redirect = $_POST["link_redirect"];
	header("location:".$link_redirect);
	}
	
	#type head start
	$query = "select c_name_lan1 from courses where p_id != '0'";
	$sql = mysqli_query($conn,$query);
	$course_list_sugest = array();
	while($result = mysqli_fetch_array($sql)){
	$c_name_lan_search = $result['c_name_lan1'];
	array_push($course_list_sugest, $c_name_lan_search);
	}
	#type head end
	
	#website translation start
	include_once("translate.php");
	#website translation end
?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <meta name="description" content="">
  <meta name="author" content="Let's Enkindle">
  <link rel="shortcut icon" type="image/png" href="images/fevicon.png"/>
  <link rel="shortcut icon" type="image/png" href="http://aurseekho.com/images/fevicon.png"/>
  <title>AUR SEEKHO</title>

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
<!--carousel start-->
<style type="text/css">

.carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
}
/* The controlsy */
.carousel-control {
	left: -12px;
    height: 40px;
	width: 40px;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    margin-top: 90px;
}
.carousel-control.right {
	right: -12px;
}
/* The indicators */
.carousel-indicators {
	right: 50%;
	top: auto;
	bottom: -10px;
	margin-right: -19px;
}
/* The colour of the indicators */
.carousel-indicators li {
	background: #cecece;
}
.carousel-indicators .active {
background: #428bca;
}
    </style>
<!--carousel-->
<!--type head start-->

<style type="text/css">

.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 23px 0px 0px 23px;
	border-right:none;
	font-size: 20px;
	color:#FFFFFF;
	line-height: 20px;
	outline: medium none;
	padding: 4px 12px;
	float:right;
	
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
	border-right:none;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 300px;
}
.tt-suggestion {
	font-size: 14px;
	line-height: 24px;
	padding: 3px 10px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
.twitter-typeahead{
	float:right;
}
</style>  
<!--type head end-->  

<style>
.navbar-brand{
	border-right:none;
}
</style>
<?php
if($website_name == "aurseekho.com"){
include("google_analytic_aurseekho.php");
}
if($website_name == "learning-delight.com"){
include("google_analytic_learning.php");
}

?>


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
            <a href="<?php if (isset($_SESSION['skills'])){ echo "dashboard.php";} else{ echo "index.php";}?>">
            <img src="images/logo.png"  height="70" />
          </a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-nav-margin-left">
          <li class="dropdown">
                <a href="#" class="dropdown-toggle ripple" data-toggle="dropdown"><?php echo $category_translate;?> <span class="caret"></span></a>
                <ul class="dropdown-menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
                    <li><a href="all_courses.php"><?php echo $category_translate;?></a></li>
                    <?php
                        $i = "1";
                        $query = "SELECT * FROM `courses` where p_id = '0' ";
                        $sql = mysqli_query($conn, $query);
                        while ($result = mysqli_fetch_array($sql))
                        {

                            $c_id = $result["c_id"];
                            $c_name_str = "c_name_" . $language;
                            $c_name = $result[$c_name_str];
                            $c_icon = $result["c_icon"];
                            ?>
                            <li><a href="category.php?c_id=<?php echo $c_id; ?>"><?php echo $c_name; ?></a></li>
                    <?php
                }
            ?>
                </ul>
            </li>
          <li style="width:250px;">
            	<form name="frm_searhc" id="frm_search" method="get" action="search.php" style="margin-top:20px;">
                <span class="col-md-10 col-sm-8 col-xs-8 col-lg-10" style="padding-right:0;">
                	<input type="text" name="srch" class="typeahead tt-query search-query form-control pull-right" placeholder="Search Courses" value="<?php echo $_REQUEST["srch"];?>" autocomplete="off" spellcheck="false"/>
                </span>
                <span class="col-md-2 col-sm-4 col-xs-4 col-lg-2 pull-left" style="padding:0;">
                	<button type="submit" class="btn btn-primary pull-left" style="border-radius: 0px 23px 23px 0px; height:36px;"><i class="icon icon-search"></i></button>
                </span>
                </form>
        </li>          
        </ul>
        <div class="navbar-right">
          <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
            <!-- user -->
            <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<?php echo $choose_lan_translate;?><span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
									<?php
										if ($pagename == "all_courses.php" || $pagename == "dashboard.php" || $pagename == "profile.php" || $pagename == "index.php")
										{
											?>		
											<?php
											$i = "1";
											$query = "SELECT * FROM `language` WHERE status='active' ";

											$sql = mysqli_query($conn, $query);
											while ($result = mysqli_fetch_array($sql))
											{

												$l_id = $result["l_id"];
												$l_name = $result["l_name"];
												$l_slug = $result["l_slug"];
												$l_code = $result["l_code"];
												$status = $result["status"];
												?>
												<li><a href="<?php echo $actual_link ?>?lan=<?php echo $l_slug ?>"><?php echo $l_name ?></a></li>
												<?php }
											?>
											<?php
										}
										else
										{
											?>
											<?php
											$i = "1";
											$query = "SELECT * FROM `language` WHERE status='active' ";

											$sql = mysqli_query($conn, $query);
											while ($result = mysqli_fetch_array($sql))
											{

												$l_id = $result["l_id"];
												$l_name = $result["l_name"];
												$l_slug = $result["l_slug"];
												$l_code = $result["l_code"];
												$status = $result["status"];
												?>
												<li><a href="<?php echo $actual_link ?>&lan=<?php echo $l_slug ?>"><?php echo $l_name ?></a></li>
												<?php }
											?>					
		<?php
	}
?>
								</ul>
							</li>
            <!-- // END user -->
			<?php
	if (isset($_SESSION['skills']))
	{
		?>
									<!-- notifications -->
                                    <li class="dropdown notifications updates">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <?php
                                        $profile_chk = "SELECT * FROM user WHERE (full_name = '' OR email = ''  OR language = '' OR dob = '' OR state = '' OR country = '' OR education = '' OR occupation = '') AND u_id = '".$_SESSION['id']."'";
										$sql_profile_chk = mysqli_query($conn,$profile_chk);
										$profile_chk_num = mysqli_num_rows($sql_profile_chk );
										if($profile_chk_num >= 1){	
											echo "<span class='badge badge-primary'>1</span>";
										}
										?>
                                        
                                      </a>
                                      <ul class="dropdown-menu" role="notification" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
                                        <li class="dropdown-header">Notifications</li>
                                        <?php                                        
										if($profile_chk_num >= 1){
										?>
                                        <li class="media">
                                          <!--<div class="pull-right">
                                            <span class="label label-success">New</span>
                                          </div>-->
                                          <!--<div class="media-left">
                                            <img src="images/people/50/guy-2.jpg" alt="people" class="img-circle" width="30">
                                          </div>-->
                                          <div class="media-body">
                                            <a href="profile.php">Please Complete Your Profile to Play videos</a>
                                            <!--<br/>
                                            <span class="text-caption text-muted">5 mins ago</span>-->
                                          </div>
                                        </li>
                                        <?php
                                        }
										else{
										?>
                                        <li class="media">
                                          <!--<div class="pull-right">
                                            <span class="label label-success">New</span>
                                          </div>-->
                                          <!--<div class="media-left">
                                            <img src="images/people/50/guy-2.jpg" alt="people" class="img-circle" width="30">
                                          </div>-->
                                          <div class="media-body">
                                            <a href="javascript:void();">You Don't have Any Notification</a>
                                            <!--<br/>
                                            <span class="text-caption text-muted">5 mins ago</span>-->
                                          </div>
                                        </li>
                                        <?php
										}
										?>
                                      </ul>
                                    </li>
                                    <!-- // END notifications -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                        	<?php
											$pro_image = "images/profile/".$_SESSION["profile_pic"];
                                            if(!file_exists($pro_image) || !isset($_SESSION['profile_pic'])){
											$pro_image = "images/user_place.png";
											}					
											if($pro_image == "images/profile/" || !isset($_SESSION['profile_pic'])){
											$pro_image = "images/user_place.png";
											}
											?>
											<img src="<?php echo $pro_image;?>" alt="" class="img-circle" width="30px" height="30px"/> <?php echo $_SESSION["full_name"]; ?> <span class="caret"></span>
										</a>
										<ul class="dropdown-menu" role="menu" style="margin-top: 64px; height: auto; display: none; overflow: visible; top: 100%; opacity: 0;">
											<li class="active"><a href="dashboard.php"><i class="fa fa-bar-chart-o"></i> <?php echo $dashboard_translate;?></a></li>
											<li><a href="profile.php"><i class="fa fa-user"></i> <?php echo $proile_translate;?></a></li>
											<li><a href="change_password.php"><i class="fa fa-lock"></i><?php echo $change_password_translate;?></a></li>
											<li><a href="logout.php"><i class="fa fa-sign-out"></i> <?php echo $logout_translate;?></a></li>
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