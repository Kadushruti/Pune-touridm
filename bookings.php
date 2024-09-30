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
                                <li class="breadcrumb-item active">Bookings</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-credit-card"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                      <div class="row mt-5">
                            <div class="col-md-12 col-lg-12">
                                <div class="card mb-4">       
                                  <div class="card-body text-center">
                                       <div class="table-responsive">
                                            <table class="table display table-bordered table-striped table-hover basic">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Razorpay Order Id</th>
                                                        <th>Razorpay Payment Id</th>
                                                        <th>Payment Date & time</th> 
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sql = "SELECT * FROM tbl_bookings ORDER BY created_at desc";
                                                        $result = mysqli_query($conn,$sql);
                                                        if(mysqli_num_rows($result) > 0)
                                                        {
                                                            $i = 1;
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                            ?>
                                                    <tr class="text-capitalize">  
                                                        <td><?= $i;?></td>  
                                                        <td><?php echo $row['razorpay_order_id']; ?></td>
                                                        <td><?php echo $row['razorpay_payment_id']; ?></td>
                                                        <td><?php echo $row['created_at']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>"><i class="fa fa-eye"></i></button>
                                                        </td> 
                                                    </tr>
                                                    <div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-xl">
          <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" style="margin: 0;">&times;</button>
                <h2>Booking Summary</h2>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                <div class="col-md-6 p-3" style="border:1px solid gray;">
                  <h4>Booking details</h4>
                  <hr>
                  Payment Methode <strong>RazorPay</strong><br>
                  Payment Date / Time <strong><?php echo $row['created_at']; ?></strong><br>
                  RazorPay Order Id <strong><?php echo $row['razorpay_order_id']; ?></strong><br>
                  RazorPay Payment Id <strong><?php echo $row['razorpay_payment_id']; ?></strong>
                </div>
                <div class="col-md-6 p-3" style="border:1px solid gray;">
                  <h4>Billing address</h4>
                  <hr>
                   <?php echo $row['name'] ?><br><?php echo $row['address'] ?><br>
                            Phone : <?php echo $row['mobilenumber'] ?><br>E-mail : <?php echo $row['email'] ?>
                </div>
                <?php 
                 if ($row['room_id'] > 0) {
                  ?>
                <div class="col-md-3 p-3 mt-5" style="border:1px solid gray;">
                  <h4>Room</h4>
                  <hr>
                  <?php $sql_hotel = "SELECT * from tbl_hotels where id='".$row['hotel_id']."'";
                                            $result_hotel = mysqli_query($conn,$sql_hotel);
                                            if($row_hotel = mysqli_fetch_array($result_hotel))
                                            {
                                                echo $row_hotel['name'];
                                            }
                                            ?> - <?php $sql_room = "SELECT * from tbl_rooms where id='".$row['room_id']."'";
                                            $result_room = mysqli_query($conn,$sql_room);
                                            if($row_room = mysqli_fetch_array($result_room))
                                            {
                                                echo $row_room['name'];
                                            }
                                            ?>
                </div>
                <div class="col-md-3 p-3  mt-5" style="border:1px solid gray;">
                  <h4>Ckeck In / Check Out</h4>
                  <hr>
                  <?php echo $row['checkin'] ?> / <?php echo $row['checkout'] ?>
                </div>
                <div class="col-md-3 p-3  mt-5" style="border:1px solid gray;">
                  <h4>Persons</h4>
                  <hr>
                   Adults: <?php echo number_format($row['max_adults']) ?> Children: <?php echo number_format($row['max_children']) ?>
                </div>
                <div class="col-md-3 p-3  mt-5" style="border:1px solid gray;">
                  <h4>Total</h4>
                  <hr>
                  &#8377; <?php echo number_format((float)$row['total_room_price'], 2);?>
                </div>
                <?php 
                 }
                 if ($row['activity_id'] > 0) {
                  ?>
                <div class="col-md-3 p-3 mt-5" style="border:1px solid gray;">
                  <h4>Activity</h4>
                  <hr>
                  <?php $sql_activity = "SELECT * from tbl_activities where id='".$row['activity_id']."'";
                                            $result_activity = mysqli_query($conn,$sql_activity);
                                            if($row_activity = mysqli_fetch_array($result_activity))
                                            {
                                                echo $row_activity['name'];
                                            }
                                            ?>
                </div>
                <div class="col-md-3 p-3  mt-5" style="border:1px solid gray;">
                  <h4>Date</h4>
                  <hr>
                   <?php echo $row['activitydate'] ?> 
                </div>
                <div class="col-md-3 p-3  mt-5" style="border:1px solid gray;">
                  <h4>Persons</h4>
                  <hr>
                  Adults: <?php echo number_format($row['max_adults_activity']) ?> Children: <?php echo number_format($row['max_children_activity']) ?> 
                </div>
                <div class="col-md-3 p-3  mt-5" style="border:1px solid gray;">
                  <h4>Total</h4>
                  <hr>
                  &#8377; <?php echo number_format((float)$row['total_activity_price'], 2);?>
                </div>
              <?php } ?>
                <div class="col-md-8 p-3 mt-5" style="border:1px solid gray;">
                  <h4 class="text-right">Sub Total</h4>
                </div>
                <div class="col-md-4 p-3  mt-5" style="border:1px solid gray;">
                  <h4>&#8377; <?php echo number_format((float)$row['sub_total_price'], 2);?></h4>
                </div>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
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
}
?>