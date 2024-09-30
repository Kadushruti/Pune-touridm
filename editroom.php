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
if (isset($_GET['editroom'])) {
    $id = $_GET['editroom'];
       $results = mysqli_query($conn, "SELECT * FROM tbl_rooms WHERE id='$id'"); 
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
                                <li class="breadcrumb-item active">Edit Room</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-bed"></i></div>
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
                                      <label class="form-control-label text-dark">Hotel<span class="text-danger ml-2">*</span></label>
                                        <select class="selectpicker form-control" name="hotel_id" data-live-search="true" required="">
                                          <?php
                                        $hotelsql="SELECT * FROM tbl_hotels";
                                        $hotelresult = mysqli_query($conn,$hotelsql);
                                                  if(mysqli_num_rows($hotelresult) > 0)
                                                  { 
                                                    while($hotelrow = mysqli_fetch_array($hotelresult))

                                                    { ?>
                                                        <option <?php if($row['hotel_id'] == $hotelrow['id']) { ?> selected <?php  } ?> value="<?= $hotelrow['id']; ?>"><?= $hotelrow['name']; ?></option>
                                                        <?php
                                                    }
                                                  }
                                                  ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark" required>Name<span class="text-danger ml-2">*</span></label>
                                        <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Max Children</label>
                                      <select name="max_children" class="form-control">
                                        <option value="0" <?php if($row['max_children']=="0"){ echo "selected";}?>>0</option>
                                        <option value="1" <?php if($row['max_children']=="1"){ echo "selected";}?>>1</option>
                                        <option value="2" <?php if($row['max_children']=="2"){ echo "selected";}?>>2</option>
                                        <option value="3" <?php if($row['max_children']=="3"){ echo "selected";}?>>3</option>
                                        <option value="4" <?php if($row['max_children']=="4"){ echo "selected";}?>>4</option>
                                        <option value="5" <?php if($row['max_children']=="5"){ echo "selected";}?>>5</option>
                                        <option value="6" <?php if($row['max_children']=="6"){ echo "selected";}?>>6</option>
                                        <option value="7" <?php if($row['max_children']=="7"){ echo "selected";}?>>7</option>
                                        <option value="8" <?php if($row['max_children']=="8"){ echo "selected";}?>>8</option>
                                        <option value="9" <?php if($row['max_children']=="9"){ echo "selected";}?>>9</option>
                                        <option value="10" <?php if($row['max_children']=="10"){ echo "selected";}?>>10</option>
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Max Adults</label>
                                      <select name="max_adults" class="form-control">
                                        <option value="1" <?php if($row['max_adults']=="1"){ echo "selected";}?>>1</option>
                                        <option value="2" <?php if($row['max_adults']=="2"){ echo "selected";}?>>2</option>
                                        <option value="3" <?php if($row['max_adults']=="3"){ echo "selected";}?>>3</option>
                                        <option value="4" <?php if($row['max_adults']=="4"){ echo "selected";}?>>4</option>
                                        <option value="5" <?php if($row['max_adults']=="5"){ echo "selected";}?>>5</option>
                                        <option value="6" <?php if($row['max_adults']=="6"){ echo "selected";}?>>6</option>
                                        <option value="7" <?php if($row['max_adults']=="7"){ echo "selected";}?>>7</option>
                                        <option value="8" <?php if($row['max_adults']=="8"){ echo "selected";}?>>8</option>
                                        <option value="9" <?php if($row['max_adults']=="9"){ echo "selected";}?>>9</option>
                                        <option value="10" <?php if($row['max_adults']=="10"){ echo "selected";}?>>10</option>
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Max People</label>
                                      <select name="max_people" class="form-control">
                                        <option value="1" <?php if($row['max_people']=="1"){ echo "selected";}?>>1</option>
                                        <option value="2" <?php if($row['max_people']=="2"){ echo "selected";}?>>2</option>
                                        <option value="3" <?php if($row['max_people']=="3"){ echo "selected";}?>>3</option>
                                        <option value="4" <?php if($row['max_people']=="4"){ echo "selected";}?>>4</option>
                                        <option value="5" <?php if($row['max_people']=="5"){ echo "selected";}?>>5</option>
                                        <option value="6" <?php if($row['max_people']=="6"){ echo "selected";}?>>6</option>
                                        <option value="7" <?php if($row['max_people']=="7"){ echo "selected";}?>>7</option>
                                        <option value="8" <?php if($row['max_people']=="8"){ echo "selected";}?>>8</option>
                                        <option value="9" <?php if($row['max_people']=="9"){ echo "selected";}?>>9</option>
                                        <option value="10" <?php if($row['max_people']=="10"){ echo "selected";}?>>10</option>
                                       </select>
                                    </div>
                                </div>

                                 <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Description<span class="text-danger ml-2">*</span></label>
                                        <textarea name="description" required="" id="description" class="form-control" cols="30" rows="10"><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-xl-12 ">
                                      <label class="form-control-label text-dark">Facilities<span class="text-danger ml-2">*</span></label>
                                        <select class="selectpicker form-control" name="facility_ids[]" multiple required="" data-live-search="true">
                                          <?php
                                            $selected_array = explode(",",$row["facility_ids"]);
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
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-control-label text-dark">Number of rooms<span class="text-danger ml-2">*</span></label>
                                        <input type="number" required="" value="<?php echo $row['number_of_rooms']; ?>"  name="number_of_rooms" id="number_of_rooms" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-control-label text-dark">Price / night<span class="text-danger ml-2">*</span></label>
                                        <input type="text" required="" pattern="^(?=.?\d)\d{0,14}(\.?\d{0,6})?$" value="<?php echo $row['price']; ?>" name="price" id="price" class="form-control">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" name="updateroom">Save Changes</button>  
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
if(isset($_POST['updateroom']))
{
    $id = $_POST['id'];
    $hotel_id = $_POST['hotel_id'];
    $name = $_POST['name'];
     $max_children = $_POST['max_children'];
   $max_adults = $_POST['max_adults'];
    $max_people = $_POST['max_people'];
    $description = $_POST['description'];
    $facility_ids = implode(",", $_POST['facility_ids']);
    $number_of_rooms = $_POST['number_of_rooms']; 
    $price = $_POST['price'];
  
    $sql = "UPDATE tbl_rooms SET hotel_id='$hotel_id',name='$name',max_children='$max_children',max_adults='$max_adults',max_people='$max_people',description='$description',facility_ids='$facility_ids',number_of_rooms='$number_of_rooms',price='$price' WHERE id=$id";
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?> 
        <script type="text/javascript">
          swal({title: "Success", text: "Room Updated Successfully..!", type: "success"},
             function(){ 
                 window.location = "managerooms.php";
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