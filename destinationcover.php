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
if (isset($_GET['destinationcover'])) {
    $id = $_GET['destinationcover'];
       $results = mysqli_query($conn, "SELECT * FROM tbl_destinations WHERE id='$id'"); 
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
                                <li class="breadcrumb-item active">Destination Cover Image</li>
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
                      <div class="row mt-5">
                            <div class="col-md-12 col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <?php
                                         if (!empty($row['coverimage'])) {
                                             $img = "uploads/destinations/coverimage/".$row['coverimage'];
                                         }
                                         else{
                                            $img = "assets/dist/img/default.png";
                                         }
                                         ?>
                                        <img src="<?= $img ?>" width="400px" height="200px">
                                                     <a href="#" class="propic" data-toggle="modal" data-target="#coverModal">
                                                    <h5 class="mt-3"><strong>Click To Change Cover Image</strong></h5>
                                                </a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div><!--/.body content-->
                </div><!--/.main content-->
                 <!-- coverimage -->
                    <div class="modal fade" id="coverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Destination Cover Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="" enctype="multipart/form-data" >
                               <input type="hidden" name="size" value="1000000" required="">
                                <label class="btn btn-primary">
                                    Browse&hellip; <input type="file" name="coverimage" style="display: none;">
                                </label>
                                <button type="submit" name="updatecoverimage" class="btn btn-success float-right submit_button">Upload</button>
                            </form>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                    <!-- end : coverimage -->
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
if(isset($_POST['updatecoverimage']))
{
    $targetDir = "uploads/destinations/coverimage/";
    $fileName = basename($_FILES["coverimage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["coverimage"]["tmp_name"], $targetFilePath)){
                $id = $_GET['destinationcover'];
                if (!empty($row['coverimage'])) {
                    $deleteImagePath = "uploads/destinations/coverimage/".$row['coverimage'];
                    unlink($deleteImagePath);
                }
                $uploadcover = $conn->query("UPDATE tbl_destinations SET coverimage ='$fileName' WHERE id='$id'");
                if($uploadcover){
                                ?>
                                <script type="text/javascript">
                                    swal({title: "Success", text: "Cover Image Updated Successfully..!", type: "success"},
                                    function(){ 
                                     window.location = "managedestinations.php";
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
                else
                {
                ?>
                    <script type="text/javascript">
                        swal("Sorry!","there was an error uploading your file...!","error");
                    </script>
                <?php 
                }
                }
                else
                {
                ?>
                    <script type="text/javascript">
                        swal("Sorry!","Sorry, only JPG, JPEG, PNG files are allowed to upload..!","error");
                    </script>
                <?php 
                }
    }
}
?>