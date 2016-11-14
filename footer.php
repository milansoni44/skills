 <section class="footer-section"  style="clear:both;">
    <div class="container" style="clear:both;">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <h4 class="text-headline text-light">
			<?php
			$query = "SELECT * FROM `website_translate` where wt_id = '15'";
			$sql = mysqli_query($conn, $query);
			$result = mysqli_fetch_array($sql);
			echo $feedback_head = $result[$language];
			?>
		  </h4>
          <ul class="list-unstyled">
            
			 <?php
	  
				$query = "SELECT * FROM `website_translate` WHERE `key_value` = 'corporate_list' ORDER BY seq";
				$sql = mysqli_query($conn, $query);
				while ($result = mysqli_fetch_array($sql))
				{
			
					$wt_id = $result["wt_id"];
					$corporate_list = $result[$language];
					$corporate_link = $result["extra1"];
				
			  ?>
			<li><a href="<?php echo $corporate_link;?>"><?php echo $corporate_list;?></a></li>
			  <?php
				}
			  ?>
          </ul>
        </div>
        <div class="col-sm-6 col-md-3">
          <h4 class="text-headline text-light">
			<?php
			$query = "SELECT * FROM `website_translate` where wt_id = '21'";
			$sql = mysqli_query($conn, $query);
			$result = mysqli_fetch_array($sql);
			echo $explore_head = $result[$language];
			?>
		  </h4>
          <ul class="list-unstyled">
            <?php
	  
				$query = "SELECT * FROM `website_translate` WHERE `key_value` = 'explore_list' ORDER BY seq";
				$sql = mysqli_query($conn, $query);
				while ($result = mysqli_fetch_array($sql))
				{
			
					$wt_id = $result["wt_id"];
					$explore_list = $result[$language];
					$explore_link = $result["extra1"];
				
			  ?>
			<li><a href="<?php echo $explore_link;?>"><?php echo $explore_list;?></a></li>
			  <?php
				}
			  ?>
          </ul>
        </div>
        <div class="col-xs-12 col-md-3">
          <h4 class="text-headline text-light"><?php echo $other_login_translate; ?></h4>
          <ul class="list-unstyled">
          	<li><a href="http://<?php echo $website_name;?>/organisation"><?php echo $organisation_portal_translate; ?></a></li>
          </ul>
     
          

        </div>
        <div class="col-xs-12 col-md-3">
          <h4 class="text-headline text-light"><?php echo $newsletter_translate; ?></h4>

          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Enter email here...">
              <span class="input-group-btn">
								<button class="btn btn-grey-800" type="button"><?php echo $subscribe_translate; ?></button>
							  </span>
            </div>
          </div>
          <br/>
          <p>
            <a href="#" class="btn btn-indigo-500 btn-circle"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-pink-500 btn-circle"><i class="fa fa-dribbble"></i></a>
            <a href="#" class="btn btn-blue-500 btn-circle"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-danger btn-circle"><i class="fa fa-google-plus"></i></a>
          </p>

          <ul class="list-unstyled">
          	<li>
            <a target="_blank" href="https://docs.google.com/forms/d/1lAlv-C5SZ-Y2VvyZcPIuSUfk444f1QXJxVf-K7snngw/viewform?ts=57dfe3dd&edit_requested=true"><?php echo $feedback_form_translate; ?></a>
            </li>
          </ul>

        </div>
        
      </div>
    </div>
    </div>
  </section>


  <!-- Footer -->
  <!--<footer class="footer">
    <strong>Aur Seekho </strong>(Beta) © Copyright 2016
  </footer>-->
  <!-- // Footer -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:50px; width:auto;">
    <div class="modal-content">
     
        <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <img src="images/logo.png"  style="margin-top:50px;" height="70">
          <h1 class="text-display-1 text-center margin-bottom-none">Sign In</h1>
          <form method="post" action="login.php" id="login_form_submit">
          <div class="panel-body">
            <div class="form-group">
				<div class="form-control-material text-center text-red-A700" style="display: none" id="error">
					Please enter a valid username or password
              </div>
              <div class="form-control-material">
				  <input class="form-control" id="check" name="check" type="hidden" placeholder="Username" value="">
				  <input class="form-control" id="url" name="url" type="hidden" placeholder="url" value="">
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

			  <button type="button" name="login-btn" class="btn btn-primary" onclick="login()">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
            <a href="#" class="forgot-password forgot">Forgot password?</a>
            <a class="link-text-color signup" style="cursor:pointer;" >Create account</a>
          </div>
          </form>
          <div class="panel-footer">
          <span style="font-size: 14px;"> For Organisation Portal Login <a href="./organisation">Click Here</a></span>
          </div>
        </div>
      </div>
     
     
    </div>
  </div>
