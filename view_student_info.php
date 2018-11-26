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

  $sql="
  select st.*, sc.Name 'school' from tbl_student_info st join tbl_school_info sc on sc.schoolID = st.schoolID where st.status='active'";
  $statement = $pdo->prepare($sql);
  $statement->execute();

  $table = "<table class='table table-striped table-bordered table-hover'
  id='example' >";
  $table.= "
  <thead>
  <tr><b>
  <th>Student ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>School</th>
  <th>Father</th>
  <th>Phone</th>
  <th>Mother</th>
  <th>Phone</th>
  <th>DOB</th>
  <th>Alter</th>
  </b></tr>
  </thead>";

$table.= "<tbody>";
  while($row = $statement->fetch(PDO::FETCH_ASSOC)){

    $table.= "<tr><td>".$row['student_id']."</td>";
    $table.= "<td><a href='view_emergency_contact.php?student_id=".$row['student_id']."'>".$row['fname']."</a></td>";
    $table.= "<td>".$row['lname']."</td>";
    $table.= "<td><a href='view_school_info.php?school_id=".$row['schoolID']."'>".$row['school']."</td>";
    $table.= "<td>".$row['father']."</td>";
    $table.= "<td>".$row['f_phone']."</td>";
    $table.= "<td>".$row['mother']."</td>";
    $table.= "<td>".$row['m_phone']."</td>";
    $table.= "<td>".$row['DOB']."</td>";
    $table.= "<td><a href='delete_student.php?student_id="
    .$row['student_id']." onclick='return confirm_delete();'>Delete</a></td>";
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
                

                <a href="/afterschool/new_student.php">Add New Entry</a> </br>


                
              </form>

         
      
    </div>


  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>


</body>
</html>
