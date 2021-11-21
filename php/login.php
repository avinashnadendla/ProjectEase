<?php
session_start();
$server = "localhost";
$Username = "root";
$password = "root";
$database = "id15169349_peamigos";
$db = mysqli_connect($server, $Username, $password,$database);
// if(mysqli_connect_errno())
// {
//   echo "Failed to connect: " . mysqli_connect_errno();   // connection successfully created or not.
// }
// else
// {
//     echo "database connected";
// }
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);

$msg=0;
$content = file_get_contents('user.php');
switch($_POST['designation']) {
        case "student":
                          $email = mysqli_real_escape_string($db,$_POST['email']);
                          $mypassword = mysqli_real_escape_string($db,$_POST['password']);

                          $sql = "SELECT EnrollNo, Name FROM student WHERE student_email = '$email' and  Password = '$mypassword'";
                          $result = mysqli_query($db,$sql);
                          $row = mysqli_fetch_array($result);
                          $count = mysqli_num_rows($result);
                          if($count == 1) {
                              $_SESSION['userEmail'] = $email;
                              $_SESSION['userID'] = $row[0];
                              $_SESSION['username'] = $row[1];
                              $_SESSION['userType'] = 'student';
                              $msg=1;
                          }else {
                             $msg= -1;
                          }
                        break;
        case "admin":
                          $email = mysqli_real_escape_string($db,$_POST['email']);
                          $mypassword = mysqli_real_escape_string($db,$_POST['password']);


                          $sql = "SELECT id, name FROM admin WHERE admin_email = '$email' and  admin_password = '$mypassword'";
                          $result = mysqli_query($db,$sql);
                          $row = mysqli_fetch_array($result);
                          $count = mysqli_num_rows($result);

                          if($count == 1) {
                            $_SESSION['userEmail'] = $email;
                            $_SESSION['userID'] = $row[0];
                            $_SESSION['username'] = $row[1];
                            $_SESSION['userType'] = 'admin';
                            // header("Location: ../admin/admin_home.php");
                            // exit();
                            $msg=2;
                          }else {
                             $msg= -1;
                          }
                        break;
        case "faculty":
                      $email = mysqli_real_escape_string($db,$_POST['email']);
                      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

                      $sql = "SELECT id, name FROM teacher WHERE teacher_email = '$email' and  teacher_password = '$mypassword'";
                      $result = mysqli_query($db,$sql);
                      $row=mysqli_fetch_array($result);

                      $count = mysqli_num_rows($result);

                      if($count == 1) {
                          $_SESSION['userEmail'] = $email;
                          $_SESSION['userID'] = $row[0];
                          $_SESSION['username'] = $row[1];
                          $_SESSION['userType'] = 'faculty';

                          $msg=3;
                        }else {
                           $msg= -1;
                        }
                      break;
      default:
                    echo "Incorrect";
                    break;
    }
    echo $msg;
?>
