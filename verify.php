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

    // $razorpay_order_id = $_SESSION['razorpay_order_id'];
    // $razorpay_payment_id = $_POST['razorpay_payment_id'];
    // $email = $_SESSION['email'];
    // $price = $_SESSION['price'];

    // $sql = "INSERT INTO `orders` (`order_id`, `razorpay_payment_id`, `price`, `status`, `email`) VALUES ('$razorpay_order_id','$razorpay_payment_id', '$price', 'success', '$email')";

    // if (mysqli_query($con, $sql)) {
    //     echo "Payment Details  inserted to DB";
    // }

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;