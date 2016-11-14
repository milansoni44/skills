<?php
include("header.php");
if (!isset($_GET['c_id'])) {
    echo "<script>
			window.location.href='index.php';
			</script>";
}
?>
<style>
    /****** Rating Starts *****/

    .rating {
        border: none;
        float: left;
    }

    .rating > input {
        display: none;
    }

    .rating > label:before {
        margin: 5px;
        font-size: 20px;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before {
        content: "\f089";
        position: absolute;
    }

    .rating > label {
        color: #ddd;
        float: right;
    }

    .rating > input:checked ~ label,
    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: #ef6c00;
    }

    .rating > input:checked + label:hover,
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label,
    .rating > input:checked ~ label:hover ~ label {
        color: #ef6c00;
    }

    .rating1 {
        border: none;
        float: left;
    }

    .rating1 > input {
        display: none;
    }

    .rating1 > label:before {
        margin: 5px;
        font-size: 20px;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating1 > .half:before {
        content: "\f089";
        position: absolute;
    }

    .rating1 > label {
        color: #ddd;
        float: right;
    }

    .rating1 > input:checked ~ label,
    .rating1:not(:checked) > label:hover,
    .rating1:not(:checked) > label:hover ~ label {
        color: #ef6c00;
    }

    .rating1 > input:checked + label:hover,
    .rating1 > input:checked ~ label:hover,
    .rating1 > label:hover ~ input:checked ~ label,
    .rating1 > input:checked ~ label:hover ~ label {
        color: #ef6c00;
    }

    /* Downloaded from http://devzone.co.in/ */
</style>

<?php
$cat_id = $_GET["c_id"];
$avail_chk_lan_str = "v_url_" . $language;
$avail_check_query = "SELECT * FROM video where CHAR_LENGTH($avail_chk_lan_str) > 3 and cat_id = '$cat_id' ";
$avail_check_sql = mysqli_query($conn, $avail_check_query);
$avail_check_num = mysqli_num_rows($avail_check_sql);
$query1 = "SELECT * FROM `courses` where c_id = '$cat_id' ";
$sql1 = mysqli_query($conn, $query1);
$result1 = mysqli_fetch_array($sql1);
$cat_name_str = "c_name_" . $language;
$cat_name = $result1[$cat_name_str];
$cat_description_str = "c_description_" . $language;
$cat_description = $result1[$cat_description_str];
$cat_icon = $result1["c_icon"];
$p_id = $result1["p_id"];
$cat_url = $result1["cat_v_url"];
$query_cc = "SELECT * FROM `course_complete` where c_id = '$cat_id' AND u_id = '$uid'";
$sql_cc = mysqli_query($conn, $query_cc);
$result_cc = mysqli_fetch_array($sql_cc);
$complete = $result_cc["complete"];
if ($complete == "") {
    $complete = 0;
}
?>
<?php
if (isset($_REQUEST['v_id']) && $_REQUEST['v_id'] != '') {
    if (isset($_COOKIE['id']) && $_COOKIE['id'] != '') {
        $vid_id = $_REQUEST['v_id'];
        $query1 = "SELECT * FROM `video` where v_id = '$vid_id' ";
        $sql1 = mysqli_query($conn, $query1);
        $result1 = mysqli_fetch_array($sql1);
        $v_name_str = "v_name_" . $language;
        $v_name_str = trim($v_name_str);
        $v_name = $result1[$v_name_str];
        $v_url_str = "v_url_" . $language;
        $v_url_str = trim($v_url_str);
        $v_url = $result1[$v_url_str];
        $vid_level = $result1["v_level"];
    } else {
        $query = "SELECT * FROM `video` WHERE cat_id = '$cat_id' LIMIT 0,1";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_array($sql);
        $v_url_str = "v_url_" . $language;
        $v_url_str = trim($v_url_str);
        $v_url = $result[$v_url_str];
        $vid_id = $result['v_id'];
    }
    //$cat_id = $result1["cat_id"];
} else {
    $query = "SELECT * FROM `video` WHERE cat_id = '$cat_id' LIMIT 0,1";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_array($sql);
    $v_url_str = "v_url_" . $language;
    $v_url_str = trim($v_url_str);
    $v_url = $result[$v_url_str];
    $vid_id = $result['v_id'];
}
$sqlVideoWatch = "SELECT *,count(video_view.v_id) as count FROM video_view join video on video_view.v_id = video.v_id where video_view.u_id='" . $uid . "' and video.cat_id = '$cat_id'";
$sqlVV = mysqli_query($conn, $sqlVideoWatch);
$rsCount = mysqli_fetch_array($sqlVV);
$intCount = $rsCount['count'];
//check intro video
if (!isset($_GET['v_id'])) {
    $query_ivideo = "SELECT * FROM `intro_vid` where c_id = '$cat_id' ";
    $sql_ivideo = mysqli_query($conn, $query_ivideo);
    $result_ivideo = mysqli_fetch_array($sql_ivideo);
    $check_ivid_num = mysqli_num_rows($sql_ivideo);
    if ($check_ivid_num > 0) {
        $v_url = $result_ivideo['v_url'];
    }
}
?>


<!-- Fixed navbar -->


<div class="container">
    <div class="page-section" style="padding:5px 0px;">
        <div class="row">
            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id; ?>"/>
            <h1>
            	<span style="float:left; padding-left:10px;" class="">
                        <img src="images/icons/<?php echo $cat_icon; ?>" height="70" alt="<?php echo $cat_name; ?>"
                             title="<?php echo $cat_name; ?>" style="text-align:center;">
                        
                </span>
                <span class="col-md-6 pull-left">
                <?php echo $cat_name; ?>
                    <?php
                    $cat_id = $_GET['c_id'];
                    $rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$cat_id' ";
                    $sql_rt = mysqli_query($conn, $rt_get);
                    $rsrt = mysqli_fetch_array($sql_rt);
                    $rt = $rsrt['rt'];
                    $rate_get = "SELECT * FROM rating WHERE cat_id = '$cat_id' ";
                    $sql_rate = mysqli_query($conn, $rate_get);
                    $rate_num = mysqli_num_rows($sql_rate);
                    $total_rate = round($rt / $rate_num);
                    ?>
                    <p class="small" style="padding-top:10px; font-size:16px;">
                  <span class="fa fa-fw fa-star<?php if ($total_rate < 1) {
                      echo "-o";
                  } ?> text-orange-800"></span>
                  <span class="fa fa-fw fa-star<?php if ($total_rate < 2) {
                      echo "-o";
                  } ?> text-orange-800"></span>
                  <span class="fa fa-fw fa-star<?php if ($total_rate < 3) {
                      echo "-o";
                  } ?> text-orange-800"></span>
                  <span class="fa fa-fw fa-star<?php if ($total_rate < 4) {
                      echo "-o";
                  } ?> text-orange-800"></span>
                  <span class="fa fa-fw fa-star<?php if ($total_rate < 5) {
                      echo "-o";
                  } ?> text-orange-800"></span>
                </p>
            	</span>

                <span class="col-md-4 pull-right <?php if (!isset($_COOKIE['id']) && $_COOKIE['id'] == '') {
                    echo "hidden";
                } ?>" style="margin-top:10px;">
            <!--rating start-->


                    <?php
                    $cat_id = $_GET['c_id'];
                    $uid = $_COOKIE['id'];
                    $rate_get = "SELECT * FROM rating WHERE u_id = '$uid' AND cat_id = '$cat_id' ";
                    $sql_rate = mysqli_query($conn, $rate_get);
                    $rsCount_rate = mysqli_fetch_array($sql_rate);
                    $intCountRate = $rsCount_rate['rate'];
                    ?>
                    <fieldset id='demo1' class="rating" style="float:right;">
                        <input class="stars" type="radio" id="star5" name="rating"
                               value="5" <?php if ($intCountRate == 5) {
                            echo "checked";
                        } ?>/>
                        <label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating"
                               value="4" <?php if ($intCountRate == 4) {
                            echo "checked";
                        } ?>/>
                        <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating"
                               value="3" <?php if ($intCountRate == 3) {
                            echo "checked";
                        } ?>/>
                        <label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating"
                               value="2" <?php if ($intCountRate == 2) {
                            echo "checked";
                        } ?>/>
                        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating"
                               value="1" <?php if ($intCountRate == 1) {
                            echo "checked";
                        } ?>/>
                        <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                    </fieldset>
                    <span style="float:right; font-size:18px; padding-top:5px;">Your Rating:</span>
            
            </span>

            </h1>


        </div>
    </div>

    <?php
    if ($avail_check_num == 0) {
        ?>
        <div class="item col-xs-12 col-sm-12 col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
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
                        <?php echo $cor_not_lan_translate; ?>
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
    } else {
        ?>
        <div class="page-section" style="padding-bottom:20px; padding-top:0px;">
            <div class="row">

                <div class="col-md-8">
                    <!-- video div-->
                    <?php
                    if (!isset($_GET['v_id'])) {
                        $query = "SELECT * FROM `video` WHERE cat_id = '$cat_id' LIMIT 1";
                        $sql = mysqli_query($conn, $query);
                        $result = mysqli_fetch_array($sql);
                        $v_url_str = "v_url_" . $language;
                        $v_url_str = trim($v_url_str);
                        $v_url = $result[$v_url_str];
                        // $v_url = $result["v_url_lan2"];
                    }
                    if ($profile_chk_num >= 1 && isset($_COOKIE['id']) && isset($_GET['v_id'])) {
                        echo "<h1 align='center'>Please Complete Your Profile To play Video</h1>
			 
					<h1 align='center'><button class='btn btn-primary' onClick=\"location.href='profile.php'\">Go to Profile</button></h1>
					";
                    } else if ($profile_chk_num == 0 && isset($_COOKIE['id']) && isset($_GET['v_id'])) {
                        ?>
                        <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
                        <iframe id="player1"
                                src="https://player.vimeo.com/video/<?php echo $v_url; ?>?api=1&player_id=player1&autoplay=1"
                                width="100%" height="430" data-seek="false" frameborder="0" webkitallowfullscreen
                                mozallowfullscreen
                                allowfullscreen></iframe>
                    <?php
                    }
                    else if (!isset($_GET['v_id'])){
                    ?>
                        <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
                        <iframe id="player1"
                                src="https://player.vimeo.com/video/<?php echo $v_url; ?>?api=1&player_id=player1&autoplay=1"
                                width="100%" height="430" data-seek="false" frameborder="0" webkitallowfullscreen
                                mozallowfullscreen
                                allowfullscreen></iframe>
                        <?php /*?><iframe src="https://player.vimeo.com/video/<?php echo $v_url;?>?byline=0&portrait=0&badge=0" width="100%" height="400"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php */ ?>
                        <!-- // END video div-->
                        <?php
                    }
                    ?>

                </div>
                <div class="col-md-4">

                    <div class="panel panel-default paper-shadow" data-z="0.5">
                        <ul class="list-group"
                            style="max-height:400px;min-height: 430px;background-color: #FFFFFF; overflow-y: scroll;">
                            <li class="list-group-item" style="text-align:center;">
                                <h4> <?php echo $curriculum_translate; ?></h4>
                            </li>
                            <?php
                            $query = "SELECT * FROM `video` WHERE cat_id = '$cat_id' ORDER BY `v_order` LIMIT 0,500";
                            $sql = mysqli_query($conn, $query);
                            $i = 0;
                            $vid_num1 = mysqli_num_rows($sql);
                            if ($vid_num1 > 0) {
                                $vid_num1 = $vid_num1 - 1;
                            }
                            while ($result = mysqli_fetch_array($sql)) {
                                $v_id = $result["v_id"];
                                $v_name_str = "v_name_" . $language;
                                $v_name = $result[$v_name_str];
                                $c_icon = $result["c_icon"];
                                $v_duration = $result["v_duration"];
                                $v_duration = date("i:s", strtotime($v_duration));
                                if (in_array($v_id, $rsCount)) {
                                    $strClass = "text-orange-800";
                                } else {
                                    $strClass = "warning";
                                }
                                $uid = $_COOKIE['id'];
                                $query_check_cor = "SELECT * FROM `video_view` where v_id = '$v_id' AND u_id = $uid";
                                $sql_check_cor = mysqli_query($conn, $query_check_cor);
                                $check_cor = mysqli_num_rows($sql_check_cor);
                                if ($check_cor >= 1) {
                                    $strClass = "text-orange-800";
                                } else {
                                    $strClass = "warning";
                                }
                                if ($vid_id == $v_id) {
                                    $strClass = "text-green-800";
                                }
                                if ($i == 0) {
                                    ?>
                                    <li class="list-group-item  ">
                                        <a href="syllabus.php?c_id=<?php echo $cat_id; ?>"
                                           class="text-light <?php echo $strClass; ?>"><i
                                                class="fa fa-play-circle fa-fw"></i><?php echo "&nbsp;" . $v_name;
                                            $i++; ?></a><span
                                            style="float:right;"><?php echo($v_duration != '' ? '' . $v_duration . '' : ''); ?></span>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="list-group-item  ">
                                        <a href="#" rel="<?php echo $cat_id; ?>"
                                           data="syllabus.php?c_id=<?php echo $cat_id; ?>&v_id=<?php echo $v_id; ?>"
                                           onClick="checkLogin(this);" class="text-light <?php echo $strClass; ?>"><i
                                                class="fa fa-play-circle fa-fw"></i><?php echo $i++ . ".&nbsp;" . $v_name; ?>
                                        </a><span
                                            style="float:right;"><?php echo($v_duration != '' ? '' . $v_duration . '' : ''); ?></span>
                                    </li>
                                    <?php
                                }
                                ?>


                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="panel-default" data-z="0.5">
                <div class="row">
                    <div class="col-md-12" style="font-size: 14px; line-height: 22px;">
                        <p style="clear:both;"><?php echo $cat_description; ?></p>
                    </div>
                </div>
            </div>
            <?php
            /*$query1 = "SELECT sum(v_duration) as duration FROM `video` where cat_id = '$cat_id' ";

            $sql1 = mysqli_query($conn,$query1);
            $rsDuration = mysqli_fetch_array($sql1);
            $duration = $rsDuration['duration'];*/
            $query1 = "SELECT sec_to_time(sum(
				extract(hour from v_duration) * 3600
			  + extract(minute from v_duration) * 60
			  + extract(second from v_duration)
			  )) as duration FROM `video` where cat_id = '" . $cat_id . "' ";
            $sql1 = mysqli_query($conn, $query1);
            $rsDuration = mysqli_fetch_array($sql1);
            $str_time = $rsDuration['duration'];
            $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
            sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
            $duration = round(($hours * 3600 + $minutes * 60 + $seconds) / 60);
            ?>


        </div>
        <div class="panel panel-default paper-shadow" data-z="0.5" style="background-color:#FFFFFF;">
            <div class="row">
                <span class="col-md-4">
                    <div class="panel-body">
                  <p class="text-caption" style="font-size:16px;">
                    <i class="fa fa-clock-o fa-fw"
                       style="margin:10px 0px; width: 140px; text-align: left;"> <?php echo $total_duration_translate; ?></i><b>:&nbsp;<?php echo $duration; ?>
                          &nbsp;minutes</b>
                  
                    <br/>
                    <i class="fa fa-play fa-fw"
                       style="margin:10px 0px; width: 140px; text-align: left;"> <?php echo $total_vid_translate; ?></i><b>:&nbsp;<?php echo $vid_num1; ?></b>
                
                    
                   
                  </p>
                </div>
                </span>
                <span class="col-md-4">
                    <div class="panel-body">
                  <p class="text-caption" style="font-size:16px;">
                   
                    <i class="fa fa-mortar-board fa-fw"
                       style="margin:10px 0px; width: 180px; text-align: left;"> <?php echo $author_translate; ?></i><b>:&nbsp;Aur Seekho</b>
                     <br/>
                    <i class="fa fa-users fa-fw"
                       style="margin:10px 0px; width: 180px; text-align: left;"> <?php echo $avail_lan_translate; ?></i><b>:&nbsp;Hindi /Gujarati</b>
                   
                   
                  </p>
                </div>
                </span>
                <span class="col-md-4">
                    <div class="panel-body">
                  <p class="text-caption" style="font-size:16px;">
                    <?php if (isset($_COOKIE['id']) && $_COOKIE['id'] != '')
                    {
                    $cat_id = $_GET['c_id'];
                    $query_check_cor = "SELECT * FROM `video_view` AS vv 
                                            LEFT JOIN video AS vid ON vid.v_id = vv.v_id 
                                            where vid.cat_id = '$cat_id' AND  vv.u_id = $uid";
                    $sql_check_cor = mysqli_query($conn, $query_check_cor);
                    $check_cor = mysqli_num_rows($sql_check_cor);
                    if ($check_cor > 0) {
                        $check_cor = $check_cor - 1;
                    }
                    ?>

                      <i class="fa fa-area-chart  fa-fw"
                         style="margin:10px 0px;"></i> <?php echo $progress_translate; ?>
                      <b>:&nbsp;<?php echo $check_cor . '/' . $vid_num1; ?> Videos</b>
                        <div class="progress" style="background-color:#CED3D5;">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                 aria-valuenow="<?php echo round(($check_cor / $vid_num1) * 100); ?>" aria-valuemin="0"
                                 aria-valuemax="100"
                                 style="width: <?php echo round(($check_cor / $vid_num1) * 100); ?>%">
                                <span class="sr-only"
                                      style="position: relative; margin-bottom: 2px;"><?php echo round(($check_cor / $vid_num1) * 100); ?>
                                    % Complete (success)</span>
                            </div>
                          </div>
                        <?php
                        } else {
                            ?>    <a href="#" class="btn btn-deep-orange-500 btn-flat paper-shadow relative"
                                     data-toggle="modal" data-target="#login">Take Course</a>
                            <?php
                        }
                        ?>


                        </p>
                </div>
                </span>
            </div>
        </div>
        <?
    }
    ?>

    <div class="row">
        <div class="col-md-8 col-lg-8">

            <div class="panel panel-default paper-shadow" data-z="0.5">
                <!-- Tabbable Widget -->
                <div class="tabbable tabs-blocks tabs-center-h tabs-primary" style="background-color:#FFFFFF;">

                    <!-- Tabs -->
                    <span class="hidden">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#blocks-home-2" data-toggle="tab"><i
                          class="fa fa-comment"></i> <?php echo $comment_translate; ?></a></li>
                <!--<li><a href="#blocks-profile-2" data-toggle="tab"><i class="fa fa-list"></i>  Curriculum </a></li>-->
              
            </ul>
            </span>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">
                        <div id="blocks-home-2" class="tab-pane active">

                            <?php
                            if (isset($_COOKIE['id'])) {
                                ?>
                                <div class="page-section padding-top-none">
                                    <div class="panel panel-default paper-shadow" data-z="0.5">
                                        <div class="panel-heading">
                                            <h4 class="text-headline"
                                                style="font-size:22px;"><?php echo $comment_translate; ?></h4>
                                        </div>
                                        <div class="panel-body">
                                            <form>
                                                <div class="form-group form-control-material">
                                                    <input type="hidden" name="video_id" id="video_id"
                                                           value="<?php echo $vid_id; ?>">
                                                    <textarea id="comment" class="form-control used"
                                                              placeholder="Your comment .."></textarea>
                                                    <label for="reply"><?php echo $comment_translate; ?></label>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-primary submit" type="button">Post comment <i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (!isset($_COOKIE['id'])) {
                                ?>
                                <div class="panel-heading">
                                    <h4 class="text-headline"
                                        style="font-size:22px;"><?php echo $comment_translate; ?></h4>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="panel panel-default paper-shadow" data-z="0.5">
                                <ol class="list-group timeline" id="update">
                                </ol>
                                <ul class="list-group">


                                    <?php
                                    $query2 = "SELECT * FROM `comment` AS cmt  
                                    LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
                                    where cmt.v_id = '$vid_id' AND pco_id = '0' 
                                    ORDER BY cmt.co_id desc";
                                    $sql2 = mysqli_query($conn, $query2);
                                    $comm_num = mysqli_num_rows($sql2);
                                    if ($comm_num == 0) {
                                        ?>
                                        <li class="list-group-item media v-middle">
                                            Don't Have any Comment.
                                        </li>
                                        <?php
                                    }
                                    while ($result2 = mysqli_fetch_array($sql2)) {
                                        $co_id = $result2['co_id'];
                                        $full_name = $result2['full_name'];
                                        $comment = $result2['comment'];
                                        $profile_pic = $result2['profile_pic'];
                                        $date = $result2['date'];
                                        ?>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-left">
                                                <div class="icon-block half img-circle bg-grey-300">
                                                    <?php
                                                    if ($profile_pic != "") {
                                                        ?>
                                                        <img src="images/profile/<?php echo $profile_pic; ?>"
                                                             class="img-circle width-50 height-50"/>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="text-subhead margin-none">
                                                    <a href="#" class="link-text-color"><?php echo $comment; ?></a>
                                                </h4>
                                                <div class="text-light text-caption">
                                                    posted by
                                                    <a href="#">
                                                        <?php echo $full_name; ?></a> &nbsp; | <i
                                                        class="fa fa-clock-o fa-fw"></i> <?php echo $date; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        $query_sub_co = "SELECT * FROM `comment` AS cmt  
                                    LEFT JOIN user AS usr ON usr.u_id = cmt.u_id 
                                    where cmt.v_id = '$vid_id' AND pco_id = $co_id 
                                    ORDER BY cmt.co_id desc";
                                        $sql_sub_co = mysqli_query($conn, $query_sub_co);
                                        while ($result_sub_co = mysqli_fetch_array($sql_sub_co)) {
                                            $co_id_sub = $result_sub_co['co_id'];
                                            $full_name_sub = $result_sub_co['full_name'];
                                            $comment_sub = $result_sub_co['comment'];
                                            $profile_pic_sub = $result_sub_co['profile_pic'];
                                            $date_sub = $result_sub_co['date'];
                                            ?>
                                            <li class="list-group-item media v-middle" style="border-top:none;">
                                                <div class="media-left" style="padding-left:20px;">
                                                    <div class="icon-block half img-circle bg-grey-300">
                                                        <?php
                                                        if ($profile_pic_sub != "") {
                                                            ?>
                                                            <img src="images/profile/<?php echo $profile_pic_sub; ?>"
                                                                 class="img-circle width-50"/>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="text-subhead margin-none">
                                                        <a href="#"
                                                           class="link-text-color"><?php echo $comment_sub; ?></a>
                                                    </h4>
                                                    <div class="text-light text-caption">
                                                        posted by
                                                        <a href="#">
                                                            <?php echo $full_name_sub; ?></a> &nbsp; | <i
                                                            class="fa fa-clock-o fa-fw"></i> <?php echo $date_sub; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>


                                </ul>
                            </div>

                        </div>

                        <div id="blocks-profile-2" class="tab-pane">
                            <?php
                            $i = "1";
                            $query = "SELECT * FROM `video` where cat_id = '$cat_id' ORDER BY v_order";
                            $sql = mysqli_query($conn, $query);
                            while ($result = mysqli_fetch_array($sql)) {
                                $v_id = $result["v_id"];
                                $v_name_str = "v_name_" . $language;
                                $v_name = $result[$v_name_str];
                                $v_url_str = "v_url_" . $language;
                                $v_url = $result[$v_url_str];
                                $v_order = $result["v_order"];
                                ?>
                                <div class="list-group-item media" data-target="video.php?v_id=<?php echo $v_id; ?>">
                                    <div class="media-left">
                                        <div class="text-crt"><?php echo $i++; ?></div>
                                    </div>
                                    <div class="media-body">
                                        <?php echo $v_name; ?>
                                    </div>

                                    <?php
                                    $query_vv_check = "SELECT * FROM `video_view` WHERE v_id = '$v_id' AND u_id = '$uid'";
                                    $sql_vv_check = mysqli_query($conn, $query_vv_check);
                                    $sql_vv_check_num = mysqli_num_rows($sql_vv_check);
                                    ?>
                                    <div class="media-right">
                                        <i class="fa fa-clock-o">3:55</i>
                                    </div>

                                </div>
                                <?php
                            }
                            ?>

                        </div>


                    </div>
                    <!-- // END Panes -->

                </div>
            </div>


        </div>
        <div class="col-md-4 col-lg-4">
            <div class="panel panel-default paper-shadow" data-z="0.5">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="media v-middle">
                            <div class="media-body">
                                <h4 class="text-headline margin-none"> <?php echo $recomnded_translate; ?></h4>
                                <!--                        <p class="text-subhead text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, illo.</p>
                                -->                      </div>
                        </div>
                    </li>
                    <?php
                    $query = "SELECT * FROM `courses` where p_id = '2' LIMIT 6";
                    $sql = mysqli_query($conn, $query);
                    while ($result = mysqli_fetch_array($sql)) {
                        $c_id = $result["c_id"];
                        $c_name_str = "c_name_" . $language;
                        $c_name = $result[$c_name_str];
                        $c_icon = $result["c_icon"];
                        $query_num = "SELECT * FROM `video` where cat_id = '$c_id' ";
                        $sql_num = mysqli_query($conn, $query_num);
                        $vid_num = mysqli_num_rows($sql_num);
                        $cat_id = $c_id;
                        $rt_get = "SELECT SUM(rate) AS rt FROM rating WHERE cat_id = '$cat_id' ";
                        $sql_rt = mysqli_query($conn, $rt_get);
                        $rsrt = mysqli_fetch_array($sql_rt);
                        $rt = $rsrt['rt'];
                        $rate_get = "SELECT * FROM rating WHERE cat_id = '$cat_id' ";
                        $sql_rate = mysqli_query($conn, $rate_get);
                        $rate_num = mysqli_num_rows($sql_rate);
                        $total_rate = round($rt / $rate_num);
                        ?>
                        <li class="list-group-item media v-middle">
                            <div class="media-left">
                                <div class="icon-block img-responsive">
                                    <img src="images/icons/<?php echo $c_icon; ?>" width="100">
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="text-subhead margin-none">
                                    <a href="syllabus.php?c_id=<?php echo $c_id; ?>"
                                       class="link-text-color"><?php echo $c_name; ?></a>
                                </h4>
                                <p class="small margin-none">
                                    <span class="fa fa-fw fa-star<?php if ($total_rate < 1) {
                                        echo "-o";
                                    } ?> text-orange-800"></span>
                                    <span class="fa fa-fw fa-star<?php if ($total_rate < 2) {
                                        echo "-o";
                                    } ?> text-orange-800"></span>
                                    <span class="fa fa-fw fa-star<?php if ($total_rate < 3) {
                                        echo "-o";
                                    } ?> text-orange-800"></span>
                                    <span class="fa fa-fw fa-star<?php if ($total_rate < 4) {
                                        echo "-o";
                                    } ?> text-orange-800"></span>
                                    <span class="fa fa-fw fa-star<?php if ($total_rate < 5) {
                                        echo "-o";
                                    } ?> text-orange-800"></span>
                                </p>
                                <div class="text-light text-caption">

                                    <i class="fa"></i> <?php echo $vid_num; ?> videos
                                </div>
                            </div>

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

</div>

<?php include("footer.php"); ?>
<!-- Inline Script for colors and config objects; used by various external scripts; -->

<script type="text/javascript">
    $(function () {

        $(".submit").click(function () {

            var comment = $("#comment").val();
            var video_id = $("#video_id").val();
            var comment = $("#comment").val();
            var post_id = $("#post_id").val();
            var dataString = 'comment=' + comment + '&video_id=' + video_id;

            if (comment == '') {
                alert('Please Enter Comment...');
            }
            else {
                $("#flash").show();
                $("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
                $.ajax({
                    type: "POST",
                    url: "commentajax.php",
                    data: dataString,
                    cache: false,
                    success: function (html) {

                        $("ol#update").append(html);
                        $("ol#update li:first").fadeIn("slow");
                        document.getElementById('comment').value = '';
                        $("#name").focus();

                        $("#flash").hide();

                    }
                });
            }
            return false;
        });


    });


</script>
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

                    if (viewP >= 100 && setDatabase == 0) {
                        var v_id = <?php echo $vid_id;?>;
                        var dataString = 'v_id=' + v_id;
                        /*alert(dataString);*/

                        $.ajax({
                            type: 'POST',
                            url: 'video_view.php',
                            data: dataString,
                            async: false,
                            success: function (html) {
                                if (html != '') {
                                    window.location.href = html;
                                }
                                else {
                                    window.location.reload();
                                }

                            }
                        });
                        setDatabase = 1;
                    }
                }
            }, 1000);
            status.text(data.seconds + '/' + data.duration + 's played' + ' - ' + count);
        }
    });
</script>
<script>
    $(document).ready(function () {
        $("#demo1 .stars").click(function () {


            $.post('rating.php', {rate: $(this).val(), cat_id: $('#cat_id').val()}, function (d) {
                if (d > 0) {
                    alert('You already rated');
                } else {
                    alert('Thanks For Rating');
                }
            });
            $(this).attr("checked");
        });
    });
</script>