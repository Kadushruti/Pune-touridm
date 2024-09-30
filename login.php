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
		                    <h1 itemprop="name">LOG IN</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Log in</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		<div class="global-container">
  <div class="card login-form">
  <div class="card-body">
    <div class="card-text">
      <form action="#" method="post" autocomplete="off">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="email" required="">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <a href="forgotpassword.php" style="float:right;font-size:12px;">Forgot password?</a>
          <input type="password" name="password" class="form-control" id="password" required="">
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
        
        <div class="sign-up">
          Don't have an account? <a href="register.php">Create One</a>
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
if(isset($_POST['login']))
{   
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) 
    {
        if($row = mysqli_fetch_array($result))
        {
          if($row['emailverification'] === 'Verified')
          {
            $_SESSION['valid_position'] = $row['user_role'];
            $_SESSION['logged_in_user_id'] = $row['id'];
            $_SESSION['valid_user']= $email;
              if ($_SESSION['valid_position'] === '0') 
              {
                ?>
                <script type="text/javascript"> window.location="admin/dashboard.php"; </script>
                <?php
              } 
              if ($_SESSION['valid_position'] === '1') 
              {
                ?>
                <script type="text/javascript"> window.location="account.php"; </script>
                <?php
              }
          }
          else 
          {
              ?>
                <script type="text/javascript">
              swal("Sorry!","Please verify your Email-Id..!","error");
            </script>
            <?php
          }   
        }
                    
    }
  else 
        {
            ?>
              <script type="text/javascript">
            swal("Sorry!","Email Or Password Not Exist","error");
          </script>
          <?php
        }
   }
?>