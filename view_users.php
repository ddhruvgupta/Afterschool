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
  select * from users";
  $statement = $pdo->prepare($sql);
  $statement->execute();

  $table = "<table class='table table-striped table-bordered table-hover' id='example' style='width:100%'>";
  $table.= "
  <thead>
  <tr><b>
  <th>User ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Username</th>
  <th>Admin</th>
  <th>Alter</th>
  </b></tr>
  </thead>";


  $table.= "<tbody>";
  while($row = $statement->fetch(PDO::FETCH_ASSOC)){

    $table.= "<tr><td>".$row['user_id']."</td>";
    $table.= "<td>".$row['firstName']."</td>";
    $table.= "<td>".$row['lastName']."</td>";
    $table.= "<td>".$row['username']."</td>";
    $table.= "<td>".$row['admin']."</td>";
    $table.= "<td><a href='#'>Edit</a> | <a href='#' onclick='return confirm_delete();'>Delete</a></td></tr>";

  }
  $table.= "</tbody>";
  $table.= "</table>";

  //echo $table;
} else{
    die("ACCESS DENIED");
}

if(isset($_POST['add']) ){
  header("location:add.php");
  return;
}?>

<html>
<head>
  <title>Online Student Management System</title>



<?php
include 'bootstrap_js.php';
?>
<script type="text/javascript" src="delete.js"></script>
</head>
<body>

<?php include "navbar.php";?>


<div class="container">
  <div class="row">

    <div class="col">
        <div class="panel panel-default">
            <div class="panel-body"  style="overflow:auto">
              <?php echo $table; ?>

              <form method=POST>
                <div class="form-group">

                <a href="new_user.php">Add New Entry</a> </br>


                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>


  <!--jquery call which uses datatables-->
  <script type="text/javascript" src="table.js"></script>


</body>
</html>
