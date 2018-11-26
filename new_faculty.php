<?php
session_start();
include "bootstrap.php";
include "connection.php";
include "navbar.php";
include "bootstrap_js.php";
include "security.php";

if(isset($_POST['add']) ){
  $sql="insert into tbl_faculty_info(firstName, lastName, DOB, phone, field)
    values (:fname, :lname, :DOB, :phone, :field)";

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $field = $_POST['field'];


    $statement = $pdo->prepare($sql);
    $statement->execute(array(':fname'=>$fname,':lname'=>$lname,':DOB' => $dob,
      ':phone' => $phone, ':field' => $field));
    
    $_SESSION['insert'] = "New Faculty Successfully Added";

  header("location:view_faculty_info.php");
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
</head>
<body>



  <div class="container">
    <div class="row">

      <div class="col">
          <div class="panel panel-default">
              <div class="panel-body"  style="overflow:auto">
                <?php include "new_faculty_form.php"; ?>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>

</body>
</html>
