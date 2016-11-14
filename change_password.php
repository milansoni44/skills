<?php include("header.php");
$uid = $_COOKIE['id'];
$action = "";
if (isset($_POST["passwordchange"])) {
	$action = $_POST["action"];
	
	if ($action == "changepwd") {
		
		$newpwd = $_POST["newpwd"];
	 	$oldpass=$_POST["oldPassword"];
	
	
	$select="select * from user where u_id = '$uid' and password ='$oldpass'";
	$n1=mysqli_query($conn, $select);
	$rowselect=mysqli_fetch_assoc($n1);

	$fetchid=$rowselect["id"];
	$num = mysqli_num_rows($n1);
	if($num==1) 
	{
		$query = "UPDATE user SET password ='$newpwd' WHERE u_id ='$uid'";
		mysqli_query($conn, $query) or die("Could run query: " . mysqli_error());

	?>
	 <script type="text/javascript">
        
       
		var answer = confirm('Password has been changed...');
		if(answer){
			window.location.href="profile.php";
		}
        
        </script>
        
        
	<?php
	
	 }
	else
	{?>
		<script type="text/javascript">
        
        alert("Old Password Don't Match...");
        
        </script>
<?php	}
	}
}

?>

 
<script language="JavaScript" type="text/javascript">
	function confirmPassword() {
		var theForm = document.forms["changepwd"];
		if (theForm.newpwd.value != theForm.confpwd.value) {
			alert("New Password And Confirm Password don't match.");
			return false;
		}
		return true;
	}
	
</script>
<link rel="stylesheet" href="css/datepicker3.css">
  <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-9">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">


            <!-- Panes -->
            
            <div class="tab-content">
             <h3 align="center">Change Password</h3>

              <div id="account" class="tab-pane active">             
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form" onSubmit="return confirmPassword();" name="changepwd">
                  <input type="hidden" name="action" value="changepwd">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Old Password</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="password" class="form-control used" placeholder="Old Password" name="oldPassword">
                          <label for="website">Old Password</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">New Password</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="password" class="form-control used" placeholder="New Password" name="newpwd" required>
                          <label for="website">New Password</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Confirm Password</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-link"></i></span>
                          <input type="password" class="form-control used" placeholder="Confirm Password" name="confpwd" required>
                          <label for="website">Confirm Password</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" name="passwordchange" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Change Password</button>
                      <button type="button" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated  onClick="window.history.back()">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <!-- // END Panes -->

          </div>
          <!-- // END Tabbable Widget -->

          <br/>
          <br/>

        </div>
        <div class="col-md-3">
          <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
              <h4 class="panel-title">My Account</h4>
            </div>
            <div class="panel-body list-group">
              <ul class="list-group list-group-menu">
                <li class="list-group-item"><a class="link-text-color" href="dashboard.php">Dashboard</a></li>
                <li class="list-group-item"><a class="link-text-color" href="profile.php">Profile</a></li>                
                <li class="list-group-item active"><a class="link-text-color" href="change_password.php">Change Password</a></li>
                <li class="list-group-item"><a class="link-text-color" href="logout.php"><span>Logout</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<?php include("footer.php");?>

<!-- bootstrap datepicker -->
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
	  autoclose: true
    });
</script>   
