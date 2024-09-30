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
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
<?php
include('include/header.php');
?>
		<!-- end:header-top -->
	<?php 
       $userresults = mysqli_query($conn, "SELECT * from tbl_users where id= '".$_SESSION['logged_in_user_id']."'"); 
        $rowuser = mysqli_fetch_array($userresults);
?>
		<header class="page-header">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-8">                  
		                    <h1 itemprop="name">MY ACCOUNT</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>My Account</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
			<section class="wrapper pt-5 pb-5">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-12 text-right">
                          <a href="account.php" class="btn btn-secondary">My Account</a>
                        <a href="booking-history.php" class="btn btn-primary">Booking History</a>
                      </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post" enctype="" action="">
            <input type="hidden" name="id" value="<?php echo $rowuser['id']; ?>">
            <div class="form-group">
              <label for="name" class="font-weight-600">Name<span class="text-danger ml-2">*</span></label>
               <input type="text" class="form-control" name="name" id="name"  value="<?php echo $rowuser['name']; ?>" required>
            </div>
            <div class="form-group">
              <label for="mobilenumber" class="font-weight-600">Mobile Number<span class="text-danger ml-2">*</span></label>
               <input type="text" class="form-control" name="mobilenumber" id="mobilenumber"  value="<?php echo $rowuser['mobilenumber']; ?>" required pattern="[0-9]{10}">
            </div>
            <div class="form-group">
              <label for="email" class="font-weight-600">Email Id<span class="text-danger ml-2">*</span></label>
               <input type="email" class="form-control" name="email" id="email"  value="<?php echo $rowuser['email']; ?>" required>
              </div>
            <div class="form-group">
              <label for="address" class="font-weight-600">Address<span class="text-danger ml-2">*</span></label>
            <textarea name="address" id="address" required="" class="form-control" cols="30" rows="10"><?php echo $rowuser['address']; ?></textarea>                           
            </div>
        </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button type="submit" name="updateaccount" class="btn btn-success">Update Account</button>
                  </div>
                </div>
              </div>
                        </form>
            </div>
        </div>
    </div>
</section>

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
	</body>
</html>
<?php
if(isset($_POST['updateaccount']))
{
    

    $id = $_POST['id'];
     
     $name = $_POST['name'];
     $mobilenumber = $_POST['mobilenumber'];
     $email = $_POST['email'];
     $address = $_POST['address'];

  $sql = "UPDATE tbl_users SET name='$name', mobilenumber='$mobilenumber',email='$email', address='$address'  WHERE id=$id";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?> 
        <script type="text/javascript">
            swal({title: "Success", text: "Account Updated Successfully..!", type: "success"},
               function(){ 
                   window.location = "account.php";
               }
            );
          </script>
<?php
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