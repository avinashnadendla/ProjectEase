<?php
        // require "PhpSpreadsheet\IOFactory.php";

        session_start();
        $server = "localhost";
        $username = "root";
        $password = "root";
        $database = "id15169349_peamigos";
        $db = mysqli_connect($server, $username, $password,$database);

       if(mysqli_connect_errno())
      {
    echo "Failed to connect: " . mysqli_connect_errno();
      }
      if(isset($_POST['designation2']))
      {
      switch($_POST['designation2']) {
        case "student":
                          $handle = fopen($_FILES['filename']['tmp_name'], "r");
                          while(($data = fgetcsv($handle)) !== FALSE)
                          {
                                 $sql = "INSERT into student(student_email,Password, Name)
                                                       values('".$data[0]."', '".$data[1]."', ' ".$data[2]." ')";

                                mysqli_query($conn, $sql) ;
                          }
                          echo "successfull";
                          break;

        case "faculty":
                          $handle = fopen($_FILES['filename']['tmp_name'], "r");
                          while(($data = fgetcsv($handle)) !== FALSE)
                          {
                                 $sql = "INSERT into teacher(teacher_email,teacher_password,name) values('".$data[0]."', '".$data[1]."', ' ".$data[2]." ')";

                                mysqli_query($conn, $sql) ;
                          }

                          echo "successfull";
                          break;


        default:
                    echo "Incorrect";
                    break;
                      }
      }
      else
      {
        echo "Invalid";
      }
 ?>
