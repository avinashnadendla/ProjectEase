<?php
session_start();
include "ProjectEaseDB.php";
include "user.php";

  //   // name of the uploaded file
  //   $filename = $_FILES['myfile']['name'];
  //
  //   // destination of the file on the server
  //   $destination = "uploads/".$filename;
  //
  //   // get the file extension
  //   $extension = pathinfo($filename, PATHINFO_EXTENSION);
  //
  //   // the physical file on a temporary uploads directory on the server
  //   $file = $_FILES['myfile']['tmp_name'];
  //   $size = $_FILES['myfile']['size'];
  //
  //   if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
  //       echo "You file extension must be .zip, .pdf or .docx";
  //   } elseif ($_FILES['myfile']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
  //       echo "File too large!";
  //   } else {
  //       // move the uploaded (temporary) file to the specified destination
  //       if (move_uploaded_file($file, $destination)) {
  //           // $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
  //           // if (mysqli_query($con, $sql)) {
  //               echo "File uploaded successfully";
  //           // }
  //       } else {
  //           echo "Failed to upload file.";
  //       }
  //   }
  //
  // // echo "connection is success";
  //
  $statusMsg = '';
  $targetDir = "uploads/";
  $fileName = $_FILES["file"]["name"];     // disp;
  $tempName = $_FILES["file"]["tmp_name"];
  $targetFilePath = $targetDir .$_SESSION['TeamID']."_".$fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      $allowTypes = array('rar','txt','zip','pdf', 'doc', 'docx', 'py', 'java', 'cpp', 'js', 'css', 'html', 'php');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($tempName, $targetFilePath)){
              // Insert image file name into database
              $sql="INSERT into project_files (TeamID, name, ext) VALUES ('".$_SESSION['TeamID']."', '$fileName', '$fileType')";
              $insert = $con->query($sql);
              if($insert){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
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
