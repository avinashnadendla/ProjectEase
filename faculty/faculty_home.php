<?php
session_start();
$server = "localhost";
$Username = "root";
$password = "root";
$database = "id15169349_peamigos";
$db = mysqli_connect($server, $Username, $password,$database);
include "./php/user.php";
?>

<html lang = "en">
    <head>
        <title>Faculty-Dashboard</title>
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
      <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="faculty_home.php"><span>ProjectEase</span></a></h1>
            </div>

            <!-- ------ Nav Menu ------ -->
            <nav  class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="#">Feedback</a></li>
                    <li><a>
                        Welcome,
                        <?php
                        echo $_SESSION['username'];
                        ?>
                    </a></li>
                    <li><a class="logout-link" href="">Log Out</a></li>
                </ul>
            </nav><!-- End Nav Menu -->

        </div>
      </header><!-- End Header -->
        <br>


        <main id="main">

            <div style="padding-left: 115px; display:inline-flex">
                <p>Select Year: </p>
                <div style="padding-left: 10px;">
                <?php
                    $year_query = $db->query("select DISTINCT year from Teams GROUP BY year");
                    $rowcount = mysqli_num_rows($year_query);
                ?>

                <select name="teams" id="year">
                    <option value="">All Years</option>
                    <?php
                        for($i = 1; $i <= $rowcount; $i++)
                        {
                            $row = mysqli_fetch_array($year_query);
                    ?>
                    <option value="choosen_year"><?php echo $row['year'] ?> </option>
                    <?php
                        }
                    ?>
                </select>
                </div>

                <p style="padding-left: 20px;">Select Batch: </p>

                <div style="padding-left: 10px;">
                <?php
                    $batch_result = $db->query("select DISTINCT BatchID from Teams GROUP BY BatchID");
                ?>

                <select name="teams" id="batch">
                    <option value="">All Batches</option>
                    <?php
                        while($rows = $batch_result->fetch_assoc())
                        {
                          // <================----==================ERROR TO FIX=====================-----===========>
                            echo '<option value="'.$rows['TeamID'].'">'.$rows['BatchID'].'</option>';
                            // <================----=======================================-----===========>
                        }
                    ?>
                </select>
                </div>
            </div>

            <h2 style="padding-left: 115px; padding-top: 50px">Teams</h2>

            <?php
                $query = "select * from Teams order by TeamID asc";
                $result = mysqli_query($db,$query);

                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
            ?>
            <div class="col-md-3" id="show_teams" style="padding-left: 170px; display:inline-flex">
              <!-- <=================CHANGE FOR PHP LOCATION====================> -->
                <form class="jump-to-team" method="post" action="recieved_team.php">
                        <div style="border: 1px solid #333; background-color:#f1f1f1; border-radius: 10px; padding: 16px; height:230px; width: 300px">
                            <h4 name='teamName' class="text-primary"> <?php echo $row["TeamName"]; ?> </h4>
                            <h4 class="text-success">Batch: <?php echo $row["BatchID"]; ?> </h4>
                            <h4 class="text-info">Year: <?php echo $row["year"]; ?> </h4>
                            <input type="hidden" name="hidden_team_id" value="<?php echo $row["TeamID"]; ?>" />
                            <br>
                            <button type="submit" name="submit" value="view_team" class="btn btn-outline-primary">View Team</button>
                        </div>
                </form>
            </div>
            <?php

                    }
                }
            ?>

            <script>
                $(document).ready(function(){
                    $('#batch').change(function(){
                        var team_id = $(this).val();

                        $.ajax({
                            url:"load_batch.php",
                            method:"POST",
                            data:{team_id:team_id},
                            success:function(data){
                                $('#show_teams').html(data);
                            }
                        });
                    });
                });
            </script>


        </main>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../js/admin.js"></script>
        <script src="../js/faculty.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      </body>
</html>
