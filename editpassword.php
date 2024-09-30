<?php session_start();
if(!isset($_SESSION['logged_in_user_id']))
{
?>
  <script>window.location.assign("../login.php");</script>
<?php
}
else
{
  include("../dbconfig/config.php");
  include("../dbconfig/validate.php");
?>
<!doctype html>
<html lang="en">
<head>
        <?php
include('include/head.php');
?>
    </head>

    <body class="fixed">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
include('include/sidebar.php');
?>
            <!-- Page Content  -->
            <div class="content-wrapper">
                <div class="main-content">
                    <!--/.navbar-->
                    <?php
include('include/header.php');
?>
                    <!--Content Header (Page header)-->
                    <div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Password</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-key"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">Edit Password</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                      <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    
                                    <div class="card-body">
                                        <form name="chngpwd" action="" method="post" autocomplete="off" onSubmit="return valid();">

                                        <div class="form-group">
                                            <label class="form-label">Current Password</label>
                                            <input type="text" name="currentpassword" id="currentpassword" class="form-control" placeholder="Enter Current Password" required>
                                        </div>
                                   
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="text" name="newpassword" id="newpassword" class="form-control" placeholder="Enter New Password" required>
                                        </div>
                                 
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="text" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Enter Confirm Password" required>
                                        </div>
                                 
          <div class="text-center">
             <button type="submit" name="change" id="change" class="btn btn-primary">Save Password</button>
             </div>
          </form>
                               </div>
                                </div>
                            </div>
                        </div>  
                    </div><!--/.body content-->
                </div><!--/.main content-->
                <?php
include('include/footer.php');
?>
                <!--/.footer content-->
                <div class="overlay"></div>
            </div><!--/.wrapper-->
        </div>
        <!--Global script(used by all pages)-->
        <?php
include('include/script.php');
?>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.currentpassword.value=="")
{
    swal("Sorry!","Current Password Filed is Empty..!","error");
document.chngpwd.currentpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
    swal("Sorry!","New Password Filed is Empty..!","error");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
    swal("Sorry!","Confirm Password Filed is Empty..!","error");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
     swal("Sorry!","New Password and Confirm Password Field do not match, Please Try Again..!","error");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</body></html>
<?php
if(isset($_POST['change']))
{
 $currentpassword = $_POST['currentpassword'];
 $newpassword = $_POST['newpassword'];
$sql=mysqli_query($conn,"SELECT * FROM tbl_users WHERE password='$currentpassword' && id='".$_SESSION['logged_in_user_id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($conn,"UPDATE tbl_users SET password='$newpassword' WHERE id='".$_SESSION['logged_in_user_id']."'");
 ?>
    <script type="text/javascript">
            swal({title: "Success", text: "Password Update Successfully..!", type: "success"},
               function(){ 
                   window.location = 'editpassword.php';
               }
            );
        </script>
        <?php
}
else
{
    ?>
        <script type="text/javascript">
          swal("Sorry!","Current Password not match , Please Try Again..!","error");
        </script>
        <?php
}
}
}
?>