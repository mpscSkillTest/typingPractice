<?php
session_start();
include '../connection.php';
include '../Logging/logerror.php';
include '../CommonFunctions/functions.php';

error_log("Single USER REGISTRATION");
error_log("MY DATA-> " . print_r($_REQUEST, true));

// $repeat_user = array();
// $success_count = 0;
// $dupli_count = 0;

// // Assuming you have the necessary POST data available
$user_name = $_POST['name_inp'];
$user_gender = $_POST['gen_inp'];
$user_email = $_POST['email_inp'];
$user_mobile = $_POST['contact_inp'];
$user_city = $_POST['city_inp'];
$user_course = $_POST['selectedSubjects'];
$user_password = $_POST['pass_inp'];

// // Check for duplicate user
$check_duplicate = getFieldFromTable('user_id', 'user_master', 'user_mobile', $user_mobile);

if (empty($check_duplicate)) {
    // Insert new user
    $sql_query = "INSERT INTO `user_master`(`user_name`, `user_gender`, `user_email`, `user_mobile`, `user_city`, `user_course`, `user_role`, `user_pass`) 
                  VALUES ('$user_name','$user_gender','$user_email','$user_mobile','$user_city','$user_course','STU','$user_password')";

    error_log("USER ENTRY-> " . $sql_query);

    if (!$result = @mysqli_query($conn, $sql_query)) {
        error_log("Exception:" . mysqli_error($conn));
        error_log("Failed to Execute the enquiry_query Examination Query::: " . $sql_query);
        rollback();
        exit(mysqli_error($conn));
    }
    // $success_count++;
    echo json_encode('success');
} else {
    echo json_encode('dupli');
}

// $response = array(
//     "status" => "success",
//     "success_entry" => $success_count,
//     "duplicate" => $dupli_count,
//     "duplicate_number" => $repeat_user
// );

// echo json_encode('success');
?>
