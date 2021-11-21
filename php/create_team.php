<?php
session_start();
include "ProjectEaseDB.php";
include "user.php";
  $TI = $_POST['TeamID'];
  $_SESSION['TeamID']=$TI;
  $PN = $_POST['ProjectName'];  #About
  $TN = $_POST['TeamName'];     # Teams
  $TI = $_POST['TeamID'];       # Teams
  $I = $_POST['Introduction'];
  $PS = $_POST['ProblemStatement'];
  $RR = $_POST['ResourcesRequired'];
  $TA = $_POST['TargetAud'];
  $O = $_POST['Outcome'];
  $Inno = $_POST['Innovation'];
  $RA = $_POST['RiskAny'];
  $TC = $_POST['TandC'];

  if($con){
    $sql="insert into Teams values('".$TI."', 'EB03','". $TN."', 'ECSE445L', '2019')";
    $result = mysqli_query($con, $sql);
    $sql="insert into About values('".$TI."', '".$PN."', '".$PS."', '".$RR."', '".$TA."', '".$O."', '".$Inno."', '".$RA."', '".$TC."')";
    $result = mysqli_query($con, $sql);
    $sql="update student set TeamID = $TI where student_email='";
    $sql = $sql.$_SESSION['userEmail']."'";
    $result = mysqli_query($con, $sql);
    echo 1;
  }
  else{
    echo -1;
  }
?>
