<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';


if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User ID not found in session"]);
    exit; // Stop script execution if user_id is not set
}

$currentDate = date('Y-m-d');
$user_limit = "SELECT COUNT(*) AS test_count FROM `typing_test_result` WHERE `user_id` = '" . $_SESSION['user_id'] . "' AND `test_date` = '" . $currentDate . "' ";
error_log($user_limit);
$user_limit_res = $conn->query($user_limit);
$user_limit_row = $user_limit_res->fetch_assoc();

$response = array();
$user_id = $_SESSION['user_id'];

// Prepare the query to select user's courses
$query = "SELECT user_course FROM `user_master` WHERE `user_id` = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    // Log error and return an error message if statement preparation fails
    error_log("Failed to prepare statement: " . $conn->error); // Assuming logError() function is defined in 'logerror.php'
    echo json_encode(["error" => "An error occurred while fetching courses"]);
 
}

// Bind parameters and execute the prepared statement
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results and populate response array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // $response[] = $row;
        $response = array(
            "message" => 'success',
            "data" => $row,
            "count" => $user_limit_row['test_count']
        );
    }
} else {
    // Optionally handle the case where no courses are found for the user
    $response = array(
        "messege" => 'empty'
    );
    // $response["message"] = "No courses found for the user";
}

// Send response as JSON
echo json_encode($response);

// Close statement and connection
$stmt->close();
?>