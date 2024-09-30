<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");
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
		                    <h1 itemprop="name">VERIFY EMAIL</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Verify Email</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>

<div class="global-container">
  <div class="card login-form">
  <div class="card-body">
  <h3 class="text-center mb-25">Email Verification</h3>
<?php
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($conn,
  "SELECT * FROM `emil_verification_temp` WHERE `verification_key`='".$key."' and `email`='".$email."';"
  );
  $row = mysqli_num_rows($query);
  if ($row==""){
  echo'<h2 class="text-center">Invalid Link</h2>
<p>The link is invalid/expired or you have already used the key in which case it is 
deactivated.</p>
<p><a href="http://localhost/capstone/index.php">
Click here</a> to register.</p>';
  }else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
mysqli_query($conn,
"UPDATE `tbl_users` SET `emailverification`='Verified' 
WHERE `email`='".$email."';"
);

mysqli_query($conn,"DELETE FROM `emil_verification_temp` WHERE `email`='".$email."';");
  
echo '<p>Congratulations! Your Email has been Verified successfully.</p>
<p><a href="http://localhost/capstone/login.php">
Click here</a> to Login.</p><br/>';

}else{
echo "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
      }  
} 
  
?> 
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
</body>
</html>
