<?php
session_start();
include "bootstrap.php";
include "connection.php";
include "navbar.php";
include "bootstrap_js.php";
include "security.php";



if(isset($_POST['add']) ){


$contact1 = $_POST['contact1'];
$phone1 = $_POST['phone1'];
$contact2 = $_POST['contact2'];
$phone2 = $_POST['phone2'];
$contact3 = $_POST['contact3'];
$phone3 = $_POST['phone3'];

$student_id = $_GET['student_id'];

      $sql="update tbl_emergency_contact set emergency1 = :contact1, emergency2 = :contact2, emergency3 = :contact3, phone1 = :phone1, phone2 = :phone2, phone3 = :phone3 where student_id = :student_id";

    $statement = $pdo->prepare($sql);
    $statement->execute(array(':contact1'=>$contact1,':contact2'=>$contact2,
      ':contact3' => $contact3, ':phone1' => $phone1, ':phone2' => $phone2, ':phone3' => $phone3, 'student_id' => $student_id));
    

    

    $_SESSION['insert'] = "Update Successful";

  header("location:view_student_info.php");
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
</head>
<body>



  <div class="container">
    <div class="row">

      <div class="col">
          <div class="panel panel-default">
              <div class="panel-body"  style="overflow:auto">
                <?php include "edit_contact_form.php"; ?>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>

</body>
</html>
