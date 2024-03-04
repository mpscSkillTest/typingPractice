<?php
session_start();
include '../connection.php';
include '../Logging/logerror.php';


$keystroke = $_POST['keystroke'];
$accuracy = $_POST['accuracy'];
$numericValue = str_replace("%", "", $accuracy); // Remove the % sign
$floatValue = (float)$numericValue;
$subject = $_POST['subject'];

$currentDate = date('Y-m-d');

error_log("WORKING");
// error_log($keystroke . " , " . $accuracyCount);

if (!empty($keystroke) && !empty($accuracy)) {
    $save_data = "INSERT INTO `typing_test_result`(`user_id`, `subject`,`keystroke`, `accuracy`,`test_date`) VALUES ('". $_SESSION['user_id'] ."','". $subject ."','". $keystroke ."','". $floatValue ."','" . $currentDate . "')";
    error_log($save_data);
	error_log("USER-> " . $save_data);
    if (!$result = @mysqli_query($conn, $save_data)) {

        error_log("Exception:" . mysqli_error($conn));
        error_log("Failed to Execute the enquiry_query Examination Query::: " . $save_data);
        // rollback();
        exit(mysqli_error($conn));
    }else{
        error_log("SUCCESSFULLY INSERTED IN ENQUIRY");
        // $response = "Inserted SUCCESSFULLY";
        // echo json_encode($response);
    }
    echo json_encode("success");
}


?>