<?php
session_start();
if(!empty($_SESSION)){
    header("Location: dashboard.php");
    die();
}
include("config.php");

    if(isset($_POST["submit"]))
	{
		$u_name = $_POST["u_name"];
		$password = $_POST["password"];
		
		        $query = "Select * from user where email = '$u_name' and password ='$password' and u_type = 'vendor'";
		        $sql = mysqli_query($conn,$query);
		        $numrow = mysqli_num_rows($sql);
                				
		        if($numrow != 0)
		        {
			        while($row=mysqli_fetch_array($sql))
			        {	
				        $u_name = $row['email'];
				        $dbpassword = $row['password'];
				        $id = $row['u_id'];
						$u_type = $row['u_type'];
						$ulimit = $row['user_limit'];
						$uvalidity = $row['validity'];
						$profile_pic = $row['profile_pic'];
				    }
			        if($u_name == $u_name && $password == $dbpassword)
				    {
				        session_destroy();
						session_start();
						$_SESSION['id'] = $id;
	                    $_SESSION['admin'] = "skills_vendor";
						$_SESSION['uname'] = $u_name;
			            $_SESSION['password'] = $password;
						$_SESSION['utype'] = $u_type;
						$_SESSION['ulimit'] = $ulimit;
						$_SESSION['uvalidity'] = $uvalidity;
						$_SESSION["profile_pic"]= $profile_pic;
//			            header("Location: user_list.php");
                                    header("Location: dashboard.php");
		            } 
		        }
		        else
		            {
			            echo  "<script> alert('Login Unsucessully'); </script>";
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
  <title>Aur Seekho| Login</title>


  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
</head>

<body class="login">

  <div id="content">
    <div class="container-fluid">

      <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <img src="../images/logo.png" class="width-180">
          <h1 class="text-deep-orange-400 text-center margin-bottom-none" style="font-size:18px;">Organisation Portal</h1>
          <form method="post" action="" >
          <div class="panel-body">
            <div class="form-group">
              <div class="form-control-material">
                <input class="form-control used" id="username" name="u_name" type="text" placeholder="Email ID" required>
                <label for="username">Email ID</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-control-material">
                <input class="form-control used" id="password" type="password" name="password" placeholder="Enter Password" required>
                <label for="password">Password</label>
              </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
            <a href="#" class="forgot-password">Forgot password?</a>
            <a href="sign-up.html" class="link-text-color">Create account</a>
          </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <strong>Aur Seekho (Beta) © Copyright 2016 </strong>
  </footer>
  <!-- // Footer -->
  <!-- Inline Script for colors and config objects; used by various external scripts; -->
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