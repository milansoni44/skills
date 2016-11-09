<?php
session_start();
include('config.php');
if($_POST)
{
$uid = $_SESSION["id"];
$full_name = $_SESSION["full_name"];
$profile_pic = $_SESSION["profile_pic"];
$comment=$_POST['comment'];
$v_id=$_POST['video_id'];


$query1 = "INSERT INTO `comment`(`v_id`, `u_id`, `comment`) VALUES ('$v_id','$uid','$comment') ";	
$sql1 = mysqli_query($conn,$query1);


$date =  date("Y-m-d H:i:s") ;


}


?>
<li class="list-group-item media v-middle">
    <div class="media-left">
      <div class="icon-block half img-circle bg-grey-300">
        <img src="images/profile/<?php echo $profile_pic;?>" alt="person" class="img-circle width-50" />
      </div>
    </div>
    <div class="media-body">
      <h4 class="text-subhead margin-none">
        <a href="#" class="link-text-color"><?php echo $comment;?></a>
      </h4>
      <div class="text-light text-caption">
        posted by
        <a href="#">
          <?php echo $full_name;?></a> &nbsp; | <i class="fa fa-clock-o fa-fw"></i> <?php echo $date;?>
      </div>
    </div>
</li>