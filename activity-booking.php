<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");

require 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
 <?php
include('include/head.php');
?>
<link rel="stylesheet" href="assets/css/booking-form.css">
	</head>
<?php 
if (isset($_GET['activity'])) {
    $activity_id = $_GET['activity'];
       $results = mysqli_query($conn, "SELECT * FROM tbl_activities WHERE id='$activity_id'"); 
        $row = mysqli_fetch_array($results);
    }
?>  
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
		                    <h1 itemprop="name">BOOKING</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Booking</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
<div class="container mt-5">
	<div class="text-center heading-section animate-box mb-0">
		<h1><strong><?php echo $row['name'];?></strong></h1>
          </div>
<div class="row">
<?php if( isset($_SESSION['logged_in_user_id']) && !empty($_SESSION['logged_in_user_id']) )
								{
								?> 
<div class="col-md-12">
<form method="POST" action="">
  <div class="form-group">
    <div class="grid">
   		<div class="col-1-2">
	    	<h2 class="heading">Booking Activity</h2>
	    </div>
	    <div class="col-1-2">	
		    <div class="controls">
		      <input type="text" id="sub_total_price" value="0.00" class="floatLabel" name="sub_total_price" readonly>
	      	  <label class="active" for="sub_total_price"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;Sub Total Price</label>
		    </div>
		</div>
	</div>
    <input type="hidden" name="activity_id" value="<?php echo $activity_id ?>">
    <div class="grid">
	    <div class="col-1-2">
	      <div class="controls">
	        <input type="date" id="activitydate" id="txtDate" min="<?php echo date("Y-m-d"); ?>" class="floatLabel" name="activitydate" required>
	        <label for="activitydate" class="label-date active"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Activity Date</label>
	      </div>      
	    </div>
    </div>
      <div class="grid">
	    <div class="col-1-3 col-1-3-sm">
	      <div class="controls">
	        <i class="fas fa-sort-down"></i>
	        <select class="floatLabel" name="max_adults_activity" id="max_adults_activity">
	        	<option value="">---</option>
	        	<?php
				for($i = 0; $i <= $row['max_adults']; $i++){ ?>
				              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				              <?php
				          }
				?>
	        </select>
	        <label for="max_adults" class="active"><i class="fa fa-male"></i>&nbsp;&nbsp;Adults</label>
	      </div>      
	    </div>
	    <div class="col-1-3 col-1-3-sm">
	    <div class="controls">
	      <i class="fas fa-sort-down"></i>
	      <select class="floatLabel" name="max_children_activity" id="max_children_activity">
	      	<option value="">---</option>
	      	<?php
				for($i = 0; $i <= $row['max_children']; $i++){ ?>
				              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				              <?php
				          }
				?>
	      </select>
	      <label for="max_children" class="active"><i class="fas fa-baby"></i>&nbsp;&nbsp;Children</label>
	     </div>     
	    </div>
        <div class="col-1-3 col-1-3-sm">
	    <div class="controls">
	      <input type="text" id="activity_price" value="<?php echo $row['price']; ?>" class="floatLabel" name="activity_price" readonly>
      	  <label class="active" for="activity_price"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;Price / Person</label>
	    </div>     
	    </div>
     </div> 
     <div class="controls">
	      <input type="text" id="total_activity_price" value="0.00" class="floatLabel" name="total_activity_price" readonly>
      	  <label class="active" for="total_activity_price"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;Total Activity Price</label>
	    </div> 
  </div>

  <div class="form-group">
    <h2 class="heading">Booking & contact</h2>
    <input type="hidden" id="user_id" class="floatLabel" name="user_id" value="<?php echo $userRow['id']; ?>" required>
    <div class="controls">
      <input type="text" id="name" class="floatLabel" name="name" value="<?php echo $userRow['name']; ?>" required>
      <label class="active" for="name">Name<span class="text-danger ml-2">*</span></label>
    </div>
    <div class="controls">
      <input type="text" id="email" class="floatLabel" name="email" value="<?php echo $userRow['email']; ?>" required>
      <label class="active" for="email">Email<span class="text-danger ml-2">*</span></label>
    </div>       
    <div class="controls">
      <input type="tel" id="mobilenumber" class="floatLabel" name="mobilenumber" value="<?php echo $userRow['mobilenumber']; ?>" required>
      <label class="active" for="mobilenumber">Mobile Number<span class="text-danger ml-2">*</span></label>
    </div>
  		
    <div class="controls">
          <textarea name="address" class="floatLabel" id="address" required=""><?php echo $userRow['address']; ?></textarea>
          <label for="address" class="active">Address<span class="text-danger ml-2">*</span></label>
    </div>
        <div class="grid">
            <button name="ordernow" class="col-1-4">Submit</button>
      </div> 
  </div>
</form>
</div>
<?php }else{ ?>
		<div class="col-md-12"><h2 class="text-danger heading">Please Login For Booking </h2></div>
<?php } ?>
</div>
</div>
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
<script type="text/javascript">
$(function () { 
    $('#max_adults_activity').change(function () {
        var max_adults = this.value;
        max_children = $('#max_children_activity').val();
		activity_price = $('#activity_price').val();
		new_amount = +max_children + +max_adults;
        new_sub_total = activity_price * new_amount;
        $('#total_activity_price').val(parseFloat(new_sub_total).toFixed(2));
	    $('#sub_total_price').val(parseFloat(new_sub_total).toFixed(2));
    });

    $('#max_children_activity').change(function () {
        var max_children = this.value;
        max_adults = $('#max_adults_activity').val();
		activity_price = $('#activity_price').val();
		new_amount = +max_children + +max_adults;
        new_sub_total = activity_price * new_amount;
        $('#total_activity_price').val(parseFloat(new_sub_total).toFixed(2));
        $('#sub_total_price').val(parseFloat(new_sub_total).toFixed(2));
    });
});
</script>
	</body>
