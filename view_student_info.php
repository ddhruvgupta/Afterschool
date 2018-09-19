<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

$_SESSION['success'] = 1;


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
  select u.user_id,u.firstName,u.lastName,u.school,s.father,s.f_phone,s.mother,s.m_phone
    from users u
    join tbl_student_info s on u.user_id =s.student_id";
  $statement = $pdo->prepare($sql);
  $statement->execute();

  $table = "<table class='table table-striped table-bordered' id='example' style='width:100%'>";
  $table.= "
  <thead>
  <tr><b>
  <th>Student ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>School</th>
  <th>Father</th>
  <th>Phone #</th>
  <th>Mother</th>
  <th>Phone #</th>
  <th>Alter</th>
  </b></tr>
  </thead>";

  while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $table.= "<tbody><tr>";
    $table.= "<td>".$row['user_id']."</td>";
    $table.= "<td>".$row['firstName']."</td>";
    $table.= "<td>".$row['lastName']."</td>";
    $table.= "<td>".$row['school']."</td>";
    $table.= "<td>".$row['father']."</td>";
    $table.= "<td>".$row['f_phone']."</td>";
    $table.= "<td>".$row['mother']."</td>";
    $table.= "<td>".$row['m_phone']."</td>";
    $table.= "<td><a href='#'>Edit</a> | <a href='#' onclick='return confirm_delete();'>Delete</a></td>";
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

if(isset($_POST['logout']) ){
  header("location:logout.php");
  return;
}


  ?>

<html>
<head>
  <title>Online Student Management System</title>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <!--Call to datatables CDN-->
  <script  type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

<script type="text/javascript" src="delete.js"></script>
</head>
<body>

  <div id="dialogoverlay" style="display: none; opacity: .8; position: fixed; top: 0px; left: 0px; background: #FFF; width: 100%; z-index: 10;"></div>
  <div id="dialogbox" style="display: none; position: fixed; background: #000; border-radius:7px; width:550px; z-index: 10;">
      <div style="background:#FFF; margin:8px;">
          <div id="dialogboxhead" style="background: #666; font-size:19px; padding:10px; color:#CCC;"></div>
          <div id="dialogboxbody" style="background:#333; padding:20px; color:#FFF;"></div>
          <div id="dialogboxfoot" style="background: #666; padding:10px; text-align:right;"></div>
      </div>
  </div>


  <div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body"  style="overflow:auto">
              <?php echo $table; ?>
            </div>
          </div>
        </div>
      </div>

<form method=POST>
  <div class="form-group">

  <a href="#">Add New Entry</a> </br>
  <a href="#">Logout</a>

  </div>

  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>

</body>
</html>
