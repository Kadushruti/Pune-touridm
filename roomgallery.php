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
<link href="assets/dist/css/imagegallery.css" rel="stylesheet">
</head>
<?php 
if (isset($_GET['roomgallery'])) {
    $id = $_GET['roomgallery'];
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
                                <li class="breadcrumb-item active">Room Image Gallary</li>
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
                                    <div class="card-header text-center">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            Select Image Files to Upload:
                                            <input type="file" name="files[]" multiple >
                                            <input type="submit" name="submit" value="UPLOAD">
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <?php
                                        $sql = "SELECT * FROM tbl_rooms_gallery  WHERE room_id ='".$id."' ORDER BY gallery_id DESC";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $imageURL = 'uploads/rooms/gallery/'.$row["file_name"];
                                        ?>
                                            <div class="col-md-4 mb-4">
                                                <div class="image-area">
                                                  <img src="<?php echo $imageURL; ?>"  alt="Preview">
                                                  <a class="remove-image text-white" onclick="delete_image('<?= $row['gallery_id'];?>');" style="display: inline;">&#215;</a>
                                              </div>
                                            </div>
                                        <?php }
                                        }else{ ?>
                                            <p>No image(s) found...</p>
                                        <?php } ?>
                                      </div>
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
 <script type="text/javascript">
function delete_image(deleteimage)
{
    var roomgallery = <?php echo $_GET['roomgallery']?>;
    swal({title: 'Are you sure..!',
    text: "Do You Want to Delete Image?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Confirm!'},
   function(){ 
       window.location = 'roomgallery.php?deleteimage='+deleteimage+'&&roomgallery='+roomgallery;
   }
);   
}
</script>
    </body>

</html>
<?php 
if(isset($_GET['deleteimage']))  
{
    $id = $_GET['deleteimage'];
    $sql1 = "DELETE FROM tbl_rooms_gallery WHERE gallery_id=$id";
    $success1 = mysqli_query($conn,$sql1);
    if($success1)
    {
        ?> 
        <script type="text/javascript">
            var roomgallery = <?php echo $_GET['roomgallery']?>;
            swal({title: "Success", text: "Image Delete Successfully..!", type: "success"},
               function(){ 
                   window.location = "roomgallery.php?roomgallery="+roomgallery;
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
if(isset($_POST['submit'])){ 
    $targetDir = "uploads/rooms/gallery/"; 
    $allowTypes = array('jpg','png','jpeg'); 
     
    $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName;  
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){  
                    $insertValuesSQL .= "('".$fileName."','".$_GET['roomgallery']."'),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'\n'.$errorUpload.'\n'.$errorUploadType:'\n'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            $sql = "INSERT INTO tbl_rooms_gallery (file_name,room_id) VALUES $insertValuesSQL";
            $insert = mysqli_query($conn,$sql); 
            if($insert){ 
                ?>
                    <script type="text/javascript">
                        var roomgallery = <?php echo $_GET['roomgallery']?>;
                        swal({title: "Success", text: "Files are uploaded successfully<?php echo $errorMsg; ?>", type: "success"},
                        function(){ 
                         window.location = "roomgallery.php?roomgallery="+roomgallery;
                        }
                        );
                    </script>
                <?php
            }else{ 
                 ?>
        <script type="text/javascript">
            swal("Sorry!","Sorry, there was an error uploading your file.","error");
        </script>
        <?php
            } 
        }else{ 
            ?>
        <script type="text/javascript">
            swal("Sorry!","Upload failed!<?php echo $errorMsg; ?>","error");
        </script>
        <?php 
        } 
    }else{
        ?>
        <script type="text/javascript">
            swal("Sorry!","Please select a file to upload","error");
        </script>
        <?php              
    } 
} 
}
?>