<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Select Your Team!</title>
  </head>
  <body>
    <h1>SELECT YOUR TEAM!</h1>
    <?php
    session_start();
    echo $_SESSION['TeamID'];
    ?>
  </body>
</html>
