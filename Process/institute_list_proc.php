<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get total number of records
$totalQuery = "SELECT COUNT(*) FROM `institute_master`";
$totalResult = $conn->query($totalQuery);
$totalRecords = $totalResult->fetch_array()[0];

// Fetch all data without pagination
$query = "SELECT * FROM `institute_master` ";
$query_res = $conn->query($query);

$response = array();
if ($query_res->num_rows > 0) {
    while ($query_row = $query_res->fetch_assoc()) {

        $temp_ans = array(
            "Institute_name" => $query_row["institute_name"],
            "Institute_code" => $query_row["institute_code"],
            "Institute_mobile" => $query_row["institute_contact"],
            "Institute_email" => $query_row["institute_email"],
            "Institute_city" => $query_row["institute_city"],
            "Institute_address" => $query_row["institute_address"],
            "Institute_certificate" => $query_row["institute_certificate"],

        );
        array_push($response, $temp_ans);
    }
}

echo json_encode(['data' => $response, 'totalRecords' => $totalRecords]);
?>
