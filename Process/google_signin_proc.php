<?php 
session_start();
// Load the database configuration file
include '../connection.php';
include '../Logging/logerror.php';
include '../CommonFunctions/functions.php';
 
error_log("SIGNUP PROCESS");

// Clear all session variables
session_unset();
    
// Destroy the session
session_destroy();

session_start();
// // Retrieve JSON from POST body 
// // $jsonStr = file_get_contents('php://input'); 
// // $jsonObj = json_decode($jsonStr); 
 
// if (!empty($_POST['request_type']) && $_POST['request_type'] == 'user_auth') {
//     $credential = !empty($_POST['credential']) ? $_POST['credential'] : '';
    
//     error_log("CRENDTIALALAA-> " . $credential);
//     // Decode response payload from JWT token
    
//     $lister = explode(".", $credential);

//     error_log("huh-> " . print_r($lister,true));
//     list($header, $payload, $signature) = explode (".", $credential); 
//     $responsePayload = json_decode(base64_decode($payload)); 

//     error_log("PAY LOAD-> " . $responsePayload);
 
//     if(!empty($responsePayload)){ 
//         // The user's profile info 
//         $oauth_provider = 'google'; 
//         $oauth_uid  = !empty($responsePayload->sub)?$responsePayload->sub:''; 
//         $first_name = !empty($responsePayload->given_name)?$responsePayload->given_name:''; 
//         $last_name  = !empty($responsePayload->family_name)?$responsePayload->family_name:''; 
//         $email      = !empty($responsePayload->email)?$responsePayload->email:''; 
//         $picture    = !empty($responsePayload->picture)?$responsePayload->picture:''; 
 
//         // Check whether the user data already exist in the database 
//         $exists = "SELECT `google_id` FROM `user_master` WHERE `google_id` = '" . $google_id . "' ";
//         $exists_res = $conn->query($exists);

//         if($exists_res-> num_rows > 0){
//             $_SESSION['login_id'] = $google_id;
//             // Indicate that the user already exists
//             echo json_encode(['status' => 'success', 'user_type' => 'existing', 'message' => 'User logged in successfully']);
//         }else{
//             $new_user = " INSERT INTO `user_master`(`google_id`, `user_name`, `user_email`) VALUES('" . $google_id . "', '" . $full_name . "', '" . $email . "') ";
//             if (!$result = @mysqli_query($conn, $new_user)) {
//                 error_log("Exception:" . mysqli_error($conn));
//                 error_log("Failed to Execute the enquiry_query Examination Query::: " . $new_user);
//                 // rollback();
//                 // exit(mysqli_error($conn));
//                 echo json_encode(['status' => 'error', 'message' => 'Sign up failed! (Something went wrong).']);
//             }else{
//                 echo json_encode(['status' => 'success', 'user_type' => 'new', 'message' => 'User registered successfully']);
//             }
//         } 
         
//         $output = [ 
//             'status' => 1, 
//             'msg' => 'Account data inserted successfully!', 
//             'pdata' => $responsePayload 
//         ]; 
//         echo json_encode($output); 
//     }else{ 
//         echo json_encode(['error' => 'Account data is not available!']); 
//     } 
// } 
 
// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 
 
if(!empty($jsonObj->request_type) && $jsonObj->request_type == 'user_auth'){ 
    $credential = !empty($jsonObj->credential)?$jsonObj->credential:''; 
 
    // Decode response payload from JWT token 
    list($header, $payload, $signature) = explode (".", $credential); 
    $responsePayload = json_decode(base64_decode($payload)); 
 
    if(!empty($responsePayload)){ 
        // The user's profile info 
        $oauth_provider = 'google'; 
        $oauth_uid  = !empty($responsePayload->sub)?$responsePayload->sub:''; 
        $first_name = !empty($responsePayload->given_name)?$responsePayload->given_name:''; 
        $last_name  = !empty($responsePayload->family_name)?$responsePayload->family_name:''; 
        $email      = !empty($responsePayload->email)?$responsePayload->email:''; 
        $picture    = !empty($responsePayload->picture)?$responsePayload->picture:''; 
 
        // Check whether the user data already exist in the database 
        $query = "SELECT `google_id` FROM `user_master` WHERE `google_id` = '" . $oauth_uid . "' "; 
        error_log("Google Signup-> " . $query);
        $exists_res = $conn->query($query); 
         
        if($exists_res-> num_rows > 0){
            error_log("EXISTING USER");
            $_SESSION['user_id'] = getFieldFromTable('user_id','user_master','google_id', $oauth_uid);
            $user_status = getFieldFromTable('user_status','user_master','google_id', $oauth_uid);
            $_SESSION['login_id'] = $oauth_uid;
            $_SESSION['username'] = $first_name;
            $_SESSION['user_status'] = $user_status;
            $_SESSION['user_role'] = getFieldFromTable('user_role','user_master','google_id', $oauth_uid);
            // Indicate that the user already exists
            
            error_log("STATUS-> " . print_r($_SESSION,true));
            echo json_encode(['status' => 'success', 'user_type' => 'existing','current_status'=> $user_status, 'message' => 'User logged in successfully']);
        }else{
            error_log("NEW USER");
            $new_user = " INSERT INTO `user_master`(`google_id`, `user_name`, `user_email`) VALUES('" . $oauth_uid . "', '" . $first_name . "', '" . $email . "') ";
            if (!$result = @mysqli_query($conn, $new_user)) {
                error_log("Exception:" . mysqli_error($conn));
                error_log("Failed to Execute the enquiry_query Examination Query::: " . $new_user);
                // rollback();
                // exit(mysqli_error($conn));
                echo json_encode(['status' => 'error', 'message' => 'Sign up failed! (Something went wrong).']);
            }else{
                $user_status = getFieldFromTable('user_status','user_master','google_id', $oauth_uid);
                echo json_encode(['status' => 'success', 'user_type' => 'new', 'current_status' => $user_status, 'message' => 'User registered successfully']);
            }
        }
         
        // $output = [ 
        //     'status' => 1, 
        //     'msg' => 'Account data inserted successfully!', 
        //     'pdata' => $responsePayload 
        // ]; 
        // echo json_encode($output); 
    }else{ 
        echo json_encode(['error' => 'Account data is not available!']); 
    } 
} 

?>