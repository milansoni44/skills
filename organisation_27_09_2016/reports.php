<?php include("header.php"); ?>
<br/>
<div class="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"">
                        <h3 class="panel-title">Courses vs Complete Percentage</h3>
                        <span class="pull-right" style="margin-top: -26px">
                            <select name="user" id="user_list" class="form-control" style="width: 100%;">
                                <option value="0">--Select User--</option>
                                <?php
                                $user_query = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
                                $result_user = mysqli_query($conn, $user_query);
                                if (mysqli_num_rows($result_user) > 0) {
                                    while ($row_user = mysqli_fetch_object($result_user)) {
                                        ?>
                                        <option value="<?php echo $row_user->u_id; ?>"><?php echo ucfirst($row_user->full_name); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </span>
                    </div>
                    <div class="panel-body">
<!--                        <div class="form-group">
                            <label for="user" class="control-label col-sm-1">User</label>
                            <div class="col-sm-6">
                                <select name="user" id="user_list" class="form-control" style="width: 50%;">
                                    <option value="0">--Select User--</option>
                                    <?php
//                                    $user_query = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
//                                    $result_user = mysqli_query($conn, $user_query);
//                                    if (mysqli_num_rows($result_user) > 0) {
//                                        while ($row_user = mysqli_fetch_object($result_user)) {
                                            ?>
                                            <option value="<?php // echo $row_user->u_id; ?>"><?php // echo ucfirst($row_user->full_name); ?></option>
                                            <?php
//                                        }
//                                    }
                                    ?>
                                </select>
                            </div>
                        </div>-->
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Day vs Person Video duration played</h3>
                        <div class="panel-body">
                            <table border="0" width="50%" cellpadding="4px" cellspacing="2px">
                                <tr>
                                    <td>User</td>
                                    <td>
                                        <select name="user" id="user_list_video_duration" class="form-control" style="width: 50%;">
                                            <option value="0">--Select User--</option>
                                            <?php
                                            $user_query = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
                                            $result_user = mysqli_query($conn, $user_query);
                                            if (mysqli_num_rows($result_user) > 0) {
                                                while ($row_user = mysqli_fetch_object($result_user)) {
                                                    ?>
                                                    <option value="<?php echo $row_user->u_id; ?>"><?php echo ucfirst($row_user->full_name); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td><br/></td></tr>
                                <tr>
                                    <td>Date</td>
                                    <td>
                                        <input type="text" name="month_select" class="form-control" style="width: 50%"/>
                                    </td>
                                </tr>
                            </table>
<!--                            <div class="form-group">
                                <label for="user" class="control-label col-sm-1">User</label>
                                <div class="col-sm-6">
                                    <select name="user" id="user_list_video_duration" class="form-control" style="width: 50%;">
                                        <option value="0">--Select User--</option>
                                        <?php
                                        $user_query = "SELECT * FROM `user` WHERE `add_by`='$uid' AND status = 'active'";
                                        $result_user = mysqli_query($conn, $user_query);
                                        if (mysqli_num_rows($result_user) > 0) {
                                            while ($row_user = mysqli_fetch_object($result_user)) {
                                                ?>
                                                <option value="<?php echo $row_user->u_id; ?>"><?php echo ucfirst($row_user->full_name); ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>-->
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto; display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>