<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $_SESSION['user_id'] = $user_id;
// Fetch all data without pagination
$query = "SELECT `test_date` , `subject`, `accuracy` FROM `typing_test_result` WHERE `user_id` = '$_SESSION[user_id]'";
$query_res = $conn->query($query);

$response = array();
if ($query_res->num_rows > 0) {
    while ($query_row = $query_res->fetch_assoc()) {

        $temp_ans = array(
            "date" => $query_row["test_date"],
            "subject" => $query_row["subject"],
            "accuracy" => $query_row["accuracy"],
        );
        array_push($response, $temp_ans);
    }
}

echo json_encode(['data' => $response]);
?>