</html>
<?php 
if (isset($_POST['ordernow'])) {
$api = new Api("rzp_test_HD0IWnvel9MreS", "CnXZOeCQ7WTWcfnjFNmnxrQu");
$activity_id = $_POST['activity_id'];
$activity_name = $row['name'];
$activitydate = $_POST['activitydate'];
$max_adults_activity = $_POST['max_adults_activity'];
$max_children_activity = $_POST['max_children_activity'];
$activity_price = $_POST['activity_price'];
$total_activity_price = $_POST['total_activity_price'];
$sub_total_price = $_POST['sub_total_price'];
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobilenumber = $_POST['mobilenumber'];
$address = $_POST['address'];
$orderData = [
    'amount' => $sub_total_price * 100, // 2000 rupees in paise
    'currency' => 'INR',
    'payment_capture' => 1, // auto capture
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$data = [
    "key" => "rzp_test_HD0IWnvel9MreS",
    "amount" => $sub_total_price,
    "name" => "Capstone",
    "description" => "Booking At ".$activity_name,
    "prefill" => [
        "name" => $name,
        "email" => $email,
        "contact" => $mobilenumber,
    ],
    "theme" => [
        "color" => "#F78536",
    ],
    "order_id" => $razorpayOrderId,
];
$json = json_encode($data);
?>
<form action="paymentproccess.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>"
        data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-description="<?php echo $data['description'] ?>"
        data-prefill.name="<?php echo $data['prefill']['name'] ?>"
        data-prefill.email="<?php echo $data['prefill']['email'] ?>"
        data-prefill.contact="<?php echo $data['prefill']['contact'] ?>"
        data-order_id="<?php echo $data['order_id'] ?>">
    </script>
    <input type="hidden" name="hotel_id" value="">
    <input type="hidden" name="room_id" value="">
    <input type="hidden" name="checkin" value="">
    <input type="hidden" name="checkout" value="">
    <input type="hidden" name="room_number" value="">
    <input type="hidden" name="max_adults" value="">
    <input type="hidden" name="max_children" value="">
    <input type="hidden" name="room_price" value="">
    <input type="hidden" name="total_room_price" value="">
    <input type="hidden" name="activity_id" value="<?php echo $activity_id ?>">
    <input type="hidden" name="activitydate" value="<?php echo $activitydate ?>">
    <input type="hidden" name="max_adults_activity" value="<?php echo $max_adults_activity ?>">
    <input type="hidden" name="max_children_activity" value="<?php echo $max_children_activity ?>">
    <input type="hidden" name="activity_price" value="<?php echo $activity_price ?>">
    <input type="hidden" name="total_activity_price" value="<?php echo $total_activity_price ?>">
    <input type="hidden" name="sub_total_price" value="<?php echo $sub_total_price ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
    <input type="hidden" name="name" value="<?php echo $name ?>">
    <input type="hidden" name="email" value="<?php echo $email?>">
    <input type="hidden" name="mobilenumber" value="<?php echo $mobilenumber ?>">
    <input type="hidden" name="address" value="<?php echo $address ?>">
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script>
$(window).on('load', function() {
   $('.razorpay-payment-button').hide();
    jQuery('.razorpay-payment-button').click();
});
</script>
<?php
}
?>