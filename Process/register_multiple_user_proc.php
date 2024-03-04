<?php
session_start();

include '../connection.php';
include '../Logging/logerror.php';
include '../CommonFunctions/functions.php';

error_log("MULTIPLE USER REGISTRATION");
error_log("MY DATA-> " . print_r($_REQUEST, true));

$total_rows = $_POST['field_count'];
$repeat_user = array();
$success_count = 0;
$dupli_count = 0;
for ($i=1; $i <= $total_rows ; $i++) { 
    
    $check_duplicate = getFieldFromTable('user_id', 'user_master','user_mobile',$_POST['contact_inp'.$i]);
    error_log("DUPLICATE CHECJ-> " . $check_duplicate);

    if(empty($check_duplicate)){
        $sql_query = "INSERT INTO `user_master`(`user_name`,`user_gender`, `user_email`, `user_mobile`, `user_city`, `user_course`, `user_role`, `user_pass`) VALUES ('". $_POST['name_inp'.$i] ."','". $_POST['gen_inp'.$i] ."','". $_POST['email_inp'.$i] ."','". $_POST['contact_inp'.$i] ."','". $_POST['city_inp'.$i] ."','". $_POST['sub_inp'.$i] ."','STU','". $_POST['pass_inp'.$i] ."')";

        error_log("USER ENTRY-> " . $sql_query);

        if (!$result = @mysqli_query($conn, $sql_query)) {
                   
            error_log("Exception:" . mysqli_error($conn));
            error_log("Failed to Execute the enquiry_query Examination Query::: " . $sql_query);
            rollback();
            exit(mysqli_error($conn));
        }
        $success_count++;
    }else{
        array_push($repeat_user,$_POST['contact_inp'.$i]);
        $dupli_count++;
    }
    
}

$response = array(

    "status" => "success",
    "success_entry" => $success_count,
    "duplicate" => $dupli_count,
    "duplicate_number" => $repeat_user
);

echo json_encode($response);
?>