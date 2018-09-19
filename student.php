<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";

$_SESSION['success'] = 1;

//code for production
// $user_name = $_SESSION['user']['name'] ;
// $user_email = $_SESSION['user']['mail'] ;
// $user_pantherid = $_SESSION['user']['pid'] ;
$count_advisors=0;
// test credentials
$user_name = 'dgupta' ;
$user_email = 'dgupta@gsu.edu' ;
$user_pantherid = 1117527 ;

//get user details

if(isset($_SESSION['success'])){

  // Display any alerts
  if(isset($_SESSION['insert']) ){
      echo "<div class='col-md-4 col-md-offset-5'><p class='text-success'>".$_SESSION['insert']."</p></div>";
      unset($_SESSION['insert']);
    }

    if(isset($_SESSION['error']) ){
        echo "<div class='col-md-4 col-md-offset-5'><p class='text-danger'>".$_SESSION['error']."</p></div>";
        unset($_SESSION['error']);
      }


  //user logs in and views the user summary
  $sql="  select * from tbl_student_advising where pantherid = :pantherid  ";
  $statement = $pdo->prepare($sql);
  $statement->execute([':pantherid'=>$user_pantherid]);



//create table for display
  $table = "<table class='table table-striped table-bordered' id='example' style='width:100%'>";
  $table.= "
    <thead>
      <tr>
        <b>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Advisor 1</th>
        <th>Alter</th>
        </b>
      </tr>
    </thead>";

  while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $table.= "<tbody><tr>";
    $table.= "<td>".$row['firstName']."</td>";
    $table.= "<td>".$row['lastName']."</td>";
    $table.= "<td>".$row['Advisor_email']."</td>";
    $table.="<td>
    <form method='post'>
    <input type='hidden' id='ad_id' name='ad_id' value={$row['student_id']} >
    <input type='submit' name='del' value='Del' onclick='confirm_delete(); return true;'>
    </form>
    </td>";
    $table.= "</tr></tbody>";
    $count_advisors+=1;
  }
  $table.= "</table>";

  //echo $table;
} else{
    die("ACCESS DENIED");
}


  if(isset($_POST['logout']) ){
    header("location:logout.php");
    return;
  }

  if(isset($_POST['del']) ){
    $_SESSION['ad_id']=$_POST['ad_id'];
    header("location:advisor_delete.php");
    return;
  }

?>

<html>
<head>
  <title>Online Student Management System</title>

  <!--scripts for datatables
  include jquery-->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <!--include datatables-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<!--//jquery call-->


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

  <?php
    if($count_advisors<2)
      echo("<a href='add_advisor.php'>Add New Entry</a> </br>");
  ?>
  <a href="#">Logout</a>

  </div>

  <script type="text/javascript" src="table.js"></script>
</body>
</html>
