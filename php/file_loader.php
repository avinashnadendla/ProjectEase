<?php
session_start();
include "ProjectEaseDB.php";
include "user.php";
$code = $_POST['text'];
$filename = "php/uploads/".$_SESSION['TeamID']."_".$code;
// $file = fopen("uploads/$filename");
// $Code=array();
// while (!feof($filename))
// {
// 	$getTextLine = fgets($filename);
// 	array_push($Code, $getTextLine);
// }
 echo $filename;
// fclose($open);
// $sql="select TeamName from Teams where TeamID= '$code'  ";
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result);
// $count = mysqli_num_rows($result);
// if($count==0){
//   echo "Enter a correct team code or Team does not exist";
// }
// else{
//   $sql0 = " UPDATE student SET TeamID = '$code' WHERE EnrollNo = '$userID' ";
//   $result = mysqli_query($con, $sql0);
//   $TeamID=$code;
//   echo('you are successfully added in the team!');
// }
?>
