<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");
require 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

$api = new Api("rzp_test_HD0IWnvel9MreS", "CnXZOeCQ7WTWcfnjFNmnxrQu");

$hotel_id = $_POST['hotel_id'];
$hotel_name = $_POST['hotel_name'];
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

$orderData = [
    'amount' => $sub_total_price * 100, // 2000 rupees in paise
    'currency' => 'INR',
    'payment_capture' => 1, // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $sub_total_price = $orderData['amount'];


$data = [
    "key" => "rzp_test_HD0IWnvel9MreS",
    "amount" => $sub_total_price,
    "name" => "Capstone",
    "description" => "Booking At ".$hotel_name,
    "prefill" => [
        "name" => $name,
        "email" => $email,
        "contact" => $mobilenumber,
    ],
    "notes" => [
        "address" => "Hello World",
        "merchant_order_id" => "12312321",
    ],
    "theme" => [
        "color" => "#F78536",
    ],
    "order_id" => $razorpayOrderId,
];

$json = json_encode($data);

?>


<form action="verify.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>"
        data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-description="<?php echo $data['description'] ?>"
        data-prefill.name="<?php echo $data['prefill']['name'] ?>"
        data-prefill.email="<?php echo $data['prefill']['email'] ?>"
        data-prefill.contact="<?php echo $data['prefill']['contact'] ?>"
        data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') {?>
        data-display_amount="<?php echo $data['display_amount'] ?>" <?php }?> <?php if ($displayCurrency !== 'INR') {?>
        data-display_currency="<?php echo $data['display_currency'] ?>" <?php }?>>
    </script>
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