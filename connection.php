<?php

    $host_name = "localhost";
    $database_name = "typing_test";
    $database_user = "root";
    $database_password = "root";
    $port="3306";

    try
    {
    $dbh = new PDO("mysql:host=".$host_name.";port=".$port.";dbname=".$database_name,$database_user,$database_password);
    }
    catch (PDOException $e)
    {
    exit("Error: " . $e->getMessage());
    }
    $conn = mysqli_connect($host_name, $database_user, $database_password, $database_name,$port);

    $GLOBALS['conn'] = $conn;

    // if (!$conn) {
    //   error_log("Failed to connect to mysqli:" . mysqli_connect_errno());
    // }else{
    //   error_log("SUCCESS CONNECTIOM");
    // }

?>