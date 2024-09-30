<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");

require 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api("rzp_test_HD0IWnvel9MreS", "CnXZOeCQ7WTWcfnjFNmnxrQu");

    try
    {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature'],
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
$hotel_id = $_POST['hotel_id'];
$room_id = $_POST['room_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room_number = $_POST['room_number'];
$max_adults = $_POST['max_adults'];
$max_children = $_POST['max_children'];
$room_price = $_POST['room_price'];
$total_room_price = $_POST['total_room_price'];
$activity_id = $_POST['activity_id'];
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
$razorpay_order_id = $_SESSION['razorpay_order_id'];
$razorpay_payment_id = $_POST['razorpay_payment_id'];


    $sql = "INSERT INTO `tbl_bookings` (`razorpay_order_id`, `razorpay_payment_id`, `hotel_id`, `room_id`, `checkin`, `checkout`, `room_number`, `total_room_price`, `activity_id`, `activitydate`, `max_adults_activity`,`max_children_activity`, `activity_price`, `total_activity_price`, `sub_total_price`, `user_id`, `name`, `email`, `mobilenumber`, `address`, `max_adults`, `max_children`) VALUES ('$razorpay_order_id','$razorpay_payment_id', '$hotel_id', '$room_id', '$checkin','$checkout','$room_number', '$total_room_price', '$activity_id', '$activitydate', '$max_adults_activity','$max_children_activity','$activity_price', '$total_activity_price', '$sub_total_price', '$user_id','$name','$email', '$mobilenumber', '$address', '$max_adults', '$max_children')";

    if (mysqli_query($conn, $sql)) {
        $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    }

} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
 <?php
include('include/head.php');
?>
  <link href="admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/login-form.css">
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
		                    <h1 itemprop="name">VERIFY PAYMENT</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Verify Payment</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>

<div class="global-container">
  <div class="card login-form">
  <div class="card-body">
<?php
echo $html;
?> 
</div>
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
</body>
</html>
