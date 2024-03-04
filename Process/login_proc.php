<?php 
session_start();

include '../connection.php';
include '../Logging/logerror.php';

session_unset();
    
// Destroy the session
session_destroy();

session_start();
$username = $_POST['username'];
$userpass = $_POST['password'];

error_log("WORKING");
error_log($username . " , " . $userpass);

if (!empty($username) && !empty($userpass)) {
	$get_user = "SELECT * FROM `user_master` WHERE `user_email` = '$username';";
	error_log("USER-> " . $get_user);
	
	$get_user_row = mysqli_query($conn, $get_user);
	if ($get_user_row->num_rows > 0) {
		$get_user_res = $get_user_row->fetch_assoc();
		$password = $get_user_res['user_pass'];

		if ($userpass == $password) {
			error_log("MATCH FOUND");

			$_SESSION["user_id"] = $get_user_res['user_id'];
        	$_SESSION["username"] = $get_user_res['user_name'];
			$_SESSION["user_role"] = $get_user_res['user_role'];
        	
            echo json_encode("success");
		}else{
			echo json_encode("fail");	
		}
	}else{
		echo json_encode("fail");
	}
}

//echo json_encode("success");

?>