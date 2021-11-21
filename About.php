<?php
  session_start();
  include "php/ProjectEaseDB.php";
  include "php/user.php";
  $result;
  $row;
  $count;
  $sql;
  function sql_qry(){
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
  }
?>


<!doctype html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
</style>
  <link rel="icon" href="./assets/EASE_icon.png" type="image/gif" sizes="16x16">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/dialouge.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- <===================================> -->
  <title>
    <?php
      $q0="select TeamName from Teams where TeamID='";
      $q1="';";
      $sql = $q0.$_SESSION['TeamID'].$q1;
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);
      $_SESSION['TeamName']=$row[0];
      $count = mysqli_num_rows($result);
      echo $row[0];
    ?>
  </title>
  <!-- <===================================> -->
</head>

<body>
  <nav style="background-color: #2d4059;" class="navbar navbar-expand-lg navbar-dark">
    <a href="About.php">
      <img style="background-color: #fff; padding: 0; margin: 0; border-radius: 50%;" height="40px" width="40px" src="images/ProjectEase_icon.png" alt="">
      <button type="button" class="btn btn-light">ProjectEase</button>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="justify-content-center collapse navbar-collapse" id="navbarSupportedContent">

      <div class="navbar-sizing">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link active" href="About.php">ABOUT<span class="sr-only">(current)</span></a>
          </li>
          <li class="btn-logout nav-item">
            <a class="nav-link" href="Code.php">CODE<span class="sr-only">(current)</span></a>
          </li>
          <li class=" btn-logout nav-item">
            <a class="nav-link" href="GUI.php">GUI</a>
          </li>
          <li class=" btn-logout nav-item">
            <a class="nav-link" href="Timeline.php">TIMELINE</a>
          </li>
          <li class="btn-logout nav-item">
            <a class="nav-link" href="Chat.php">CHAT</a>
          </li>
          <li class="btn-logout nav-item">
            <a class="nav-link active" href="">|</a>
          </li>
          <li class="btn-logout  nav-item">
            <a class="nav-link active" href="">
              <!-- <=====================================================> -->
              Welcome,
              <?php
                  echo $_SESSION['username'];
                ?>
              <!-- <===========================================================> -->
            </a>
          </li>
          <!-- <li class="btn-logout nav-item"> -->
            <button class="logout-link btn-logout btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
          <!-- </li> -->

        </ul>
      </div>
    </div>
  </nav>

  <div class="team-name">
    <h1 style="text-align: center; margin: 0% 0% 2%; padding-top: 2%;">
      <!-- <=====================================================> -->
      <?php
          $q = "select ProjectName from About where TeamID = '";
          $sql=$q.$_SESSION['TeamID']."'";
          $result = mysqli_query($con, $sql);
          $row=mysqli_fetch_array($result);
          $_SESSION['ProjectName']=$row[0];
          echo $row[0];
        ?>
      <!-- <=====================================================> -->
    </h1>
    <h4 style="text-align: center; padding-bottom: 5%;">
      <!-- <=====================================================> -->
      <?php
          echo $_SESSION['TeamName'];
          echo " - ";
          echo $_SESSION['TeamID'];
       ?>
      <!-- <=====================================================> -->
    </h4>
  </div>

  <div style="text-align: center;" class="tm-heading">
    <!-- <h3>Team Members</h3> -->
  </div>
  <div class="mx-md-n5 row">
    <!-- <=====================================================> -->
    <?php
    $q0="select Name from student where TeamID='";
    $q1="';";
    $sql = $q0.$_SESSION['TeamID'].$q1;
    $result = mysqli_query($con, $sql);

    $q0="select EnrollNo from student where TeamID='";
    $q1="';";
    $sql = $q0.$_SESSION['TeamID'].$q1;
    $result0 = mysqli_query($con, $sql);

    $count = mysqli_num_rows($result);
    for($i=0; $i<$count; $i++){
      $row = mysqli_fetch_array($result);
      $row0 = mysqli_fetch_array($result0);
      echo ' <div class="col px-md-5"> ';
        echo '<div class="card">';
          echo "<h5>".$row[0]."</h5>";
          echo "<p>".$row0[0]."</p>";
        echo "</div>";
      echo "</div>";
    }
     ?>
    <!-- <=====================================================> -->
</div>

<hr class="hr-rule">

<div class="about">
    <img height="50%" width="30%" src="images/build.png" alt="an image will come here">
    <div class="about-cont">
      <!-- <=====================================================> -->
      <?php
          $sql = "select prob_stat from About where TeamID = '".$_SESSION['TeamID']."'";
          $result = mysqli_query($con, $sql);
          if($result){
            $row = mysqli_fetch_array($result);
            echo $row[0];
          }
          else{
            echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
          }
      ?>
      <!-- <=====================================================> -->
    </div>
</div>

<div style="width: 100%; margin-bottom: 5%;" class="load-more-btn-div">
  <button style="margin-left: 47%;" type="button" class="load-more-btn btn btn-outline-primary">Load More</button>
</div>

<div class="load-more" hidden>
  <?php
    $sql = "select * from About where TeamID = '".$_SESSION['TeamID']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $heading = ['Resources Required', 'Target Audience', 'Outcome', 'Innovation', 'Risk Analysis', 'Terms and Conditions'];
    for($i=3; $i<=8; $i++){
      echo '<div class="load-more-container">';
      echo '<div class="load-more-heading">'.$heading[$i-3].'</div>';
      echo "<hr width='80px' />";
      echo '<div class="load-more-content">'.$row[$i].'</div>';
      echo '</div>';
      // echo '<hr style="width: 5%; margin-left: 47.5%;" class="hr-rule">';
    }
  ?>
  <div style="margin-bottom: 5%;" class="load-less">
    <button style="margin-left: 47%;" type="button" class="load-less-btn btn btn-outline-primary">Load More</button>
  </div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
