<?php
  session_start();
  include "ProjectEaseDB.php";
  include "user.php";
  $text = $_POST['text'];
  $sql="select TeamName from Teams where TeamID= '$text'  ";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);
  if($count==0){
    echo "You have entered wrong code or team does not exist !";
  }
  else{
    echo "Are you sure you want to join ".$row[0]." !";
  }
?>
