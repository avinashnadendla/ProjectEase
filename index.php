<?php
  session_start();
  $server = "localhost";
  $Username = "root";
  $password = "root";
  $database = "id15169349_peamigos";
  $db = mysqli_connect($server, $Username, $password, $database);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ProjectEase</title>

    <!-- <=========================================STYLE=================================> -->
    <style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 }
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom {
  from{ bottom:-100px; opacity:0 }
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
  </head>
  <body>
<div id="loader"></div>
  <?php
    $q0 = "SELECT TeamID FROM student WHERE student_email ='";
    $q1 = "';";
    $sql = $q0.$_SESSION['userEmail'].$q1;
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($row[0]!='null')
    {
      $_SESSION['TeamID']=$row[0];
      header("Location:About.php");
      exit();
    }
    else {
      header("Location:teamDialouge.html");
    }
  ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="js/script.js" charset="utf-8"></script> -->
  </body>
</html>
