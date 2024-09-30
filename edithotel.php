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
if (isset($_GET['edithotel'])) {
    $id = $_GET['edithotel'];
       $results = mysqli_query($conn, "SELECT * FROM tbl_hotels WHERE id='$id'"); 
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
                                <li class="breadcrumb-item active">Edit Hotel</li>
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
                      <div class="row mt-5">
                            <div class="col-md-12 col-lg-12">
                                <div class="card mb-4">
<div class="card-body">
<form class="form" action="#" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                 <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Name<span class="text-danger ml-2">*</span></label>
                                        <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>
                                    </div>
                                </div>

                                 <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Description<span class="text-danger ml-2">*</span></label>
                                        <textarea name="description" required id="description" class="form-control" cols="30" rows="10"><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Facilities<span class="text-danger ml-2">*</span></label>
            <select class="selectpicker form-control" required name="facilitiy_ids[]" multiple data-live-search="true">
              <?php
                $selected_array = explode(",",$row["facilitiy_ids"]);
                $facilitysql="SELECT * FROM tbl_facility";
                $facilityresult = mysqli_query($conn,$facilitysql);
                      if(mysqli_num_rows($facilityresult) > 0)
                      { 
                        while($facilityrow = mysqli_fetch_array($facilityresult))
                        { 
                            $mark_as_select = (in_array($facilityrow['facility_id'],$selected_array)) ? 'selected' : NULL;
                            ?>
                            <option value=<?= $facilityrow['facility_id']?> <?php echo $mark_as_select?>><?=$facilityrow['facility_name']?></option>
                            <?php
                        }
                      }
                      ?>
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Destination<span class="text-danger ml-2">*</span></label>
            <select class="selectpicker form-control" required name="destination_id" data-live-search="true">
              <?php
            $destinationsql="SELECT * FROM tbl_destinations";
            $destinationresult = mysqli_query($conn,$destinationsql);
                      if(mysqli_num_rows($destinationresult) > 0)
                      { 
                        while($destinationrow = mysqli_fetch_array($destinationresult))

                        { ?>
                            <option <?php if($row['destination_id'] == $destinationrow['id']) { ?> selected <?php  } ?> value="<?= $destinationrow['id']; ?>"><?= $destinationrow['name']; ?></option>
                            <?php
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
              <input class="form-check-input" type="radio" name="stars" id="inlineRadio" value="0" <?php if($row['stars']=="0"){ echo "checked";}?>>
              <label class="form-check-label" for="inlineRadio">None</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stars" id="inlineRadio1" value="1" <?php if($row['stars']=="1"){ echo "checked";}?>>
              <label class="form-check-label" for="inlineRadio1">1 Star</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio2" value="2" <?php if($row['stars']=="2"){ echo "checked";}?>>
                <label class="form-check-label" for="inlineRadio2">2 Stars</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio3" value="3" <?php if($row['stars']=="3"){ echo "checked";}?>>
                <label class="form-check-label" for="inlineRadio3">3 Stars</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio4" value="4" <?php if($row['stars']=="4"){ echo "checked";}?>>
                <label class="form-check-label" for="inlineRadio4">4 Stars</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stars" id="inlineRadio5" value="5" <?php if($row['stars']=="5"){ echo "checked";}?>>
                <label class="form-check-label" for="inlineRadio5">5 Stars</label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Mobile Number<span class="text-danger ml-2">*</span></label>
            <input type="text"  name="phone" id="phone" pattern="[0-9]{10}" required value="<?php echo $row['phone']; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">E-mail<span class="text-danger ml-2">*</span></label>
            <input type="email"  name="email" id="email" required value="<?php echo $row['email']; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Web<span class="text-danger ml-2">*</span></label>
            <input type="text"  name="web" id="web" required value="<?php echo $row['web']; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Address<span class="text-danger ml-2">*</span></label>
            <textarea name="address" id="address" required class="form-control" rows="4"><?php echo $row['address']; ?></textarea>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Latitude<span class="text-danger ml-2">*</span></label>
            <input type="text" required value="<?php echo $row['latitude']; ?>"  name="latitude" id="latitude" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Longitude<span class="text-danger ml-2">*</span></label>
            <input type="text" required value="<?php echo $row['longitude']; ?>" name="longitude" id="longitude" class="form-control">
        </div>
    </div>
                            
    <div class="form-group">
       
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="updatehotel">Save Changes</button>
            
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
if(isset($_POST['updatehotel']))
{
    $id = $_POST['id'];
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
  
    $sql = "UPDATE tbl_hotels SET name='$name',description='$description',facilitiy_ids='$facilitiy_ids',destination_id='$destination_id',stars='$stars',phone='$phone',email='$email',web='$web',address='$address',longitude='$longitude',latitude='$latitude' WHERE id=$id";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?> 
        <script type="text/javascript">
          swal({title: "Success", text: "Hotel Updated Successfully..!", type: "success"},
             function(){ 
                 window.location = "managehotels.php";
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