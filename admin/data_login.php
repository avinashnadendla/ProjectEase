<?php
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
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
                        // <=========================change for admin login ==================================>
                        $sql = "select name from admin where admin_email='abc@gmail.com' ";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result);
                        $count = mysqli_num_rows($result);
                        echo $row[0];
                        ?>
                    </a>
                  </li>
                  <li><a class="Logout-link">Log Out</a></li>
                </ul>
            </nav><!-- End Nav Menu -->

        </div>
      </header><!-- End Header -->
        <br>

        <main id="main">
            <div style="padding-left: 125px;">
                <h3>Student Login Data</h3>

                <?php
                    $query = "SELECT * FROM student";
                ?>

                <table class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">Student Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result = $db->query($query))
                            {   $x = 0;
                                while ($row = $result->fetch_assoc())
                                {
                                    $field1name = $row["EnrollNo"];
                                    $field2name = $row["Name"];
                                    $field3name = $row["student_email"];
                                    $field4name = $row["Password"];
                                    $x++;

                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $x ?></th>
                                        <td><?php echo $field1name ?></td>
                                        <td><?php echo $field2name ?></td>
                                        <td><?php echo $field3name ?></td>
                                        <td><?php echo $field4name ?></td>
                                    </tr>
                        <?php
                                }
                                $result->free();
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div style="padding-left: 125px; padding-top: 40px;">
                <h3>Faculty Login Data</h3>

                <?php
                    $query = "SELECT * FROM teacher";
                ?>

                <table class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                        <th scope="col">S.No.</th>
                            <th scope="col">Faculty ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Faculty Email</th>
                            <th scope="col">Faculty Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result = $db->query($query))
                            {
                                $x = 0;
                                while ($row = $result->fetch_assoc())
                                {
                                    $field1name = $row["id"];
                                    $field2name = $row["name"];
                                    $field3name = $row["teacher_email"];
                                    $field4name = $row["teacher_password"];
                                    $x++;

                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $x ?></th>
                                        <td><?php echo $field1name ?></td>
                                        <td><?php echo $field2name ?></td>
                                        <td><?php echo $field3name ?></td>
                                        <td><?php echo $field4name ?></td>
                                    </tr>
                        <?php
                                }
                                $result->free();
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </main>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="../js/admin.js" type="text/javascript"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>
</html>
