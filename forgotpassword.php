<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
 <?php
include('include/head.php');
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
  <link rel="stylesheet" href="assets/css/login-form.css">
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
<?php
include('include/header.php');
?>
		<!-- end:header-top -->
	
		<header class="page-header">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-8">                  
		                    <h1 itemprop="name">FORGOT PASSWORD</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Forgot Password</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
    <p class="text-center mt-3">Please enter your e-mail address corresponding to your account. to reset your password.</p>
		<div class="global-container">
  <div class="card login-form">
  <div class="card-body">
    <div class="card-text">
      <form action="#" method="post" autocomplete="off">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="email" required="">
        </div>
        <button type="submit" name="forgot" class="btn btn-primary btn-block">Reset Password</button>
        
        <div class="sign-up">
          Have an account? <a href="login.php">Log In</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


<?php
include('include/footer.php');
?>		
	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
<?php
include('include/script.php');
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['forgot']))   // it checks whether the user clicked login button or not 
{ 
  $email = $_POST['email'];
  $sql = "SELECT * FROM tbl_users WHERE email = '$email' ";
  $result = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_array($result))
  {
        
    $forgot_full_name = $row['name'];
      $email_id = $row['email'];
      $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2+$email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;

mysqli_query($conn,
"INSERT INTO `password_reset_temp` (`email`, `password_verification_key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");
 
$mail = new PHPMailer; 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'projectcapstone49@gmail.com';   // SMTP username 
$mail->Password = 'capstone@49';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
 
$mail->setFrom('projectcapstone49@gmail.com', 'Capstone'); 
$mail->addReplyTo('projectcapstone49@gmail.com', 'Capstone'); 
$mail->addAddress($email_id); 
$mail->isHTML(true); 
$mail->Subject = 'Password Recovery By Capstone'; 
$bodyContent = ' 
    <html> 
    <head> 
        <title>Reset Your Password</title> 
    </head> 
    <body> 
       <table cellspacing="0" style="border: 2px solid #F48634; width: 100%;"> 
            <tr>
            <td colspan="2"><center><h5 style="color:#F78536;">Capstone</h5></center></td>
            </tr>
            <tr> 
                <th colspan="2"  style="background-color: #e0e0e0;">Dear '.$forgot_full_name.' Please click on the following link to reset your password.</th> 
            </tr> 
            <tr> 
                <td><a href="http://localhost/capstone/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://localhost/capstone/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></td> 
            </tr> 
            <tr> 
                <td>Please be sure to copy the entire link into your browser.
<span style="color:red;"><b>The link will expire after 1 day for security reason.<b><span></td> 
            </tr> 
            <tr> 
                <td colspan="2"><center>Regards Capstone Team</center></td> 
            </tr>
        </table>
    </body> 
    </html>';
$mail->Body    = $bodyContent;  
if(!$mail->send()) { 
   ?>
    <script type="text/javascript">
          swal("Sorry!","Mail could not be sent. Mailer Error: \n<?php echo $mail->ErrorInfo?>","error");
        </script>
    <?php
} 
else 
{ 
    ?>
        <script type="text/javascript">
          swal({title: "Success", text: "Please Check Your Registered Mail ID, We have sent Reset Password Link..", type: "success"},
             function(){ 
                 window.location = "login.php";
             }
          );
        </script> 
        <?php 
}     
}
  else
  {
    ?>
    <script type="text/javascript">
          swal("Sorry!","Please Enter Correct Email Id..","error");
        </script>
    <?php
  }
} 
?>
