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
                                <li class="breadcrumb-item active">Add Activity</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-skiing-nordic"></i></div>
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
          <label class="form-control-label text-dark">Max Children</label>
          <select name="max_children" class="form-control">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
           </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Max adults</label>
          <select name="max_adults" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
           </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-xl-12 ">
          <label class="form-control-label text-dark">Max People</label>
          <select name="max_people" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
           </select>
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
          <label class="form-control-label text-dark">Hotels<span class="text-danger ml-2">*</span></label>
            <select class="selectpicker form-control" required="" name="hotel_ids[]" multiple data-live-search="true">
              <?php
            $hotelsql="SELECT * FROM tbl_hotels";
            $hotelresult = mysqli_query($conn,$hotelsql);
                      if(mysqli_num_rows($hotelresult) > 0)
                      { 
                        while($hotelrow = mysqli_fetch_array($hotelresult))

                        { echo "<option value=$hotelrow[id]>$hotelrow[name]</option>";
                        }
                      }
                      ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row mb-3">
        <div class="col-xl-12 mb-3">
            <label class="form-control-label text-dark">Price<span class="text-danger ml-2">*</span></label>
            <input type="text" required="" pattern="^(?=.?\d)\d{0,14}(\.?\d{0,6})?$" name="price" id="price" class="form-control">
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
                     <button name="addactivity" class="btn btn-lg btn-primary">
                                Add Activity
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
if (isset($_POST['addactivity'])) {

   $name = $_POST['name'];
   $max_children = $_POST['max_children'];
   $max_adults = $_POST['max_adults'];
   $max_people = $_POST['max_people'];
   $description = $_POST['description'];
   $hotel_ids = implode(",", $_POST['hotel_ids']);
   $price = $_POST['price'];
   $longitude = $_POST['longitude'];
   $latitude = $_POST['latitude'];

    $sql = "INSERT INTO tbl_activities(name,max_children,max_adults,max_people,description,hotel_ids,price,longitude,latitude) values ('$name','$max_children','$max_adults','$max_people','$description','$hotel_ids','$price','$longitude','$latitude')";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?>
        <script type="text/javascript">
          swal("Success!","Activity Added Successfully..!","success");
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