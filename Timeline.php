<?php
  session_start();
  include "php/ProjectEaseDB.php";
  include "php/user.php";
?>


<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="./assets/EASE_icon.png" type="image/gif" sizes="16x16">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/dialouge.css">
  <!-- __________ BOOTSTRAP CSS _________ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/Timeline.css">

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

</head>

<body>

  <!-- <===================================== NAVIGATION BAR ==========================> -->
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
            <a class="nav-link" href="GUI.php">GUI</a>
          </li>
          <li class=" btn-logout nav-item">
            <a class="nav-link active" href="Timeline.php">TIMELINE</a>
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


  <!-- <================================TIMELINE=============================>   -->
  <div class="white-line"></div>
  <div class="timeline">
    <?php
      $sql = "select date, content from timeline where TeamId = '".$_SESSION['TeamID']."'";
      $result = mysqli_query($con, $sql);
      $len = mysqli_num_rows($result);
      for($i=1; $i<=$len; $i++){
        $row = mysqli_fetch_array($result);
        $element = '<div class="Container ';
        if($i%2==0){
          $element=$element.'Right'.'">';
        }
        else{
          $element=$element.'Left'.'">';
        }
        echo $element;
        echo '<div class="Content">';
        echo '<h2>'.$row[0].'</h2>';
        echo '<p>'.$row[1].'</p>';
        echo '</div></div>';
      }
    ?>
  </div>

  <!-- <================================ TIMELINE ADDER ===========================> -->
  <div class="white-line"></div>
  <div style="width: 100%;" class="text-center">
    <button data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="border-radius: 50%; height: 65px; width: 65px;" class="timeline-adder" type="button" name="button">+</button>
  </div>


  <!-- <====================================== MODAL BODY ================================> -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Timeline Entry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Date:</label>
              <input type="text" class="timeline-date form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Content:</label>
              <textarea rows="15" class="timeline-content form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="close-modal btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="add-timeline btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>




  <!-- <===================================== SCRIPT LINKS =============================> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
  <script src="js/timeline.js"></script>
</body>

</html>
