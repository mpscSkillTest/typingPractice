<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get total number of records
$totalQuery = "SELECT COUNT(*) FROM `user_master` WHERE `user_role` = 'STU'";
$totalResult = $conn->query($totalQuery);
$totalRecords = $totalResult->fetch_array()[0];

// Fetch all data without pagination
$query = "SELECT * FROM `user_master` WHERE `user_role` = 'STU'";
$query_res = $conn->query($query);

$response = array();
if ($query_res->num_rows > 0) {
    while ($query_row = $query_res->fetch_assoc()) {

        // Create a DateTime object from the reg_date field
        $regDateObj = new DateTime($query_row["reg_date"]);

        // Format the date to get only the date part (YYYY-MM-DD)
        $formattedDate = $regDateObj->format('d-m-Y');

        $temp_ans = array(
            "name" => $query_row["user_name"],
            "mobile" => $query_row["user_mobile"],
            "email" => $query_row["user_email"],
            "course" => $query_row["user_course"],
            "enrolled_date" => $formattedDate

        );
        array_push($response, $temp_ans);
    }
}

echo json_encode(['data' => $response, 'totalRecords' => $totalRecords]);
?>
