<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

// $_SESSION['success'] = 1;


include "security.php";

$sql="select  class.*,cl.student_id, sti.fname,sti.lname
from (
select cli.class_id,cli.class_name,fac.firstName,fac.lastName from tbl_class_info cli 
join tbl_faculty_info fac on fac.faculty_id=cli.faculty_id
) class
inner join tbl_class_list cl on cl.class_id=class.class_id 
join tbl_student_info sti on sti.student_id = cl.student_id
order by class.class_id
";
$statement = $pdo->prepare($sql);
$statement->execute();

$table = "<table class='table table-striped table-bordered table-hover'
id='example' >";
$table.= "
<thead>
<tr><b>
<th>Class ID</th>
<th>Class Name</th>
<th>Instructor</th>
<th>Student ID</th>
<th>Student Name</th>
</b></tr>
</thead>";

$table.= "<tbody>";
while($row = $statement->fetch(PDO::FETCH_ASSOC)){

  $table.= "<tr><td>".$row['class_id']."</td>";
  $table.= "<td>".$row['class_name']."</td>";
  $table.= "<td>".$row['firstName']." ".$row['lastName']."</td>";
  $table.= "<td>".$row['student_id']."</td>";
  $table.= "<td>".$row['fname']." ".$row['lname']."</td>";
  $table.= "</tr>";
}
$table.= "</tbody></table>";

  //echo $table;



?>

<html>
<head>
  <title>Online Student Management System</title>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



  <?php include"bootstrap_js.php";?>
  <script type="text/javascript" src="delete.js"></script>
</head>
<body>

  <?php include "navbar.php";?>


  <div class="container-fluid">
    <?php if(isset($error))echo $error; echo $table; ?>
  </div>
  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>


</body>
</html>
