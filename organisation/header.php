<?php include("config.php");?>
<?php include("checklogin.php");?>
<?php
	//used licenses allocation
	$sql = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
    $result = $conn->query($sql);
    $used = $result->num_rows;
?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/png" href="../images/fevicon.png"/>
  <title>Aur Seekho | Organisation</title>

  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
  <style type="text/css">
/*        @import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";
@import "http://fonts.googleapis.com/css?family=Roboto:400,500";*/
ul > li > a > div.box{ position: relative;left: 18px;}
.box > .icon { text-align: center; position: relative; }
.box > .icon > .image { position: relative; z-index: 2;bottom: 12px; margin: auto; width: 64px; height: 64px; border: 8px solid white; line-height: 64px; border-radius: 50%; background: #63B76C; vertical-align: middle; }
.box > .icon:hover > .image { background: #333; }
.box > .icon > .image > i { font-size: 18px !important; color: #fff !important; }
.box > .icon:hover > .image > i { color: white !important; }
.box > .icon > .info { margin-top: -24px; background: rgba(0, 0, 0, 0.04); border: 1px solid #e0e0e0; padding: 15px 0 10px 0; }
.box > .icon:hover > .info { background: rgba(0, 0, 0, 0.04); border-color: #e0e0e0; color: white; }
.box > .icon > .info > h3.title { font-family: "Roboto",sans-serif !important; font-size: 16px; color: #222; font-weight: 500; }
.box > .icon > .info > p { font-family: "Roboto",sans-serif !important; font-size: 13px; color: #666; line-height: 1.5em; margin: 20px;}
.box > .icon:hover > .info > h3.title, .box > .icon:hover > .info > p, .box > .icon:hover > .info > .more > a { color: #222; }
.box > .icon > .info > .more a { font-family: "Roboto",sans-serif !important; font-size: 12px; color: #222; line-height: 12px; text-transform: uppercase; text-decoration: none; }
.box > .icon:hover > .info > .more > a { color: #fff; padding: 6px 8px; background-color: #63B76C; }
.box .space { height: 30px; }
.material-panel:hover{
    background-color: rgba(179, 177, 177, 0.4) !important;
}
.material-panel{
    padding: 10px 0px;
}
    </style>
</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
      <div class="navbar-header">
<!--          <a class="toggle pull-left visible-xs" data-toggle="sidebar-menu" href="#sidebar-menu"><i class="fa fa-ellipsis-v"></i></a>-->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand navbar-brand-logo" style="border-right:none;">
            <a href="./index.php"><img src="../images/logo.png" height="70"></a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
<!--        <ul class="nav navbar-nav navbar-nav-margin-left">
          <li class="dropdown <?php if($pagename == 'user_list.php' || $pagename == 'user_add.php' || $pagename == 'user_edit.php'){echo 'active';}?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px;" style="font-size:14px;">User Management <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="<?php if($pagename == 'user_list.php'){echo 'active';}?>"><a href="user_list.php">User List</a></li>
              <li class="<?php if($pagename == 'user_add.php' || $pagename == 'user_edit.php'){echo 'active';}?>"><a href="user_add.php">Add User</a></li>            
            </ul>
          </li>
          <li class="<?php if($pagename == 'recent_watch.php'){echo 'active';}?>"><a href="recent_watch.php" style="font-size:14px;">Recent  Watch Video</a></li>
        </ul>-->
        <div class="navbar-right">
          <ul class="nav navbar-nav navbar-nav-bordered ">
            <!-- user -->
<!--            <li class="dropdown"><a href="" style="font-size:14px;">Valid Up to : <?php echo  date("d-m-Y", strtotime($uvalidity));?></a></li>-->
<!--            <li class="dropdown"><a href="" style="font-size:14px;">License Used : <?php echo $used."/".$ulimit;?></a></li>-->
            <li class="dropdown user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="font-size:14px;">
              	<?php
					$pro_image = "../images/profile/".$_SESSION["profile_pic"];
					if(!file_exists($pro_image) || !isset($_SESSION['profile_pic'])){
					$pro_image = "../images/user_place.png";
					}
					if($pro_image == "../images/profile/" || !isset($_SESSION['profile_pic'])){
					$pro_image = "../images/user_place.png";
					}
				?>
                <img src="<?php echo $pro_image;?>" alt="" class="img-circle" /> <?php echo $uname;?><span class="caret"></span>
              </a>
                <ul class="dropdown-menu" role="menu" style="margin-top: 64px;">
<!--                <li><a href="#"><i class="fa fa-user"></i> My profile</a></li>						-->
                <li><a href="#"><i class="fa fa-gear"></i> Account settings</a></li>
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
    
    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-1 sidebar-mini-reveal sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse" style="margin-top: 30px; background-color: #ffffff;">
      <div data-scrollable>

          <ul class="sidebar-menu sm-icons-right" style="border-color: #ffffff !important;">
            <li><a href="dashboard.php"><i class="fa fa-bar-chart-o"></i><span>Dashboard</span></a></li>
          <li class="hasSubmenu">
              <a href="#course-menu" style="color: #337ab7;"><i class="fa fa-mortar-board"></i><span>Users</span></a>
            <ul id="course-menu" class="">
                <li><a href="user_add.php"><span>Add User</span></a></li>
                <li><a href="user_list.php"><span>User List</span></a></li>
            </ul>
          </li>
          <li><a href="profile.php" style="color:#5cb85c;"><i class="fa fa-comments"></i><span>Organization Profile</span></a></li>
          <li><a href="reports.php" style="color:#d9534f;"><i class="fa fa-comments"></i><span>Reports</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
        </ul>
      </div>
    </div>