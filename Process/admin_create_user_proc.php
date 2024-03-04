<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';


$name = $_POST['user_name'];
$email = $_POST['user_email'];
$mobile = $_POST['user_mobile'];
$city = $_POST['user_city'];
$course = $_POST['course'];
$user_course = "";
if (!empty($course)) {
    $user_course = implode(",", $course);
}
$role = $_POST['user_role'];
$password = $_POST['user_password'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// query ti insert 

 $query = "INSERT INTO `user_master`(`user_name`, `user_email`, `user_mobile`, `user_city`, `user_course`, `user_role`,`user_pass`)
 VALUES ('$name','$email','$mobile','$city','$user_course','$role','$password')";


if (!$result = @mysqli_query($conn, $query)) {
    // main insert fails
    error_log("Exception:" . mysqli_error($conn));
    error_log("DETAIL Save: " . $query);
    exit(error_log(mysqli_error($conn)));
}
echo json_encode('success');
?>