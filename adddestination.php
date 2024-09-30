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
                                <li class="breadcrumb-item active">Add Destination</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-map-marked"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
   <!--add post start  -->
   <div class="row ">
        <div class=" col-md-12 col-lg-12">
                    <!-- form user info -->
<div class="card">
                      
                        <div class="card-body">
                        <form method="post" action="">  
    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Name <span class="text-danger ml-2">*</span></label>
            <input type="text" required="" name="name" id="name" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Description<span class="text-danger ml-2">*</span></label>
            <textarea name="description" required="" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Latitude<span class="text-danger ml-2">*</span></label>
            <input type="text" required="" name="latitude" id="latitude" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Longitude<span class="text-danger ml-2">*</span></label>
            <input type="text" required="" name="longitude" id="longitude" class="form-control">
        </div>
    </div>

   <div class="mt-5 text-center">
        <button name="adddestination" class="btn btn-lg btn-primary">
                Add Destination
        </button>
  </div>

</form>
                        </div>
                    </div>
                    <!-- /form user info -->
        </div>
    </div>
    <!-- add post end -->  
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
if (isset($_POST['adddestination'])) {

   $name = $_POST['name'];
   $description = $_POST['description'];
   $longitude = $_POST['longitude'];
   $latitude = $_POST['latitude'];

    $sql = "INSERT INTO tbl_destinations(name,description,longitude,latitude) values ('$name','$description','$longitude','$latitude')";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?>
        <script type="text/javascript">
          swal("Success!","Destination Added Successfully..!","success");
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
          swal("Sorry!","Some Thing is Went Wrong, Please Try Again..!","error");
        </script>
        <?php
    }
}
}
?>