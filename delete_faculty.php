<?php 
include 'connection.php';

$faculty_id = $_GET['faculty_id'];

$sql = "delete from tbl_faculty_info where faculty_id = :faculty_id ";
$statement = $pdo->prepare($sql);
$statement->execute(array(':faculty_id' => $faculty_id));

$_SESSION['insert'] = 'faculty Archived';
header('location: view_faculty_info.php');
return;

?>