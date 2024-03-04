<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// query ti insert 

$response = array();
 $query = "SELECT * FROM `user_master` WHERE `user_role` = 'STU'";
 $query_res = $conn->query($query);
 if($query_res->num_rows > 0){
    while($query_row = $query_res->fetch_assoc()) {
        $temp_ans = array("name" => $query_row["user_name"], "mobile" => $query_row["user_mobile"], "email" => $query_row["user_email"]);
        array_push($response, $temp_ans);
    }
 }

echo json_encode($response);
?>