<?php
session_start();
include('config.php');
if($_POST)
{
$actual_link = $_POST["actual_link"];
$lan = $_POST["lan"];

$_COOKIE['language'] = $lan;
$language = $_COOKIE["language"];

}


?>
<?php echo $actual_link; ?>