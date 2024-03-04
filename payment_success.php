<?php
session_start();
include 'connection.php';
include 'Logging/logerror.php';
require 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

$api = new Api('rzp_test_FTcWVtO6GaHFlO', 'u7TCiEzVMJZXR5P3iTnqSNSl');

error_log("FROM PAYMENT SUCCESS");

// Extract the data received from the frontend
$data = json_decode(file_get_contents('php://input'), true);
$paymentId = $_POST['payment_id'];
$amount = intval($_POST['amount']); // Ensure this amount is in the smallest currency unit and is the same as the authorized amount
$payment_date = date('Y-m-d');
$user_name = $_POST['name_inp'];
$user_mobile = $_POST['contact_inp'];
$user_city = $_POST['city_inp'];
$user_course = $_POST['selectedSubjects'];
$user_gender =$_POST['gen_inp'];

error_log("user_course " .print_r($user_course,true));



// print_r($data , $paymentId ,$payment_date ,$amount);

error_log("PAYMENT ID VAR-> " . print_r($paymentId, true));

try {
    // Fetch the payment details
    $payment = $api->payment->fetch($paymentId);
    // Perform the capture operation
    $captureResponse = $api->payment->fetch($paymentId)->capture(array('amount' => $amount));
    // After capturing, you can check the payment status again, though capture() should throw an exception if unsuccessful
    if ($captureResponse->status == 'captured') {
        $user_id = $_SESSION['user_id'];
        // Payment was successfully captured
        $save_data = "INSERT INTO payment_master (payment_id, user_id, payment_date, total_price) 
        VALUES ('$paymentId','$user_id','$payment_date','$amount')";
        error_log($save_data);
        error_log("USER-> " . $save_data);
        if (!$result = @mysqli_query($conn, $save_data)) {

            error_log("Exception:" . mysqli_error($conn));
            error_log("Failed to Execute the enquiry_query Examination Query::: " . $save_data);
            // rollback();
            exit(mysqli_error($conn));
        } else {
            error_log("SUCCESSFULLY INSERTED IN ENQUIRY");
            $response = "Inserted SUCCESSFULLY";
            // echo json_encode($response);
            // update query to update user master after payment successfull 
            // Update query example

            $update_query = "UPDATE user_master  SET user_name = '$user_name' , user_mobile = '$user_mobile' , user_city = '$user_city', user_gender='$user_gender' , user_course = '$user_course' , user_status = 'active' WHERE user_id = '$user_id'";
            if (!$update_result = @mysqli_query($conn, $update_query)) {
                error_log("Update failed:" . mysqli_error($conn));
                // Handle update failure
            } else {
                error_log("Successfully updated");
                // Additional success handling
            }
        }
        // Here, update your database accordingly
        // For example, mark an order as paid, update user subscription, etc.
        echo json_encode(['success' => true, 'message' => 'Payment successful and verified.']);
    } else {
        // In practice, successful capture should already be handled above.
        // This else block can serve as additional verification or logging.
        echo json_encode(['success' => false, 'message' => 'Payment captured but verification failed.', 'msg' => $captureResponse->status]);
    }
} catch (\Exception $e) {
    // Handle errors, such as payment not found or capture failure
    echo json_encode(['success' => false, 'message' => 'Error verifying or capturing payment: ' . $e->getMessage()]);
}

?>