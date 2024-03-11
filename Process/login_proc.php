<?php 
session_start();

include '../connection.php';
include '../Logging/logerror.php';

$username = $_POST['username'];
$userpass = $_POST['password'];

error_log("WORKING");
error_log($username . " , " . $userpass);

if (!empty($username) && !empty($userpass)) {
	$get_user = "SELECT * FROM `user` WHERE `username` = '$username';";
	error_log("USER-> " . $get_user);
	
	$get_user_row = mysqli_query($conn, $get_user);
	if ($get_user_row->num_rows > 0) {
		$get_user_res = $get_user_row->fetch_assoc();
		$password = $get_user_res['password'];

		if ($userpass == $password) {
			error_log("MATCH FOUND");
			echo json_encode("success");

			$_SESSION["user_id"] = $get_user_res['id'];
        	$_SESSION["username"] = $username;
        	

		}else{
			echo json_encode("fail");	
		}
	}else{
		echo json_encode("fail");
	}
}

//echo json_encode("success");

?>