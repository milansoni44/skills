<?php 
    include("header.php"); 
?>
<style type="text/css">
    .support-container{
        margin: 0 14%;
    }
</style>
<div class="container">
    <div class="page-section" style="padding-bottom: 0px;">
        <div class="row">
            <div class="support-container">
                <div class="col-md-12">
                    <div class="panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Billing</h3></div>
                    </div>
                    <div class="panel-body" style="background-color:#ffffff;">
                        <!-- user -->
                        <li class="dropdown">Valid Up to : <?php echo  date("d-m-Y", strtotime($uvalidity));?></li>
                        <li class="dropdown">License Used : <?php echo $used."/".$ulimit;?></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
