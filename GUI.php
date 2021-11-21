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


<html lang="en">
<head>
  <link rel="icon" href="./assets/EASE_icon.png" type="image/gif" sizes="16x16">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/dialouge.css">
  <link rel="stylesheet" href="css/GUI.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- <==================================FONT LINK====================================> -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <!-- <===================================> -->
  <title>
    <?php
    $sql = "SELECT TeamName FROM Teams WHERE TeamID = '";
    $sql = $sql.$_SESSION['TeamID']."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
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
          <li class="nav-item">
            <a class="nav-link" href="About.php">ABOUT<span class="sr-only">(current)</span></a>
          </li>
          <li class="btn-logout nav-item">
            <a class="nav-link" href="Code.php">CODE<span class="sr-only">(current)</span></a>
          </li>
          <li class=" btn-logout nav-item">
            <a class="nav-link active" href="GUI.php">GUI</a>
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


<!-- <=================================IMAGE GALLERY==============================> -->
  <div class="courousel-container">
    <div class="mt-5 ml-5 mr-5">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $sql = "SELECT name FROM GUI WHERE TeamID = '".$_SESSION['TeamID']."'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    for($i=0; $i<$count; $i++){
      echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
    }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
    $sql = "SELECT name FROM GUI WHERE TeamID = '";
    $sql = $sql.$_SESSION['TeamID']."'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    echo "<div class='carousel-item active'>";
    echo "<img height='90%' class='d-block w-100' ";
    if($count==0)
    {
      echo"src='images/stars.jpg'";
    }
    else
    {
      echo"src='php/GUI/";
      echo $row[0]."'";
    }
    echo "alt=slide>";
    echo "</div>";
    for($i=1; $i<$count; $i++){
      $row = mysqli_fetch_array($result);
      echo "<div class='carousel-item'>";
      echo "<img height='90%' class='d-block w-100' src='php/GUI/";
      echo $row[0]."'";
      echo "alt=slide>";
      echo "</div>";
    }
    ?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
  </div>

<!-- <============================================IMAGE UPLOAD====================================> -->
<?php
  if($_SESSION['userType']=='student'){
    echo '<div class="image-upload">';
    echo '<div style="display: flex;" class="upload">';
    echo '<input class="choosen-file" type="text" name="" value="" disabled>';
    echo '<button class="file-chs-btn btn btn-primary btn-lg" type="button" name="button">choose file</button>';
    echo '</div>';
    echo '<form class="uploadformGUI" action="php/GUI_upload.php" method="post" enctype="multipart/form-data" >';
    echo '<input id="upload-input" name="file" class="file-chs" type="file" style="display: none;"> <br>';
    echo '<button class="upload-btn btn btn-success btn-lg" type="submit" name="upd-btn">upload</button>';
    echo '</form>';
    echo '</div>';
  }
?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/GUI.js" type="text/javascript">

</script>
</body>

</html>
