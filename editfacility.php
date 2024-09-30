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
if (isset($_GET['editfacility'])) {
    $facility_id = $_GET['editfacility'];
       $results = mysqli_query($conn, "SELECT * FROM tbl_facility WHERE facility_id='$facility_id'"); 
        $row = mysqli_fetch_array($results);
        }
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
                                <li class="breadcrumb-item active">Edit Facilitiy</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-wrench"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                      <div class="row mt-5">
                            <div class="col-md-12 col-lg-12">
                                <div class="card mb-4">
<div class="card-body">
<form class="form" action="#" method="post">
                      <input type="hidden" name="facility_id" value="<?php echo $row['facility_id']; ?>">
                                <div class="form-group row">
                                    <label class="col-lg-6 form-control-label text-dark">Name<span class="text-danger ml-2">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="facility_name" value="<?php echo $row['facility_name']; ?>" required>
                                    </div>
                                 </div>
                            
                                <div class="form-group">
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" name="updatefacility">Save Changes</button>
                                        
                                    </div>
                                </div>
                            </form>
                               </div>
                                </div>
                            </div>
                        </div>  
                    </div><!--/.body content-->
                </div><!--/.main content-->
                    <!-- profile upload -->

<!-- end : profilephoto -->
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
if(isset($_POST['updatefacility']))
{
    $facility_id = $_POST['facility_id'];
    $facility_name = $_POST['facility_name'];
  
    $sql = "UPDATE tbl_facility SET facility_name='$facility_name' WHERE facility_id=$facility_id";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?> 
        <script type="text/javascript">
          swal({title: "Success", text: "Facilitiy Updated Successfully..!", type: "success"},
             function(){ 
                 window.location = "managefacilites.php";
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