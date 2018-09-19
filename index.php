<?php
session_start();

  if(!isset($_SESSION['success'])){
    header("location:login.php");
    return;
  }
?>


<html>
  <head>
    <title></title>
  </head>

  <body>
    <ul>
      <li><a href='new_user.php'>New User</a></li>
      <li>User Profile</li>
      <li><a href='view_student_info.php'>Students</a></li>
      <li>Faculty</li>
      <li>Classes</li>
      <li>Staff</li>
      <li>Bus Routes</li>
  </body>
</html>
