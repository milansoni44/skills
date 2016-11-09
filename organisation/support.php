<?php 
    include("header.php"); 
    include 'library.php'; 
    include "classes/class.phpmailer.php";
    if(isset($_POST['submit'])){
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM user WHERE u_id = '$id'";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_object($result);
        }
        $validity = $row->validity;
        $email = "ehs.milan@gmail.com";
        $message = "User: $email AND Your validity is $validity<br/>";
        $message .= $_POST['message'];
        $full_name = $row->full_name;
//        $email = $row->email;
        
        //mail format
        $mail	= new PHPMailer;
        $mail->IsSMTP(); 
        $mail->Host = SMTP_HOST;
        $mail->Port = SMTP_PORT; 
        $mail->SMTPAuth = true; 
        $mail->Username = SMTP_UNAME;
        $mail->Password = SMTP_PWORD;
        $mail->AddReplyTo("info@aurseekho.website", "Aur Seekho"); 
        $mail->SetFrom("info@aurseekho.website", "Aur Seekho"); 

        $mail->Subject = $_POST['subject'];
        //$mail->AddAddress("info@learning-delight.com", $name); //To address who will receive this email
        $mail->AddAddress($email, $full_name); //To address who will receive this email
        $mail->MsgHTML($message); 
        $send = $mail->Send(); 	
        if($send){
            $success = "Mail successfully sent. Please wait for reply.";
        }else{
            $success = "Failed to send email";
        }
    }
?>
<style type="text/css">
    .support-container{
        margin: 0 14%;
    }
</style>
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<div class="container">
    <div class="page-section" style="padding-bottom: 0px;">
        <div class="row">
            <div class="support-container">
                <div class="col-md-12">
                    <div class="panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Support</h3></div>
                    </div>
                    <div class="panel-body" style="background-color:#ffffff;">
                        <?php
                            if(isset($success)){
                                echo "<p>$success</p>";
                            }
                        ?>
                        Contact: Mrs. Parinita Gohil - 9662035233
                        <br/>
                        OR
                        <br/>
                        Fill any query please fill following form
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-lg-2 col-xs-4" for="subject">Subject</label>
                                <div class="col-md-6">
                                    <div class="form-control-material">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="subject" class="form-control used" id="subject" placeholder="Subject" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-lg-2 col-xs-4" for="editor1">Message</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" cols="50" rows="100" id="editor1" name="message"></textarea>
<!--                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="label2" class="form-control used" id="label2" placeholder="Your company name">-->
                                </div>
                            </div>
                            <div class="form-group margin-none">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" name="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Submit</button>
                                    <button type="button" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated  onClick="window.history.back()">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>
