<?php 
include 'connection.php';

$sql = "delete from tbl_school_info  where schoolID = :school_id";
$statement = $pdo->prepare($sql);
$statement->execute(array(':school_id' => $_GET['school_id']));

$_SESSION['insert'] = 'School Deleted';
header('location: view_school_info.php');
return;

?>