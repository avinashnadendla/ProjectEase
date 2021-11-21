<?php
    include "user.php";
    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "id15169349_peamigos";
    $con = mysqli_connect($server, $username, $password,$database);
    // if(mysqli_connect_errno())
    // {
    //   echo "Failed to connect: " . mysqli_connect_errno();   // connection successfully created or not.
    // }
    // else
    // {
    //     echo "database connected";
    // }
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
 ?>
