<?php
session_start();
include('config.php');
if($_POST)
{
$actual_link = $_POST["actual_link"];
$lan = $_POST["lan"];

$_SESSION['language'] = $lan;
$language = $_SESSION["language"];

}


?>
<?php echo $actual_link; ?>