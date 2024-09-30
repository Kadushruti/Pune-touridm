<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
 <?php
include('include/head.php');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
<?php
include('include/header.php');
?>
		<!-- end:header-top -->
		<header class="page-header">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-8">                  
		                    <h1 itemprop="name">BOOKING HISTORY</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Booking History</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
			<section class="wrapper pt-5 pb-5">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-12 text-right">
                          <a href="account.php" class="btn btn-primary">My Account</a>
                        <a href="booking-history.php" class="btn btn-secondary">Booking History</a>
                      </div>
                </div>
              </div>
              <div class="card-body">
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
                                                        $sql = "SELECT * FROM tbl_bookings WHERE user_id = '".$_SESSION['logged_in_user_id']."'  ORDER BY id DESC";
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
                                                        <td><?php echo date("d/m/Y h:i A", strtotime($row['created_at'])); ?></td>
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
</section>

<?php
include('include/footer.php');
?>		
	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
<?php
include('include/script.php');
?>
	</body>
</html>
