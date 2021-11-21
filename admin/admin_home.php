<?php
session_start();
$server = "localhost";
$username = "root";
$password = "root";
$database = "id15169349_peamigos";
$db = mysqli_connect($server, $username, $password,$database);
?>

<html lang = "en">
    <head>
        <title>Admin-Dashboard</title>
        <link rel="icon" href="../assets/EASE_icon.png" type="image/gif" sizes="16x16">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Imported CSS Files -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
    </head>
    <body>
      <!-- ------ Header and Logo------ -->
      <header id="header" class=" d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="admin_home.php"><span>ProjectEase</span></a></h1>
            </div>

            <!-- ------ Nav Menu ------ -->
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                  <li><a href="data_login.php">Login Data</a></li>
                <li><a href="">
                        Welcome,
                        <?php
                        $q0 = "select name from admin where admin_email='";
                        $q1="'";
                        $sql=$q0.$_SESSION['userEmail'].$q1;
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result);
                        $count = mysqli_num_rows($result);
                        echo $row[0];
                        ?>
                    </a>
                  </li>
                  <li><a class="logout-link" href="">Log Out</a></li>
                </ul>
            </nav><!-- End Nav Menu -->

        </div>
      </header><!-- End Header -->
        <br>

        <main id="main">
          <!-- Data Entry Form -->
          <div class="container">
            <div class="section-title" style="font-size: large; font-weight: bold; text-align: left;">
              <hr>
              <p>Register New Student/Faculty</p>
              <hr>
            </div>

            <form class="needs-validation" method="post" action="admin.php" novalidate>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="data_name">Name</label>
                  <input type="text" class="form-control" id="data_name" name="data_name" placeholder="Name" required>
                  <div class="invalid-feedback">
                    Please enter a name
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="data_username">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="data_username" name="data_username" placeholder="Email" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="data_password">Password</label>
                  <input type="password" class="form-control" id="data_password" name="data_password" placeholder="Password" required>
                  <div class="invalid-feedback">
                      Please enter a password.
                    </div>
                </div>
              </div>

              <div class="form-group">
                  <select class="custom-select" name="designation" required>
                    <option value="">Designation</option>
                    <option name="designation" value="faculty">Faculty</option>
                    <option name="designation" value="student">Student</option>
                  </select>
                  <div class="invalid-feedback">Please provide a designation</div>
              </div>
              <button class="btn btn-primary" type="submit" style="border-radius: 20px; background-color: #3498db;">Submit Entry</button>
              <hr>
            </form>

            <script>
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  var forms = document.getElementsByClassName('needs-validation');
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
            </script>
          </div>

          <div class="container" style="padding-top: 10px;">
          <div class="section-title" style="font-size: large; font-weight: bold; text-align: left;">
            <hr>
            <p>Upload A file to register data</p>
            <hr>
          </div>

          <form method="post" action="admintwo.php" enctype="multipart/form-data">
            <div class="form-group">
                <select class="custom-select" name="designation2" required>
                  <option value="">Designation</option>
                  <option name="designation" value="faculty">Faculty</option>
                  <option name="designation" value="student">Student</option>
                </select>
                <div class="invalid-feedback">Please provide a designation</div>
            </div>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFile" name="filename">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #3498db;">Submit</button>
              <hr>
            </div>
            <script>
              // name of the file appear on select
              $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
              });
              </script>
          </form>
          </div>

        </main>

        <!-- Vendor JS Files -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="../js/admin.js" type="text/javascript"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>
</html>
