<?php
    session_start();
    include "ProjectEaseDB.php";
    $date = $_POST['date'];
    $content = $_POST['content'];
    $status = -1;
    $sql = "insert into timeline values('";
    $sql = $sql.$_SESSION['TeamID']."', '$date',";
    $sql = $sql.'"'.$content.'")';
    if($con){
      $result = mysqli_query($con, $sql);
      if($result){
        $status = 1;
      }
    }
    echo $status;
?>
