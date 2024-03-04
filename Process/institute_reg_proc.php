<?php
session_start();
include '../connection.php';
include '../Logging/logerror.php';
include '../CommonFunctions/functions.php';

error_log("Institute USER REGISTRATION");
error_log("MY DATA-> " . print_r($_REQUEST, true));

if (isset($_FILES["pdfFile"]["error"])== UPLOAD_ERR_OK) {
    $fileName = $_FILES["pdfFile"]["name"];
    // $fileType = $_FILES["pdfFile"]["type"];
    // $file_content = file_get_contents($_FILES["pdfFile"]["temp_name"]);

    
    error_log("hello"); 
    
    // error_log($fileType);
    // error_log($file_content);
}
echo json_encode('success')
// $repeat_user = array();
// $success_count = 0;
// $dupli_count = 0;

// // // Assuming you have the necessary POST data available
// $institute_name = $_POST['name_inp'];
// $institute_email = $_POST['email_inp'];
// $institute_mobile = $_POST['contact_inp'];
// $institute_city = $_POST['city_inp'];
// $institute_address = $_POST['address_inp'];
// $institute_code = $_POST['code_inp'];


// // for pdf files
// $uploadDirectory = "pdf_files/";  // Specify the directory where PDF files will be stored
// $institute_certificate = '';

// if (isset($_FILES["pdfFile"]["error"])== UPLOAD_ERR_OK) {
//     $file_content = file_get_contents($_FILES["pdfFile"]["temp_name"]);

//     // Check for duplicate user
//     $check_duplicate = getFieldFromTable('id', 'institute_master', 'institute_contact', $institute_mobile);
    
//     if (empty($check_duplicate)) {
//         // Insert new user
//         $sql_query = "INSERT INTO `institute_master`(`institute_name`, `institute_code`, `institute_email`, `institute_contact`, `institute_city`, `institute_address`, `institute_certificate`) 
//                       VALUES ('$institute_name','$institute_code','$institute_email','$institute_mobile','$institute_city','$institute_address', '$file_content')";
    
//         error_log("USER ENTRY-> " . $sql_query);
    
//         if (!$result = @mysqli_query($conn, $sql_query)) {
//             error_log("Exception:" . mysqli_error($conn));
//             error_log("Failed to Execute the enquiry_query Examination Query::: " . $sql_query);
//             rollback();
//             exit(mysqli_error($conn));
//         }
//         // $success_count++;
//         echo json_encode('success');
//     } else {
//         echo json_encode('dupli');
//     }

//     // $pdfFile = $_FILES["pdfFile"];
//     // $pdfFileType = strtolower(pathinfo($pdfFile["name"], PATHINFO_EXTENSION));
    
//     // if ($pdfFileType == "pdf") {
//     //     // Generate a unique filename to avoid overwriting existing files
//     //     $uniqueFilename = uniqid('pdf_', true) . '.' . $pdfFileType;
//     //     $destination = $uploadDirectory . $uniqueFilename;

//     //     if (move_uploaded_file($pdfFile["tmp_name"], $destination)) {
//     //         $institute_certificate = $destination;

//     //         // Insert data into the database
//     //         $sql_query = "INSERT INTO `institute_master`(`institute_certificate`) 
//     //                       VALUES ('$institute_certificate')";

//     //         if (!$result = @mysqli_query($conn, $sql_query)) {
//     //             error_log("Exception:" . mysqli_error($conn));
//     //             error_log("Failed to Execute the query: " . $sql_query);
//     //             rollback();
//     //             exit(mysqli_error($conn));
//     //         }

//     //         echo "File uploaded successfully and database updated.";
//     //     } else {
//     //         echo "Error uploading file.";
//     //     }
//     // } else {
//     //     echo "Invalid file format. Please upload a PDF.";
//     // }
// } 

// // ----------------------------

// // // // Check for duplicate user
// // $check_duplicate = getFieldFromTable('id', 'institute_master', 'institute_contact', $institute_mobile);

// // if (empty($check_duplicate)) {
// //     // Insert new user
// //     $sql_query = "INSERT INTO `institute_master`(`institute_name`, `institute_code`, `institute_email`, `institute_contact`, `institute_city`, `institute_address`, `institute_certificate`) 
// //                   VALUES ('$institute_name','$institute_code','$institute_email','$institute_mobile','$institute_city','$institute_address', '$institute_certificate')";

// //     error_log("USER ENTRY-> " . $sql_query);

// //     if (!$result = @mysqli_query($conn, $sql_query)) {
// //         error_log("Exception:" . mysqli_error($conn));
// //         error_log("Failed to Execute the enquiry_query Examination Query::: " . $sql_query);
// //         rollback();
// //         exit(mysqli_error($conn));
// //     }
// //     // $success_count++;
// //     echo json_encode('success');
// // } else {
// //     echo json_encode('dupli');
// // }

?>
