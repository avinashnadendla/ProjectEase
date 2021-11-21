<?php
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
      else {
        // code...

      if(isset($_POST['designation']))
      {
      switch($_POST['designation']) {
        case "student":
                          $name=   mysqli_real_escape_string($db,$_POST['data_name']);
                          $email = mysqli_real_escape_string($db,$_POST['data_username']);
                          $mypassword = mysqli_real_escape_string($db,$_POST['data_password']);


                          // <=======================UPDATE IN STUDENT TABLE============================>/
                          $sql="INSERT into student(EnrollNo, Name, student_email, Password) values('E19CSE359','$name','$email','$mypassword')";
                          $result = mysqli_query($db,$sql);
                          if($result){
                            include 'admin_home.php';
                          }
                          else{
                            echo "error";
                          }
                          break;

        case "faculty":
                          $name=   mysqli_real_escape_string($db,$_POST['data_name']);
                          $email = mysqli_real_escape_string($db,$_POST['data_username']);
                          $mypassword = mysqli_real_escape_string($db,$_POST['data_password']);

                          $sql="INSERT into teacher(name, teacher_email, teacher_password) values('$name', '$email', '$mypassword')";
                          $result = mysqli_query($db,$sql);
                          if($result){
                            include 'admin_home.php';
                          }
                          else{
                            echo "error";
                          }
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
    }

?>
