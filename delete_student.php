<?php 
include 'connection.php';

$student_id = $_GET['student_id'];

$sql = "update tbl_student_info set status ='inactive' where student_id = :student_id ";
$statement = $pdo->prepare($sql);
$statement->execute(array(':student_id' => $student_id));

$_SESSION['insert'] = 'Student Archived';
header('location: view_student_info.php');
return;

?>