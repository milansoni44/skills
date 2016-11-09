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
  <link rel="shortcut icon" type="image/png" href="../images/fevicon.png"/>
  <title>Aur Seekho| Login</title>


  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
</head>

<body class="login">

  <div id="content">
    <div class="container-fluid">

      <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
            <img src="../images/logo.png" height="70">
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
            <a href="#" class="forgot-password forgot">Forgot password?</a>
<!--            <a href="sign-up.html" class="link-text-color">Create account</a>-->
          </div>
          </form>
        </div>
      </div>

    </div>
  </div>
    <!-- forgot password -->
<?php /*?>    <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="margin-top:50px; width:auto;">
            <div class="modal-content">
                <div class="lock-container">
                    <div class="panel panel-default text-center paper-shadow" data-z="0.5">
                        <img src="images/logo.png" class="width-120" style="margin-top:50px; height: 70px;">
                        <h1 class="text-display-1 text-center margin-bottom-none" style="font-size:18px;">Forgot Password</h1>
                        <form method="post" action="#">
                            <div class="panel-body">


                                <div class="form-group">	
                                    <div class="form-control-material text-center text-red-A700" style="display: none" id="error_forgot">
                                        Please enter a valid Details
                                    </div>				
                                    <div class="form-control-material">
                                        <input class="form-control used" name="email_forgot" type="email" id="email_forgot" placeholder="Email Id" required />
                                        <label for="username">Email ID</label>
                                     </div>
                                </div>            

                                <button  name="login-btn" class="btn btn-primary forgot_submit" type="button" onClick="forgot()">Send Mail<i class="fa fa-fw fa-unlock-alt"></i></button>
                                <img class="forgot_loading" src="images/loading.gif" height="50"  style="display:none;" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><?php */?>

  <!-- Footer -->
  <footer class="footer">
    <strong>Aur Seekho (Beta) © Copyright 2016 </strong>
  </footer>
  <!-- // Footer -->
  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  
       <!----modal starts here--->
  <div id="forgot" class="modal grow modal-backdrop-white fade" role='dialog'>
    <div class="modal-dialog modal-sm">
      <div class="v-cell">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Forgot Password</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="#">
                            <div class="panel-body">


                                <div class="form-group">	
                                    <div class="form-control-material text-center text-red-A700" style="display: none" id="error_forgot">
                                        Please enter a valid Details
                                    </div>				
                                    <div class="form-control-material">
                                        <input class="form-control used" name="email_forgot" type="email" id="email_forgot" placeholder="Email Id" required />
                                        <label for="username">Email ID</label>
                                     </div>
                                </div>            

                                <button  name="login-btn" class="btn btn-primary forgot_submit" type="button" onClick="forgot()">Send Mail<i class="fa fa-fw fa-unlock-alt"></i></button>
                                <img class="forgot_loading" src="images/loading.gif" height="50"  style="display:none;" />
                            </div>
                        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Modal ends here--->
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

  <script>
    $('.forgot-password').click(function() {
      $('#forgot').modal('show');
    });
    function forgot()
    {
        var email_forgot=$('#email_forgot').val();
        $.ajax({
            type: "POST",
            url: "customAjax.php",
            data: "act=forgot&email_forgot="+email_forgot,
            cache: false,
            success: function(html){				
                if(html=='done')
                {
                    $('#forgot').modal('hide');
                    alert('Please Check Your Email ID for Account Details.');			 
                }else{
                        $('#error_forgot').show();
                }				
            }
        });
    }
  </script>


</body>

</html>