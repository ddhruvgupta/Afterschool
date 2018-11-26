<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

// $_SESSION['success'] = 1;


include "security.php";

$sql="select class.*, fac.firstName,fac.lastName 
from tbl_class_info class join tbl_faculty_info fac 
on fac.faculty_id = class.faculty_id";

$statement = $pdo->prepare($sql);
$statement->execute();

$table = "<table class='table table-striped table-bordered table-hover'
id='example' >";
$table.= "
<thead>
<tr><b>
<th>Class ID</th>
<th>Class Name</th>
<th>Instructor Name</th>
<th>Start Time</th>
<th>End Time</th>
<th>Alter<th>
</b></tr>
</thead>";

$table.= "<tbody>";
while($row = $statement->fetch(PDO::FETCH_ASSOC)){

  $table.= "<tr><td>".$row['class_id']."</td>";
  $table.= "<td>".$row['class_name']."</td>";
  $table.= "<td>".$row['firstName']." ".$row['lastName']."</td>";
  $table.= "<td>".$row['start_time']."</td>";
  $table.= "<td>".$row['end_time']."</td>";
  $table.= "<td>".
      "<form method='post'>
          <input type='hidden' id='class_id' name='class_id' value={$row['class_id']} >
          <input type='submit' name='add' value='Add Student'>
          </form>"
  ."</td>";
  $table.= "</tr>";
}
$table.= "</tbody></table>";

if(isset($_POST['add'])){
  $_SESSION['post'] = $_POST;
  header('location: add_student_class.php');
  return;
}

?>

<html>
<head>
  <title>Online Student Management System</title>

  <link rel="stylesheet" 
  href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



  <?php include"bootstrap_js.php";?>
  <script type="text/javascript" src="delete.js"></script>
</head>
<body>

  <?php include "navbar.php";?>


  <div class="container-fluid">
    <?php if(isset($error))echo $error; echo $table; ?>
    <form method=POST>
      <a href="/afterschool/new_class.php">Add New Entry</a> </br>
    </form>
  </div>
  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>
</body>
</html>
