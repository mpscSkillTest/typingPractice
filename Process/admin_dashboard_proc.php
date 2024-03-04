<?php
session_start();
include '../connection.php';
include '../Logging/logerror.php';
include '../CommonFunctions/functions.php';
error_log("text");
$institute_count = "SELECT COUNT(*) AS total_institute FROM `institute_master`";

$institute_count_res = $conn->query($institute_count);
$institute_count_row = $institute_count_res->fetch_assoc();

$student_count_monthly = 0; // Initialize it with a default value

if (date('j') === '1') {
    // Update monthly student count
    $year = date('Y');
    $month = date('n');

    $student_count_monthly_query = "INSERT INTO monthly_student_count (year, month, student_count)
                  SELECT '$year' AS year,
                         '$month' AS month,
                         COUNT(*) AS student_count_monthly
                  FROM user_master
                  WHERE user_role = 'STU'
                    AND reg_date >= DATE_FORMAT(NOW(), '%Y-%m-01')
                    AND reg_date < DATE_ADD(DATE_FORMAT(NOW(), '%Y-%m-01'), INTERVAL 1 MONTH)
                  ON DUPLICATE KEY UPDATE
                         student_count = VALUES(student_count)";

    $conn->query($student_count_monthly_query);
    $student_count_monthly = $conn->query($student_count_monthly_query)->fetch_assoc()['student_count_monthly'];
}

$monthly_count = isset($student_count_row['student_count_monthly']) ? $student_count_row['student_count_monthly'] : 0;

$response = array(
    "institute_count" => $institute_count_row['total_institute'],
    "monthly_count" => $monthly_count
);

echo json_encode($response);
?>