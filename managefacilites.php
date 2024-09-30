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
                                <li class="breadcrumb-item active">Manage Facilities</li>
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
         <div class="col-lg-12">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table display table-bordered table-striped table-hover basic">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th> 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sql = "SELECT * FROM tbl_facility";
                                                        $result = mysqli_query($conn,$sql);
                                                        if(mysqli_num_rows($result) > 0)
                                                        {
                                                            $i = 1;
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                            ?>
                                                    <tr class="text-capitalize">  
                                                        <td><?= $i;?></td>  
                                                        <td><?php echo $row['facility_name']; ?></td>
                                                        <td>
                                                            <a href="editfacility.php?editfacility=<?php echo $row['facility_id']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Facility"><i class="fa fa-pencil-alt"></i></a>
                                                            <a onclick="delete_facility('<?= $row['facility_id'];?>');" data-toggle="tooltip" data-placement="bottom" title="Delete Facility" class="btn btn-danger"><i class="fa fa-trash text-white" ></i></a>
                                                        </td> 
                                                    </tr>
                                                   <?php
                                                        $i++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
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
function delete_facility(deletefacility)
{
    swal({title: 'Are you sure..!',
    text: "Do You Want to Delete Facility?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Confirm!'},
   function(){ 
       window.location = 'managefacilites.php?deletefacility='+deletefacility;
   }
);   
}
</script>
    </body>

</html>
<?php
if(isset($_GET['deletefacility']))
    
{
    $facility_id = $_GET['deletefacility'];

    $sql1 = "DELETE FROM tbl_facility WHERE facility_id=$facility_id";
    $success1 = mysqli_query($conn,$sql1);
    if($success1)
    {
        ?> 
        <script type="text/javascript">
            swal({title: "Success", text: "Facility Delete Successfully..!", type: "success"},
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