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
  <link href="admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
		                    <h1 itemprop="name">REGISTER</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Register</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
    <p class="text-center mt-3">Please fill in this form to create an account!</p>
		<div class="global-container">
  <div class="card login-form">
  <div class="card-body">
    <div class="card-text">
      <form action="#" method="post" autocomplete="off">
        <div class="form-group">
          <label for="name">Full Name<span class="text-danger ml-2">*</span></label>
          <input type="text" name="name" class="form-control" id="name" required="">
        </div>
        <div class="form-group">
          <label for="mobilenumber">Mobile Number<span class="text-danger ml-2">*</span></label>
          <input type="text" name="mobilenumber" pattern="[0-9]{10}" required="" class="form-control" id="mobilenumber">
        </div>
        <div class="form-group">
          <label for="email">Email address<span class="text-danger ml-2">*</span></label>
          <input type="email" name="email" required="" class="form-control" id="email" onkeyup="checkemail();">
          <small class="form-text text-muted" id="email_status"></small>
        </div>
        <div class="form-group">
          <label for="password">Password<span class="text-danger ml-2">*</span></label>
          <input type="text" name="password" class="form-control" id="password" required="">
        </div>
        <div class="form-group">
          <label for="password">Confirm Password<span class="text-danger ml-2">*</span></label>
          <input type="text" name="confirm_password" class="form-control" id="confirm_password" required="">
        </div>
        <button type="submit" name="userregister" class="btn btn-primary btn-block">Sign Up</button>
        
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
<script src="admin/assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script type="text/javascript">
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Confirm Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<script type="text/javascript">
function checkemail()
{
 var email=document.getElementById( "email" ).value;
  
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK") 
   {
    return true;  
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}
</script>
</body>
</html>
<?php 
if (isset($_POST['userregister'])) {
        $name = $_POST['name'];
        $mobilenumber = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_role = '1';
        
    
       $sql = "INSERT INTO tbl_users (name,email,password,mobilenumber,user_role) VALUES ('$name', '$email', '$password', '$mobilenumber', '$user_role')";  
    $success = mysqli_query($conn,$sql);
    if($success)
    {
      $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2+$email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($conn,
"INSERT INTO `emil_verification_temp` (`email`, `verification_key`, `expDate`)
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
$mail->addAddress($email); 
$mail->isHTML(true); 
$mail->Subject = 'Email Verification By Capstone'; 
$bodyContent = ' 
    <html> 
    <head> 
        <title>Welcome to Capstone</title> 
    </head> 
    <body> 
       <table cellspacing="0" style="border: 2px solid #F48634; width: 100%;"> 
            <tr>
            <td colspan="2"><center><h5 style="color:#F78536;">Capstone</h5></center></td>
            </tr>
            <tr> 
                <th colspan="2"  style="background-color: #e0e0e0;">Dear '.$name.' Please click The following link For verifying and activation of your account.</th> 
            </tr> 
            <tr> 
                <td><a href="http://localhost/capstone/verifyemail.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">verify Email</a></td> 
            </tr> 
            <tr> 
                <td>
<span style="color:red;"><b>The link will expire after 1 day for security reason.<b><span></td> 
            </tr> 
            <tr> 
                <td colspan="2"><center>Regards Capstone Team</center></td> 
            </tr>
        </table>
    </body> 
    </html>';
$mail->Body    = $bodyContent;  
        if($mail->send())
        {
        ?>
        <script type="text/javascript">
          swal({title: "Success", text: "Registration successful, please verify in the registered Email-Id..!", type: "success"},
             function(){ 
                 window.location = "index.php";
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
          swal("Sorry!","Some Thing Went Wrong, Please Try Again..!","error");
        </script>
        <?php
    }
}
?>