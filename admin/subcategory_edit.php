<?php include("config.php"); ?><?php include("checklogin.php"); ?><?phpif (isset($_POST['submit'])) {    $c_id = $_POST['c_id'];    $c_name_lan1 = $_POST['c_name_lan1'];    $c_name_lan2 = $_POST['c_name_lan2'];    $c_name_lan3 = $_POST['c_name_lan3'];    $c_name_lan4 = $_POST['c_name_lan4'];    $c_name_lan5 = $_POST['c_name_lan5'];    $c_name_lan6 = $_POST['c_name_lan6'];    $c_description_lan1 = $_POST['c_description_lan1'];    $c_description_lan2 = $_POST['c_description_lan2'];    $c_description_lan3 = $_POST['c_description_lan3'];    $c_description_lan4 = $_POST['c_description_lan4'];    $c_description_lan5 = $_POST['c_description_lan5'];    $c_description_lan6 = $_POST['c_description_lan6'];    $c_icon = $_FILES['c_icon']['name'];    $status = $_POST['status'];    $p_id = $_POST['p_id'];    $query = "UPDATE `courses` SET ";    if ($c_name_lan1 != "") {        $query .= "`c_name_lan1`='$c_name_lan1', ";    }    if ($c_name_lan2 != "") {        $query .= "`c_name_lan2`='$c_name_lan2', ";    }    if ($c_name_lan3 != "") {        $query .= "`c_name_lan3`='$c_name_lan3', ";    }    if ($c_name_lan4 != "") {        $query .= "`c_name_lan4`='$c_name_lan4', ";    }    if ($c_name_lan5 != "") {        $query .= "`c_name_lan5`='$c_name_lan5', ";    }    if ($c_name_lan6 != "") {        $query .= "`c_name_lan6`='$c_name_lan6', ";    }    if ($c_description_lan1 != "") {        $query .= "`c_description_lan1`='$c_description_lan1', ";    }    if ($c_description_lan2 != "") {        $query .= "`c_description_lan2`='$c_description_lan2', ";    }    if ($c_description_lan3 != "") {        $query .= "`c_description_lan3`='$c_description_lan3', ";    }    if ($c_description_lan4 != "") {        $query .= "`c_description_lan4`='$c_description_lan4', ";    }    if ($c_description_lan5 != "") {        $query .= "`c_description_lan5`='$c_description_lan5', ";    }    if ($c_description_lan6 != "") {        $query .= "`c_description_lan6`='$c_description_lan6', ";    }    if ($c_icon != "") {        $path = "../images/icons/" . $c_icon;        move_uploaded_file($_FILES["c_icon"]["tmp_name"], $path);        $query .= "`c_icon`='$c_icon', ";    }    if ($p_id != "") {        $query .= "`p_id`='$p_id', ";    }    $query .= "`status`='$status' WHERE c_id ='$c_id'";    $sql = mysqli_query($conn, $query);    if ($sql == 1) {        echo "<script>                            alert('Successfully Updated');                            window.location.href='subcategory_list.php';                </script>";    } else {        echo "<script> alert('Sorry Please try again..!!'); </script>";        header("Location: subcategory_list.php");    }}?><!DOCTYPE html><html lang="en">    <head>        <meta charset="utf-8">        <meta http-equiv="X-UA-Compatible" content="IE=edge">        <meta name="viewport" content="width=device-width, initial-scale=1">        <title>Aur Seekho | Edit Course</title>        <!-- Global stylesheets -->        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">        <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">        <link href="assets/css/core.css" rel="stylesheet" type="text/css">        <link href="assets/css/components.css" rel="stylesheet" type="text/css">        <link href="assets/css/colors.css" rel="stylesheet" type="text/css">        <!-- /global stylesheets -->        <!-- Core JS files -->        <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>        <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>        <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>        <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>        <!-- /core JS files -->        <!-- Theme JS files -->        <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>        <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>        <script type="text/javascript" src="assets/js/core/app.js"></script>        <script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>        <!-- /theme JS files -->    </head>    <body>        <!-- Main navbar --><?php include("header.php"); ?>        <!-- /main navbar -->        <!-- Page container -->        <div class="page-container">            <!-- Page content -->            <div class="page-content">                <!-- Main sidebar --><?php include("menu.php"); ?>                <!-- /main sidebar -->                <!-- Main content -->                <div class="content-wrapper">                    <!-- Page header -->                    <div class="page-header">                        <div class="page-header-content">                            <div class="page-title">                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Course Edit</span></h4>                            </div>                        </div>                        <div class="breadcrumb-line">                            <ul class="breadcrumb">                                <li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>                                <li><a href="#">Course Manage</a></li>                                <li class="active">Course Edit</li>                            </ul>                        </div>                    </div>                    <!-- /page header -->                    <!-- Content area -->                    <div class="content">                        <!-- Vertical form options -->                        <div class="row">                            <div class="col-md-6 col-md-offset-3">                                <!-- Basic layout-->                                <form action="" method="post" enctype="multipart/form-data"><?php$c_id = $_GET['c_id'];$query = "SELECT * FROM `courses` where c_id = '$c_id'";$sql = mysqli_query($conn, $query);$result = mysqli_fetch_array($sql);$c_id = $result["c_id"];$c_icon = $result["c_icon"];$status = $result["status"];$p_id = $result["p_id"];?>                                    <input type="hidden"  name="c_id" value="<?php echo $c_id ?>">                                    <div class="panel panel-flat">                                        <div class="panel-heading">                                            <h5 class="panel-title">Edit Course</h5>                                        </div>                                        <div class="panel-body">                                            <div class="form-group">                                                <label>Category :</label>                                                <select name="p_id" class="form-control">                                                    <option value="">Select Category</option>                                    <?php                                    $lan_query2 = "SELECT * FROM `courses` WHERE p_id = '0'";                                    $lan_sql2 = mysqli_query($conn, $lan_query2);                                    while ($lan_result2 = mysqli_fetch_array($lan_sql2)) {                                        $cat_id = $lan_result2['c_id'];                                        $c_name_lan11 = $lan_result2['c_name_lan1'];                                        ?>                                                        <option value="<?php echo $cat_id; ?>" <?php if ($cat_id == $p_id) {                                            echo "selected";                                        } ?>><?php echo $c_name_lan11; ?></option>    <?php}?>                                                </select>                                            </div>                                                    <?php                                                    $lan_query1 = "SELECT * FROM `language` WHERE status = 'active'";                                                    $lan_sql1 = mysqli_query($conn, $lan_query1);                                                    while ($lan_result1 = mysqli_fetch_array($lan_sql1)) {                                                        $l_name = $lan_result1['l_name'];                                                        $l_slug = $lan_result1['l_slug'];                                                        $c_name_str = "c_name_" . $l_slug;                                                        $c_name = $result[$c_name_str];                                                        $c_description_str = "c_description_" . $l_slug;                                                        $c_description = $result[$c_description_str];                                                        ?>                                                <div class="form-group">                                                    <label>Course Name (<?php echo $l_name; ?>):</label>                                                    <input type="text" class="form-control" placeholder="Category Name (<?php echo $l_name; ?>)" value="<?php echo $c_name; ?>" name="<?php echo $c_name_str; ?>" required>                                                </div>                                                <div class="form-group">                                                    <label>Course Description (<?php echo $l_name; ?>):</label>                                                    <textarea class="form-control" placeholder="Sub Category Description (<?php echo $l_name; ?>)" name="<?php echo $c_description_str; ?>" required><?php echo $c_description; ?></textarea>                                                </div>                                                <?php                                            }                                            ?>                                            <div class="form-group">                                                <label>Course Icon:</label>                                                <input type="file" class="form-control" name="c_icon">                                            </div>                                            <div class="form-group">                                                <label>Status:</label>                                                <select class="form-control" name="status" required>                                                    <option value="">Select Status</option>                                                    <option value="Enabled" <?php if ($status = "Enabled") {                                                echo "selected";                                            } ?>>Enabled</option>                                                    <option value="Disabled" <?php if ($status = "Disabled") {                                                echo "selected";                                            } ?>>Disabled</option>                                                </select>                                            </div>                                            <div class="text-right">                                                <button type="submit" name="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>                                            </div>                                        </div>                                    </div>                                </form>                                <!-- /basic layout -->                            </div>                        </div>                        <!-- /vertical form options -->                        <!-- Footer --><?php include("footer.php"); ?>                        <!-- /footer -->                    </div>                    <!-- /content area -->                </div>                <!-- /main content -->            </div>            <!-- /page content -->        </div>        <!-- /page container -->    </body></html>