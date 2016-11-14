<?php 

	include("config.php");
	include("checklogin.php");
	session_start();
	
	$vid_id = $_GET["v_id"];
	$query1 = "SELECT * FROM `video` where v_id = '$vid_id' ";	
	
	$sql1 = mysqli_query($conn,$query1);
	$result1= mysqli_fetch_array($sql1);
	
		$v_name_str = "v_name_".$language; 
		$v_name_str = trim($v_name_str);
		$v_name = $result1[$v_name_str];
		$v_url_str = "v_url_".$language; 
		$v_url_str = trim($v_url_str);
		$v_url = $result1[$v_url_str];
		$vid_level = $result1["v_level"]; 
		$cat_id = $result1["cat_id"];
	
		 
	
?>
<?php
	$pagename =  basename($_SERVER['PHP_SELF']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	
	if(isset($_GET['lan'])){
	$lan = $_GET['lan'];
	$_COOKIE['language'] = $lan;
	$language = $_COOKIE["language"];
	$actual_link = str_replace("&lan=lan1","",$actual_link);
	$actual_link = str_replace("&lan=lan2","",$actual_link);
	$actual_link = str_replace("&lan=lan3","",$actual_link);
	$actual_link = str_replace("&lan=lan4","",$actual_link);
	$actual_link = str_replace("&lan=lan5","",$actual_link);
	$actual_link = str_replace("&lan=lan6","",$actual_link);
	
	header("location:".$actual_link);
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
  <title>Learning</title>

  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">


</head>

<body>

  <!-- Fixed navbar -->
  <?php include("header.php");?>

  <div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-left text-center">
          
        </div>
        <div class="media-body">
          <h1 class="text-white text-display-1 margin-v-0"><?php echo $v_name;?> </h1>
        </div>
        <div class="media-right">
          <span class="label bg-blue-500">User</span>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-8">

          <!-- video div-->
          <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
          <iframe id="player1" src="https://player.vimeo.com/video/<?php echo $v_url;?>?api=1&player_id=player1"
                    width="100%" height="400" data-seek="false" frameborder="0" webkitallowfullscreen mozallowfullscreen
                    allowfullscreen></iframe>
          <?php /*?><iframe src="https://player.vimeo.com/video/<?php echo $v_url;?>?byline=0&portrait=0&badge=0" width="100%" height="400"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php */?>
          <!-- // END video div-->

          <br/>
          <br/>
		  <div class="page-section padding-top-none">
            <div class="panel panel-default paper-shadow" data-z="0.5">
              <div class="panel-heading">
                <h4 class="text-headline">Post a comment</h4>
              </div>
              <div class="panel-body">
                <form>
                  <div class="form-group form-control-material">
                  	<input type="hidden" name="video_id" id="video_id" value="<?php echo $vid_id;?>" >
                    <textarea id="comment" class="form-control used" placeholder="Your comment .."></textarea>
                    <label for="reply">Your comment</label>
                  </div>
                  <div class="text-right">
                    <button class="btn btn-primary submit" type="button">Post comment <i class="fa fa-plus"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>		 
         
          <div class="panel panel-default paper-shadow" data-z="0.5">
            <ol class="list-group timeline" id="update">
            </ol>
            <ul class="list-group">

              
			  <?php
              	$query2 = "SELECT * FROM `comment` AS cmt  
							LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
							where cmt.v_id = '$vid_id' 
							ORDER BY cmt.co_id desc";	
	
				$sql2 = mysqli_query($conn,$query2);
				while($result2= mysqli_fetch_array($sql2)){
					
					$full_name = $result2['full_name'];
					$comment = $result2['comment'];
					$profile_pic = $result2['profile_pic'];
					$date = $result2['date'];
			  ?>
              <li class="list-group-item media v-middle">
                <div class="media-left">
                  <div class="icon-block half img-circle bg-grey-300">
                  	<?php
                    if($profile_pic != ""){
					?>
                    <img src="images/profile/<?php echo $profile_pic;?>" alt="person" class="img-circle width-50" />
                    <?php					
					}
					?>
                    
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
              <?php
				}
			  ?>
              
              
              
                           
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
              <h4 class="panel-title"><?php echo $vid_level; ?></h4>
            </div>
            <div class="panel-body list-group">
              <ul class="list-group">
                <?php
                	$query = "SELECT * FROM `video` where v_level = '$vid_level' AND cat_id = '$cat_id' ";	
					$sql = mysqli_query($conn,$query);
					$i =1;
					while($result= mysqli_fetch_array($sql)){
					
						$v_id = $result["v_id"];
						$v_name_str = "v_name_".$language; 
						$v_name = $result[$v_name_str];
						$c_icon = $result["c_icon"];
						  
				?>
                <li class="list-group-item <?php if($v_id == $vid_id){echo "active";} ?>">
                  <a class="list-group-link" href="video.php?v_id=<?php echo $v_id;?>"><?php echo $i++."&nbsp;".$v_name; ?></a>
                </li>
                <?php
                	}
				?>
                
              </ul>
            </div>
          </div>
        </div>
		
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="footer">
    <strong>Aur Seekho </strong>(Beta) © Copyright 2016 
  </footer>
  <!-- // Footer -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>


  <script src="js/vendor/all.js"></script>
  <script src="js/app/app.js"></script>


<script>
            $(function () {
                var iframe = $('#player1')[0];
                var player = $f(iframe);
                var status = $('.status');

                // When the player is ready, add listeners for pause, finish, and playProgress
                player.addEvent('ready', function () {
                    status.text('ready');

                    player.addEvent('playProgress', onPlayProgress);
					
					
                });

				
                var done = false;
                var myTimer;
                var lasttime = 0;
                var count = 0;
                var setDatabase = 0;
                function onPlayProgress(data, id) {



                    myTimer = setInterval(function () {
                        var time;
                        var durTime;
                        time = data.seconds;
                        durTime = data.duration;
                        if (lasttime <= time) {
                            var dif;
                            dif = time - lasttime;
                            if (dif > 1) {
                                count += dif - 1;
                            }
                            lasttime = time;

                            var viewP;
                            viewP = (time - count) * 100 / durTime;
                            if (viewP >= 90 && setDatabase == 0) {
                                var v_id = <?php echo $_GET['v_id'];?>;
								var dataString = 'v_id=' + v_id;
						
								$.ajax({
                                    type: 'POST',
                                    url: 'video_view.php',
                                    data: dataString,
                                    async: false,
                                    error: function ()
                                    { console.log('there is some error'); }
                                });
                                setDatabase = 1;
                            }
                        }
                    }, 1000);
                    status.text(data.seconds + '/' + data.duration + 's played' + ' - ' + count);
                }
            });
</script>


<script type="text/javascript">
$(function() {

$(".submit").click(function() {

	var comment = $("#comment").val();
	var video_id = $("#video_id").val();
	var comment = $("#comment").val();
	var post_id = $("#post_id").val();
    var dataString = 'comment='+ comment + '&video_id=' + video_id;
	
	if(comment=='' )
     {
    alert('Please Enter Comment...');
     }
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "commentajax.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("ol#update").append(html);
  $("ol#update li:first").fadeIn("slow");
   document.getElementById('comment').value='';
	$("#name").focus();
 
  $("#flash").hide();
	
  }
 });
}
return false;
	});



});


</script>

</body>

</html>