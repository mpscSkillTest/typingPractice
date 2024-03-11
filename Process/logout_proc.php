<?php
session_start(); // Start the session


include '../Logging/logerror.php';

// Clear all session variables
// $_SESSION = array();

// Destroy the session
session_destroy();

// Set a success message
$_SESSION['logout_message'] = "You have been successfully logged out.";
error_log("MY MSG-> " . $_SESSION['logout_message']);

echo json_encode('logout');
exit();
?>
