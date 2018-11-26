<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=student', 'dhruv', 'pass123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$salt = 'XyZzy12*_';

if(isset($_POST['logout']) ){
  header("location:logout.php");
  return;
}

?>
