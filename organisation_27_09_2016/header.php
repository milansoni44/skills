<?php include("config.php");?>
<?php include("checklogin.php");?>
<?php
	//used licenses allocation
	$sql = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
    $result = $conn->query($sql);
    $used = $result->num_rows;
?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

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
            <a href="./dashboard.php"><img src="../images/logo.png" height="70"></a>
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
