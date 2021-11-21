<?php
  session_start();
  include "ProjectEaseDB.php";
  include "user.php";
  $code = $_POST['code'];
  $q0="update student set TeamID='$code' where EnrollNo='";
  $sql=$q0.$_SESSION['userID']."';";
  $result = mysqli_query($con, $sql);
?>
