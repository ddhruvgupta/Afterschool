<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

// $_SESSION['success'] = 1;


include "security.php";

$sql="select * from tbl_faculty_info";
$statement = $pdo->prepare($sql);
$statement->execute();

$table = "<table class='table table-striped table-bordered table-hover'
id='example' >";
$table.= "
<thead>
<tr><b>
<th>Faculty ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>DOB</th>
<th>Phone</th>
<th>Field</th>
<th>Alter</th>
</b></tr>
</thead>";

$table.= "<tbody>";
while($row = $statement->fetch(PDO::FETCH_ASSOC)){

  $table.= "<tr><td>".$row['faculty_id']."</td>";
  $table.= "<td>".$row['firstName']."</td>";
  $table.= "<td>".$row['lastName']."</td>";
  $table.= "<td>".$row['DOB']."</td>";
  $table.= "<td>".$row['phone']."</td>";
  $table.= "<td>".$row['field']."</td>";

  $table.= "<td><a href='delete_faculty.php?faculty_id="
  .$row['faculty_id']."' onclick='return confirm_delete();'>Delete</a></td>";
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

    <form method=POST>


      <a href="/afterschool/new_faculty.php">Add New Entry</a> </br>



    </form>



  </div>


  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>


</body>
</html>
