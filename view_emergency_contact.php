<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

// $_SESSION['success'] = 1;


if(isset($_SESSION['success'])){
  //If insert if successful

  if(isset($_SESSION['insert']) ){
    echo "<div class='col-md-4 col-md-offset-5'><p class='text-success'>".$_SESSION['insert']."</p></div>";
    unset($_SESSION['insert']);
  }

  if(isset($_SESSION['error']) ){
    echo "<div class='col-md-4 col-md-offset-5'><p class='text-danger'>".$_SESSION['error']."</p></div>";
    unset($_SESSION['error']);
  }

  if(isset($_GET['student_id'])){
    $user =$_GET['student_id'];
    $sql="select * from tbl_emergency_contact where student_id = :student_id";
    $statement = $pdo->prepare($sql);
    $statement->execute(array(':student_id'=>$user));
  }else{
    $sql="select * from tbl_emergency_contact";
    $statement = $pdo->prepare($sql);
    $statement->execute();
  }





  $table = "<table class='table table-striped table-bordered table-hover'
  id='example' style='width:100%'>";
  $table.= "
  <thead>
  <tr><b>
  <th>Student ID</th>
  <th>Contact 1</th>
  <th>Phone #</th>
  <th>Contact 2</th>
  <th>Phone #</th>
  <th>Contact 3</th>
  <th>Phone #</th>
  <th>Alter</th>
  </b></tr>
  </thead>";

  while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $table.= "<tbody><tr>";
    $table.= "<td>".$row['student_id']."</td>";
    $table.= "<td>".$row['emergency1']."</td>";
    $table.= "<td>".$row['phone1']."</td>";
    $table.= "<td>".$row['emergency2']."</td>";
    $table.= "<td>".$row['phone2']."</td>";
    $table.= "<td>".$row['emergency3']."</td>";
    $table.= "<td>".$row['phone3']."</td>";
    $table.= "<td><a href='edit_student_contact.php?student_id=".$row['student_id']."'>Edit</a></td>";
    $table.= "</tr></tbody>";
  }
  $table.= "</table>";

  //echo $table;
} else{
  die("ACCESS DENIED");
}

if(isset($_POST['add']) ){
  header("location:add.php");
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
    <div class="row">

      <div class="col">
        <div class="panel panel-default">

          <?php echo $table; ?>

          
            <a href="view_student_info.php">Back</a> </br>
          

        </div>
      </div>
    </div>

  </div>
</div>


<!--jquery call which uses datatables-->
<script type="text/javascript" src="table.js"></script>


</body>
</html>
