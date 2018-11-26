<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

// $_SESSION['success'] = 1;

include "security.php";


$sql="
select st.*, cl.class_id 
from tbl_student_info st 
left join tbl_class_list cl on cl.student_id = st.student_id
where st.status='active' and cl.class_id is null";

$statement = $pdo->prepare($sql);
$statement->execute(array(':class_id' => $_SESSION['post']['class_id'] ));

$table = "<table class='table table-striped table-bordered table-hover'
id='example' >";
$table.= "
<thead>
<tr><b>
<th>Student ID</th>
<th>Name</th>
<th>Alter</th>
</b></tr>
</thead>";

$table.= "<tbody>";
while($row = $statement->fetch(PDO::FETCH_ASSOC)){

  $table.= "<tr><td>".$row['student_id']."</td>";
  $table.= "<td>".$row['fname']." ".$row['lname']."</td>";


  $table.= "<td>
  <form method='post'>
  <input type='hidden' id='student_id' name='student_id' value={$row['student_id']} >
  <input type='hidden' id='class_id' name='class_id' value={$_SESSION['post']['class_id']} >
  <input type='submit' name='add' value='Add'>
  </form>
  ";


  $table.= "</tr>";
}
$table.= "</tbody></table>";


if(isset($_POST['add']) ){
  
  $sql = "insert into tbl_class_list(class_id,student_id)
    values (:class_id, :student_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute( 
      array(':class_id' => $_POST['class_id'] ,
        ':student_id'=>$_POST['student_id'] )
    );
    $_SESSION['insert'] = "Student Added";
    header('location: add_student_class.php');
    return;

}




?>

<html>
<head>
  <title>Online Student Management System</title>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  <?php include"bootstrap_js.php"?>
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
