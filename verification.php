<?php 
include("config.php");


$action = "";
if (isset($_POST["passwordchange"])) {
	$action = $_POST["action"];
	$verify = $_POST["verify"];
	
	if ($action == "changepwd") {
		
		$newpwd = $_POST["newpwd"];	
	
	$select="select * from user where u_id = '$verify'";
	$n1=mysqli_query($conn, $select);
	$rowselect=mysqli_fetch_assoc($n1);

	$fetchid=$rowselect["u_id"];
	$num = mysqli_num_rows($n1);
	if($num==1) 
	{
		$query = "UPDATE `user` SET password ='$newpwd' WHERE u_id ='$verify'";
		$sql = mysqli_query($conn, $query) or die("Could run query: " . mysqli_error());

	?>
	 <script type="text/javascript">
        
       
		var answer = confirm('Password has been Created Please Login to Your Account.');
		if(answer){
			window.location.href="logout.php";
		}
        
        </script>
        
        
	<?php
	
	 }
	else
	{?>
		<script type="text/javascript">
        
        alert("Please Try Again.");
        
        </script>
<?php	}
	}
}

?>
<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Learning</title>

  <link href="css/vendor/all.css" rel="stylesheet">

  <link href="css/app/app.css" rel="stylesheet">
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
 

</head>
<body class="login">
<?php
if(isset($_GET['key']) && isset($_GET['verify'])){
$key = $_GET['key'];

	$query = "SELECT * FROM `user` WHERE `u_id`='".$_GET['verify']."'";
	$sql = mysqli_query($conn,$query);
	$sql_num = mysqli_num_rows($sql);
	$result = mysqli_fetch_array($sql);
	
	$full_name = $result['full_name'];
	$email = $result['email'];
	$mobile = $result['mobile'];
	$password = $result['password'];
	$u_id = $result['u_id'];
	
	$var_key_db = md5($email);
	
		if($var_key_db == $key){
		?>
          <div id="content">
            <div class="container-fluid">
        
              <div class="lock-container">
                <div class="panel panel-default text-center paper-shadow" data-z="0.5">                  
                  <img src="images/logo.png" class=" width-200">
                  <h4 class=" text-center margin-bottom-none">Create Password</h4>
                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form" onSubmit="return confirmPassword();" name="changepwd">
                  <input type="hidden" name="action" value="changepwd">
                  <input type="hidden" name="verify" value="<?php echo  $u_id;?>">
                  <div class="panel-body">
                    <div class="form-group">
                      <div class="form-control-material">
                        <input type="password" class="form-control used" placeholder="Choose Password" name="newpwd" required>
                        <label for="username">Choose Password</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-control-material">
                        <input type="password" class="form-control used" placeholder="Confirm Password" name="confpwd" required>
                        <label for="password">Confirm Password</label>
                      </div>
                    </div>
        
                    <button type="submit" name="passwordchange" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Create Password</button>
                  </div>
                  </form>
                </div>
              </div>
        
            </div>
          </div>
        
          <!-- Footer -->
          <footer class="footer">
            <strong>Aur Seekho</strong> &copy; Copyright 2016
          </footer>

        <?php		
		}else{
			echo  "<script> 
						alert('Sorry, Please Try Again.');
						window.location.href='logout.php'; 
				   </script>";
		}
	
	}else{
	
		echo  "<script> 
					alert('Sorry, You have wrong Verification Link Please Signup.');
					window.location.href='logout.php'; 
			   </script>";

}


?>

  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>

  <script src="js/vendor/all.js"></script>

  <script src="js/app/app.js"></script>


</body>

</html>