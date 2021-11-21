<?php
    session_start();
    include "ProjectEaseDB.php";
    include "user.php";
    $sql=" 'select TeamName from Teams where EnrollNo=".$_SESSION['userID']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    echo $count;
?>