</div>

<!--sign up form-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:50px; width:auto;">
    <div class="modal-content">
        <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <img src="images/logo.png"  height="70" style="margin-top:50px;">
          <h1 class="text-display-1 text-center margin-bottom-none">Sign Up</h1>
          <form method="post" action="index.php" >
          <div class="panel-body">
            <div class="form-group">
              <div class="form-control-material text-center text-red-A700" style="display: none" id="error_signup">
					Please enter a valid Details
              </div>				
              <div class="form-control-material">
                <input class="form-control used" name="full_name" id="full_name" type="text" placeholder="Full Name" required>
                <label for="username">Full Name</label>
              </div>
            </div>
             <div class="form-group">				
              <div class="form-control-material">
                <input class="form-control used" name="mobile" id="mobile" type="text" placeholder="Mobile no.">
                <label for="username">Mobile</label>
              </div>
            </div>
             <div class="form-group">				
              <div class="form-control-material">
                <input class="form-control used" name="email" type="email" id="email" placeholder="Email Id" required>
                <label for="username">Email ID</label>
              </div>
            </div>            
            <div class="form-group">				
              <div class="form-control-material">
                <input class="form-control used" name="u_password" type="password" id="u_password" placeholder="Password" required>
                <label for="username">Password</label>
              </div>
            </div>
			  <button  name="login-btn" class="btn btn-primary signup_submit" type="button" onclick="signup()">Sign Up <i class="fa fa-fw fa-unlock-alt"></i></button>
              <img class="signup_loading" src="images/loading.gif" height="50"  style="display:none;" />
              Already Have Account ?<a class="link-text-color signin_popup" style="cursor:pointer; color:#0099FF;" >Sign In </a>
           
          </div>
          </form>
        </div>
      </div>
     
     
    </div>
  </div>
</div>

<!--forgot form-->
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:50px; width:auto;">
    <div class="modal-content">
        <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <img src="images/logo.png" class="width-120" style="margin-top:50px;">
          <h1 class="text-display-1 text-center margin-bottom-none" style="font-size:18px;">Forgot Password</h1>
          <form method="post" action="index.php" >
          <div class="panel-body">
            
             
             <div class="form-group">	
             <div class="form-control-material text-center text-red-A700" style="display: none" id="error_forgot">
					Please enter a valid Details
              </div>				
              <div class="form-control-material">
                <input class="form-control used" name="email_forgot" type="email" id="email_forgot" placeholder="Email Id" required>
                <label for="username">Email ID</label>
              </div>
            </div>            
            
			  <button  name="login-btn" class="btn btn-primary forgot_submit" type="button" onclick="forgot()">Got Mail<i class="fa fa-fw fa-unlock-alt"></i></button>
              <img class="forgot_loading" src="images/loading.gif" height="50"  style="display:none;" />
           
          </div>
          </form>
        </div>
      </div>
     
     
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"  id="course">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
		  <div class="modal-body">
     Do you want to Enroll this course?
		  </div>
	 <div class="modal-footer">
     	<input type="hidden" name="vidurl" id="vidurl" value=""  />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-deep-orange-500 btn-flat paper-shadow relative" id="takeCourse" onclick="takeCourse()">Enroll Course</button>
      </div>
    </div>
	  
  </div>
