<?php
// include "ProjectEaseDB.php";
// include "user.php";
//
//   $statusMsg = '';
//   $targetDir = "GUI/";
//   $fileName = $_FILES["file"]["name"];     // disp;
//   $tempName = $_FILES["file"]["tmp_name"];
//   $targetFilePath = $targetDir .$TeamID."_".$fileName;
//   $ref = $TeamID."_".$fileName;
//   $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//       $allowTypes = array('png','jpeg','jpg', 'gif');
//       if(in_array($fileType, $allowTypes)){
//           // Upload file to server
//           if(move_uploaded_file($tempName, $targetFilePath)){
//               // Insert image file name into database
//               $sql="INSERT into GUI (TeamID, name) VALUES ('$TeamID', '$ref')";
//               $insert = $con->query($sql);
//               if($insert){
//                   $statusMsg = $ref;
//               }else{
//                   $statusMsg = "File upload failed, please try again.";
//               }
//           }else{
//               $statusMsg = "failed to connect to the database";
//           }
//       }else{
//           $statusMsg = "you have entered a non supported file format";
//       }
//   echo $statusMsg;
//   ob_end_flush();
session_start();
include "ProjectEaseDB.php";
include "user.php";

  $statusMsg = '';
  $targetDir = "GUI/";
  $fileName = $_FILES["file"]["name"];     // disp;
  $tempName = $_FILES["file"]["tmp_name"];
  $targetFilePath = $targetDir .$_SESSION['TeamID']."_".$fileName;
  $ref = $_SESSION['TeamID']."_".$fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      $allowTypes = array('png','jpeg','jpg', 'gif');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($tempName, $targetFilePath)){
              // Insert image file name into database
              $sql="INSERT into GUI (TeamID, name) VALUES ('".$_SESSION['TeamID']."', '$ref')";
              $insert = $con->query($sql);
              if($insert){
                  $statusMsg = $ref;
              }else{
                  $statusMsg = "File upload failed, please try again.";
              }
          }else{
              $statusMsg = "failed to connect to the database";
          }
      }else{
          $statusMsg = "you have entered a non supported file format";
      }
  echo $statusMsg;
  ob_end_flush();
?>
