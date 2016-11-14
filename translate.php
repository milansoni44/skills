<?php
include("config.php");
//session_start();

//recent activity
$query = "SELECT * FROM website_translate WHERE key_value = 'recent'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$recent_translate = $result[$language];

//category
$query = "SELECT * FROM website_translate WHERE key_value = 'category'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$category_translate = $result[$language];

//choose language
$query = "SELECT * FROM website_translate WHERE key_value = 'choose_lan'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$choose_lan_translate = $result[$language];

//certificate
$query = "SELECT * FROM website_translate WHERE key_value = 'certificate'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$certificate_translate = $result[$language];

//dashboard
$query = "SELECT * FROM website_translate WHERE key_value = 'dashboard'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$dashboard_translate = $result[$language];

//mycourse
$query = "SELECT * FROM website_translate WHERE key_value = 'mycourse'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$mycourse_translate = $result[$language];

//profile
$query = "SELECT * FROM website_translate WHERE key_value = 'proile'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$proile_translate = $result[$language];

//logout
$query = "SELECT * FROM website_translate WHERE key_value = 'logout'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$logout_translate = $result[$language];

//compny office
$query = "SELECT * FROM website_translate WHERE key_value = 'company_office'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$company_office_translate = $result[$language];

//total duration
$query = "SELECT * FROM website_translate WHERE key_value = 'total_duration'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$total_duration_translate = $result[$language];

//total video
$query = "SELECT * FROM website_translate WHERE key_value = 'total_vid'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$total_vid_translate = $result[$language];

//course auther
$query = "SELECT * FROM website_translate WHERE key_value = 'author'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$author_translate = $result[$language];

//availabale language
$query = "SELECT * FROM website_translate WHERE key_value = 'avail_lan'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$avail_lan_translate = $result[$language];

//progress
$query = "SELECT * FROM website_translate WHERE key_value = 'progress'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$progress_translate = $result[$language];

//recommended
$query = "SELECT * FROM website_translate WHERE key_value = 'recomnded'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$recomnded_translate = $result[$language];

//comment
$query = "SELECT * FROM website_translate WHERE key_value = 'comment'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$comment_translate = $result[$language];

//curriculam
$query = "SELECT * FROM website_translate WHERE key_value = 'curriculum'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$curriculum_translate = $result[$language];

//change_password
$query = "SELECT * FROM website_translate WHERE key_value = 'change_password'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$change_password_translate = $result[$language];

//see_all
$query = "SELECT * FROM website_translate WHERE key_value = 'see_all'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$see_all_translate = $result[$language];

//want_feedback
$query = "SELECT * FROM website_translate WHERE key_value = 'want_feedback'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$want_feedback_translate = $result[$language];

//new_course_translate
$query = "SELECT * FROM website_translate WHERE key_value = 'new_course_translate'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$new_course_translate_translate = $result[$language];

//completed_course
$query = "SELECT * FROM website_translate WHERE key_value = 'completed_course'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$completed_course_translate = $result[$language];

//completed_course_notiication
$query = "SELECT * FROM website_translate WHERE key_value = 'completed_course_notiication'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$completed_course_notiication_translate = $result[$language];

//search course
$query = "SELECT * FROM website_translate WHERE key_value = 'search_cor'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$search_cor_translate = $result[$language];

//login translate
$query = "SELECT * FROM website_translate WHERE key_value = 'login'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$login_translate = $result[$language];

//search_result translate
$query = "SELECT * FROM website_translate WHERE key_value = 'search_result'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$search_result_translate = $result[$language];

//no_course translate
$query = "SELECT * FROM website_translate WHERE key_value = 'no_course'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$no_course_translate = $result[$language];

//organisation_portal translate
$query = "SELECT * FROM website_translate WHERE key_value = 'organisation_portal'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$organisation_portal_translate = $result[$language];

//feedback_form translate
$query = "SELECT * FROM website_translate WHERE key_value = 'feedback_form'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$feedback_form_translate = $result[$language];

//dont_take_cor translate
$query = "SELECT * FROM website_translate WHERE key_value = 'dont_take_cor'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$dont_take_cor_translate = $result[$language];

//newsletter translate
$query = "SELECT * FROM website_translate WHERE key_value = 'newsletter'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$newsletter_translate = $result[$language];


//go_to_cat translate
$query = "SELECT * FROM website_translate WHERE key_value = 'go_to_cat'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$go_to_cat_translate = $result[$language];

//subscribe translate
$query = "SELECT * FROM website_translate WHERE key_value = 'subscribe'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$subscribe_translate = $result[$language];

//cor_not_lan translate
$query = "SELECT * FROM website_translate WHERE key_value = 'cor_not_lan'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$cor_not_lan_translate = $result[$language];

//other_login translate
$query = "SELECT * FROM website_translate WHERE key_value = 'other_login'";
$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_array($sql);
$other_login_translate = $result[$language];
?>