</div>
 

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

  
  <!-- App Scripts Bundle
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. -->
  <script src="js/app/app.js"></script>
  
  <script>
  
  		 $('.signup').click(function() {
           $('#login').modal('hide');
		   $('#forgot').modal('hide');
		   $('#signup').modal('show');
        });
		
		$('.signin_popup').click(function() {
           $('#login').modal('show');
		   $('#signup').modal('hide');
        });
		
		$('.signup_submit').click(function() {
           $('.signup_submit').hide();
		   $('.signup_loading').show();
        });
		
		$('.forgot').click(function() {
           $('#login').modal('hide');
		   $('#forgot').modal('show');
        });
		
		$('.forgot_submit').click(function() {
           $('.forgot_submit').hide();
		   $('.forgot_loading').show();
        });
		
		$("#login_form_submit").keypress(function(e){
            if(e.which == 13){
                e.preventDefault();
                var user_name=$('#username').val();
                var password = $('#password').val();
                var chck =$('#check').val()
                var url =$('#url').val();
                $.ajax({
                    type: "POST",
                    url: "customAjax.php",
                    data: "act=login&u_name="+user_name+"&password="+password,
                    cache: false,
                    success: function(html){
                        if(html=='done')
                        {
                            if(chck=='check')
                            {
                                $('#login').modal('hide');
                                checkCourse(url);
                            }
                            else
                            {
                                /*location.reload();*/
                                window.location.href='dashboard.php';
                            }
                        }else{
                            $('#error').show();
                        }
                    }
                });
            }
        });
		
		
		 
		
		 
 </script> 
        
        
  <script>
	  function takeCourse()
	  {
		  var url =$('#vidurl').val();
		  var cat_id = $('#cat_id').val();
		    $.ajax({
			type: "POST",
			url: "customAjax.php",
		    data: "act=takecourse&cat_id="+cat_id,
		    cache: false,
			success: function(html){
				alert("Thanks for Enrolling the course.")
				 window.location = url;
			}
	 		});
	  }
	  
 function checkLogin(obj)
 {
	 var url = $(obj).attr('data');
	 var intCatId = $(obj).attr('rel');
	
	 $.ajax({
			type: "POST",
			url: "customAjax.php",
		    data: "act=checklogin&url="+url,
		    cache: false,
			success: function(html){
				
				if(html=='login')
				{
					checkCourse(url);					
				
				}else{
					$('#check').val('check');
					$('#url').val(url);
					
					$('#login').modal('show');
				}
				

			}
	 });
 }
 function checkCourse(url)
 {
	
	 
	 intCatId = $('#cat_id').val();
	
	 $.ajax({
			type: "POST",
			url: "customAjax.php",
		    data: "act=checkCourse&cat_id="+intCatId,
		    cache: false,
			
			success: function(html){
			
				if(html=='exit')
				{
					 window.location = url;
				}else{
					
					$('#course').modal('show');
					$('#vidurl').val(url);
				}
				

			}
	 });
 } 
 
 function login()
 {
	 var user_name=$('#username').val();
	 var password = $('#password').val();
	 var chck =$('#check').val()
	var url =$('#url').val();
	 $.ajax({
			type: "POST",
			url: "customAjax.php",
		    data: "act=login&u_name="+user_name+"&password="+password,
		    cache: false,
			success: function(html){
				
				if(html=='done')
				{
					if(chck=='check')
					{
						$('#login').modal('hide');
						checkCourse(url);
					}
					else
					{
						/*location.reload();*/
						window.location.href='dashboard.php';
					}
					
					
					 
				}else{
					$('#error').show();
				}				

			}
	 });
 }
 
 function signup()
 {
	
	 var full_name=$('#full_name').val();
	 var email=$('#email').val();
	 var mobile=$('#mobile').val();
	 var u_password = $('#u_password').val();
	
	 $.ajax({
			type: "POST",
			url: "customAjax.php",
		    data: "act=signup&full_name="+full_name+"&email="+email+"&mobile="+mobile+"&u_password="+u_password,
		    cache: false,
			success: function(html){				
				if(html=='done')
				{
					$('#signup').modal('hide');
					alert('Please Check Your Email ID for Activation Link.');
					 
				}
				else if (html=='notdone'){
				alert('This Email id is already registered with us.');				
				}
				else{
					$('#error_signup').show();
					$('.signup_submit').show();
  				    $('.signup_loading').hide();
				}				

			}
	 });
 } 
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
					alert(html);
					$('#forgot').modal('hide');
					alert('Please Check Your Email ID for Password Reset Link.');
					 
				}else{
					$('#error_forgot').show();
					$('.forgot_submit').show();
				    $('.forgot_loading').hide();
				}				

			}
	 });
 } 

</script>


   <style type="text/css">
        #back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 60px;
    right: 20px;
    display:none;
	clear:both;
}

    </style>
 <?php
 if(isset($_COOKIE['id']) && $pagename != "profile.php"){
 ?>
<a id="back-to-top" target="_blank" href="https://docs.google.com/forms/d/1lAlv-C5SZ-Y2VvyZcPIuSUfk444f1QXJxVf-K7snngw/viewform?ts=57dfe3dd&edit_requested=true" class="btn btn-primary btn-lg" role="button" title="<?php echo $want_feedback_translate;?>">Feedback</a>
<?php
}
?>
<script type="text/javascript">
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 0) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
 
        
        $('#back-to-top').tooltip('show');

});
</script>
</body>

</html>