<?php
session_start();
include "bootstrap.php";
include "connection.php";
include "navbar.php";
include "bootstrap_js.php";
include "security.php";



$sql = "select * from tbl_faculty_info";
$statement = $pdo->prepare($sql);
$statement->execute();

$select = "<select name='faculty_id' id='faculty_id' >";
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
  $select.="<option 
  value=".$row['faculty_id'].">".$row['firstName']." ".$row['lastName']." -- " 
  .$row['field']."</option>";
}
$select.= "</select>";

if(isset($_POST['add']) ){
  $sql="insert into tbl_class_info(faculty_id, class_name, start_time, end_time)
  values (:faculty_id, :class_name, :start_time, :end_time)";

  $class_name = $_POST['class_name'];
  $faculty_id = $_POST['faculty_id'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];



  $statement = $pdo->prepare($sql);
  $statement->execute(
    array(':faculty_id'=>$faculty_id,':class_name'=>$class_name,':start_time' => $start_time,':end_time' => $end_time)
  );

  $_SESSION['insert'] = "New Class Successfully Added";

  header("location:view_class_info.php");
  return;
}

if(isset($_POST['cancel'])){
  header("location:index.php");
  return;
}




?>

<html>
<head>
  <title></title>
  <!-- <script src="js/jquery.js"></script>  -->
<!--   <script src="js/moment.js"></script> 
  <script src="js/combodate.js"></script> 
  <script src="js/time.js"></script>
 -->
</head>
<body>



  <div class="container">
    <div class="row">

      <div class="col">
        <div class="panel panel-default">
          <div class="panel-body"  style="overflow:auto">
            <?php include "new_class_form.php"; ?>

          </div>
        </form>

      </div>
    </div>
  </div>

</div>
</div>

</body>
</html>
