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
                                <li class="breadcrumb-item active">Add Hotel</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-building"></i></div>
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
                        <form method="post" enctype="multipart/form-data" action="">  
    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Name<span class="text-danger ml-2">*</span></label>
            <input type="text"  name="name" id="name" required="" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Description<span class="text-danger ml-2">*</span></label>
            <textarea name="description" id="description" required="" class="form-control" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Facilities<span class="text-danger ml-2">*</span></label>
            <select class="selectpicker form-control" required="" name="facilitiy_ids[]" multiple data-live-search="true">
              <?php
            $facilitysql="SELECT * FROM tbl_facility";
            $facilityresult = mysqli_query($conn,$facilitysql);
                      if(mysqli_num_rows($facilityresult) > 0)
                      { 
                        while($facilityrow = mysqli_fetch_array($facilityresult))

                        { echo "<option value=$facilityrow[facility_id]>$facilityrow[facility_name]</option>";
                        }
                      }
                      ?>
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Destination<span class="text-danger ml-2">*</span></label>
            <select class="selectpicker form-control" required="" name="destination_id" data-live-search="true">
              <?php
            $destinationsql="SELECT * FROM tbl_destinations";
            $destinationresult = mysqli_query($conn,$destinationsql);
                      if(mysqli_num_rows($destinationresult) > 0)
                      { 
                        while($destinationrow = mysqli_fetch_array($destinationresult))

                        { echo "<option value=$destinationrow[id]>$destinationrow[name]</option>";
                        }
                      }
                      ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Stars</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stars" id="inlineRadio" value="0" checked>
              <label class="form-check-label" for="inlineRadio">None</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stars" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">1 Star</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">2 Stars</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio3" value="3">
                <label class="form-check-label" for="inlineRadio3">3 Stars</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio4" value="4">
                <label class="form-check-label" for="inlineRadio4">4 Stars</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio5" value="5">
                <label class="form-check-label" for="inlineRadio5">5 Stars</label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Mobile Number<span class="text-danger ml-2">*</span></label>
            <input type="text"  name="phone" id="phone" pattern="[0-9]{10}" required="" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">E-mail<span class="text-danger ml-2">*</span></label>
            <input type="email"  name="email" id="email" required="" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Web<span class="text-danger ml-2">*</span></label>
            <input type="text"  name="web" id="web" required="" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Address<span class="text-danger ml-2">*</span></label>
            <textarea name="address" id="address" required="" class="form-control" rows="4"></textarea>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Latitude<span class="text-danger ml-2">*</span></label>
            <input type="text" name="latitude" required="" id="latitude" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Longitude<span class="text-danger ml-2">*</span></label>
       <input type="text"  name="longitude" required="" id="longitude" class="form-control">
        </div>
    </div>

   <div class="mt-5 text-center">
                     <button name="addhotel" class="btn btn-lg btn-primary">
                                Add Hotel
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
<script>
 $('select').selectpicker();
</script>
    </body>

</html>
<?php 
if (isset($_POST['addhotel'])) {

   $name = $_POST['name'];
   $description = $_POST['description'];
   $facilitiy_ids = implode(",", $_POST['facilitiy_ids']);
   $destination_id = $_POST['destination_id'];
   $stars = $_POST['stars'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $web = $_POST['web'];
   $address = $_POST['address'];
   $longitude = $_POST['longitude'];
   $latitude = $_POST['latitude'];

    $sql = "INSERT INTO tbl_hotels(name,description,facilitiy_ids,destination_id,stars,phone,email,web,address,longitude,latitude) values ('$name','$description','$facilitiy_ids','$destination_id','$stars','$phone','$email','$web','$address','$longitude','$latitude')";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?>
        <script type="text/javascript">
          swal("Success!","Hotel Added Successfully..!","success");
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