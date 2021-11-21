<?php
  session_start();
  include "php/ProjectEaseDB.php";
  include "php/user.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- <======================================================> -->
    <!-- link to code editor css and js -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/dialouge.css">
    <link rel="stylesheet" href="css/code.css">
    <link rel="stylesheet" href="codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="codemirror/theme/dracula.css">
    <script src="codemirror/lib/codemirror.js" charset="utf-8"></script>
    <script src="codemirror/mode/xml/xml.js" charset="utf-8"></script>
    <script src="codemirror/mode/php/php.js" charset="utf-8"></script>
    <script src="codemirror/mode/sql/sql.js" charset="utf-8"></script>
    <script src="codemirror/mode/javascript/javascript.js" charset="utf-8"></script>
    <script src="codemirror/mode/python/python.js" charset="utf-8"></script>
    <script src="codemirror/mode/clike/clike.js" charset="utf-8"></script>
    <!-- <======================================================> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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

    <link rel="icon" href="./assets/EASE_icon.png" type="image/gif" sizes="16x16">

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
            <li class="btn-logout nav-item active">
              <a class="nav-link active" href="Code.php">CODE<span class="sr-only">(current)</span></a>
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
    <div style="display: flex; height: 100%;">
      <div style="width: 30%;">

        <ul class="list-group">
          <?php
          $sql = "SELECT name FROM project_files WHERE TeamID = '";
          $sql = $sql.$_SESSION['TeamID']."'";
          $result = mysqli_query($con, $sql);
          $count = mysqli_num_rows($result);
          for($i=0; $i<$count; $i++){
            $row = mysqli_fetch_array($result);
            echo "<li class='list-group-item file-list'>";
            // echo ( "<a class='click' href='  '>" );
            echo ($row[0]);
            // echo "</a>";
            echo "</li>";
          }
          ?>
        </ul>

        <div style="margin-top: 10%;" class="file-handler-container">
          <?php
            if($_SESSION['userType']=='student'){
              echo '<div style="display: flex;" class="upload">';
              echo '<input style="width: 68%;" class="choosen-file" type="text" name="" value="" disabled>';
              echo '<button class="file-chs-btn btn btn-primary" type="button" name="button">choose file</button>';
              echo '</div>';
            }
          ?>
          <?php
              if($_SESSION['userType']=='student'){
                echo '<form class="uploadform" action="php/file_upload.php" method="post" enctype="multipart/form-data" >';
                echo '<input id="upload-input" name="file" class="file-chs" type="file" style="display: none;"> <br>';
                echo '<button style="margin: 0 30%;" class="upload-btn btn btn-success btn-lg" type="submit" name="upd-btn">upload</button>';
                echo '</form>';
              }
          ?>
        </div>


      </div>
      <div class="code-editor">
          <textarea class="codeEditor" rows="500" id="editor" name="codeEditor"> Select a file from the file tree. </textarea>
      </div>
    </div>



    <!-- <======================javascript links===========================> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/code.js" charset="utf-8"></script>

    </script>
    <!-- <=================================================================> -->
  </body>
</html>
