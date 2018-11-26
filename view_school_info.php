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


  if(isset($_GET['school_id'])){
    $sql="select * from tbl_school_info where schoolID = :school_id";
    $statement = $pdo->prepare($sql);
    $statement->execute(array(':school_id'=>$_GET['school_id']));
  }else{
    $sql="select * from tbl_school_info";
    $statement = $pdo->prepare($sql);
    $statement->execute();
  }
  

  $table = "<table class='table table-striped table-bordered table-hover'
  id='example' >";
  $table.= "
  <thead>
  <tr><b>
  <th>School ID</th>
  <th>School Name</th>
  <th>Address</th>
  <th>Alter</th>
  </b></tr>
  </thead>";

  $table.= "<tbody>";
  while($row = $statement->fetch(PDO::FETCH_ASSOC)){

    $table.= "<tr>";
    $table.= "<td>".$row['schoolID']."</td>";
    $table.= "<td>".$row['Name']."</td>";
    
    $table.= "<td>".$row['address']."</td>";
    
    $table.= "<td><a href='delete_school.php?school_id="
    .$row['schoolID']." onclick='return confirm_delete();'>Delete</a></td>";
    $table.= "</tr>";
  }
  $table.= "</tbody></table>";

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





    <?php if(isset($error))echo $error; echo $table; ?>

    <form method=POST>


      <a href="/afterschool/new_school.php">Add New Entry</a> </br>



    </form>



  </div>


  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>


</body>
</html>
