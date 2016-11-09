<?php include("config.php"); ?>
<?php include("checklogin.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aur Seekho | User List</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

        <script type="text/javascript" src="assets/js/core/app.js"></script>
        <script type="text/javascript" src="assets/js/pages/datatables_sorting.js"></script>
        <!-- /theme JS files -->

    </head>

    <body>

        <!-- Main navbar -->
        <?php include("header.php"); ?>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <?php include("menu.php"); ?>
                <!-- /main sidebar -->


                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User List</span></h4>
                            </div>

                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                    <a href="user_add.php" class="btn btn-link btn-float has-text"><i class="icon-user-plus text-primary"></i><span>Add User</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="datatable_advanced.html">User Manage</a></li>
                                <li class="active">User List</li>
                            </ul>


                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

                        <!-- Page length options -->
                        <div class="panel panel-flat" style="overflow-x: scroll;">	



                            <table class="table datatable-complex-header">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Mobile</th>                                    
                                        <th>Language</th>
                                        <th>User Type</th>
                                        <th>License Allocation</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = "1";
                                    $query = "SELECT usr.*,lan.l_name FROM `user` AS usr 
											LEFT JOIN language AS lan ON lan.l_slug = usr.language 
											ORDER BY usr.u_id desc
											";

                                    $sql = mysqli_query($conn, $query);
                                    while ($result = mysqli_fetch_array($sql)) {

                                        $u_id = $result["u_id"];
                                        $full_name = $result["full_name"];
                                        $email = $result["email"];
                                        $mobile = $result["mobile"];
                                        $u_name = $result["u_name"];
                                        $password = $result["password"];
                                        $profile_pic = $result["profile_pic"];
                                        $language = $result["language"];
                                        $l_name = $result["l_name"];
                                        $u_type = $result["u_type"];
                                        $user_limit = $result["user_limit"];
                                        $validity = $result["validity"];
                                        $status = $result["status"];
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $password; ?></td>
                                            <td><?php echo $mobile; ?></td>
                                            <td><?php echo $l_name; ?></td>
                                            <td><?php echo $u_type; ?></td>
                                            <td><?php echo $user_limit; ?></td>
                                            <td><?php echo $validity; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td><i class="icon-pencil7" onClick="window.location.href = 'user_edit.php?u_id=<?php echo $u_id; ?>'" style="cursor:pointer;"></i> &nbsp;
                                                <i class="icon-eye" onClick="window.location.href = 'user_course_record.php?u_id=<?php echo $u_id; ?>'" style="cursor:pointer;"></i>

                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody> 
                            </table>
                        </div>
                        <!-- /page length options -->





                        <!-- Footer -->
                        <?php include("footer.php"); ?>                    
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
