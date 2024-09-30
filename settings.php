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
<?php 
       $accountresults = mysqli_query($conn, "SELECT * from tbl_settings where id= 1"); 
        $rowaccount = mysqli_fetch_array($accountresults);
?>
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
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-cog-outline"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                      <div class="row mt-5">
                            <div class="col-md-12 col-lg-12">
                                <div class="card mb-4">       
<div class="card-body">
    <form method="post" enctype="" action="">
 <input type="hidden" name="id" value="<?php echo $rowaccount['id']; ?>">

            <div class="form-group">
              <label for="mobile_number" class="font-weight-600">Mobile Number<span class="text-danger ml-2">*</span></label>
               <input type="text" class="form-control" name="mobile_number" id="mobile_number"  value="<?php echo $rowaccount['mobile_number']; ?>" required pattern="[0-9]{10}">
            </div>
            <div class="form-group">
              <label for="email" class="font-weight-600">Email Id<span class="text-danger ml-2">*</span></label>
               <input type="email" class="form-control" name="email" id="email"  value="<?php echo $rowaccount['email']; ?>" required>
              </div>
            <div class="form-group">
              <label for="address" class="font-weight-600">Address<span class="text-danger ml-2">*</span></label>
            <textarea name="address" id="address" required="" class="form-control" cols="30" rows="10"><?php echo $rowaccount['address']; ?></textarea>                              
            </div>
            <div class="form-group row mb-3">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-control-label text-dark">Latitude<span class="text-danger ml-2">*</span></label>
                                        <input type="text" value="<?php echo $rowaccount['latitude']; ?>"  name="latitude" id="latitude" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-control-label text-dark">Longitude<span class="text-danger ml-2">*</span></label>
                                        <input type="text" value="<?php echo $rowaccount['longitude']; ?>" name="longitude" id="longitude" class="form-control" required>
                                    </div>
                                </div>
             <button type="submit" name="updateaccount" class="btn btn-primary">Update Settings</button>
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
    </body>

</html>
<?php
if(isset($_POST['updateaccount']))
{
    

    $id = $_POST['id'];
     
     
     $mobile_number = $_POST['mobile_number'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $latitude = $_POST['latitude'];
     $longitude = $_POST['longitude'];

  $sql = "UPDATE tbl_settings SET latitude='$latitude', longitude='$longitude',mobile_number='$mobile_number',email='$email', address='$address'  WHERE id=$id";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?> 
        <script type="text/javascript">
            swal({title: "Success", text: "Settings Updated Successfully..!", type: "success"},
               function(){ 
                   window.location = "settings.php";
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
}
?>