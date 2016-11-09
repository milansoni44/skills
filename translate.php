<?php
include("config.php");
session_start();

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

?>
