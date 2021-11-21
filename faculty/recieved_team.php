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

$team_id = $_POST['hidden_team_id'];
$teamName= $_POST['teamName'];
$_SESSION['TeamID']=$team_id;
$_SESSION['TeamName']=$teamName;
?>
