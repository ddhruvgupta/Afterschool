<?php
session_start();
include "bootstrap.php";
include "connection.php";
include "navbar.php";
include "bootstrap_js.php";
include "security.php";

if(isset($_POST['add']) ){
  $sql="insert into tbl_student_info(fname, lname, father,mother, f_phone,m_phone,DOB, schoolID)
    values (:fname, :lname, :father, :mother, :f_phone, :m_phone, :DOB, :schoolID)";

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $f_phone = $_POST['fnum'];
    $m_phone = $_POST['mnum'];
    $DOB = $_POST['dob'];
    $schoolID = $_POST['schoolID'];

    $statement = $pdo->prepare($sql);
    $statement->execute(array(':fname'=>$fname,':lname'=>$lname,
      ':father' => $father, ':mother' => $mother, ':f_phone' => $f_phone, ':m_phone' => $m_phone, ':DOB' => $DOB, ':schoolID' => $schoolID));
    

    $sql = 'select MAX(student_id) student_id, father, mother, f_phone, m_phone from tbl_student_info';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    $sql = 'insert into tbl_emergency_contact (student_id, emergency1, phone1, emergency2, phone2) values (:student_id, :emergency1, :phone1, :emergency2, :phone2)';
    $statement = $pdo->prepare($sql);

    $statement->execute(array(':student_id'=>$row['student_id'],
      ':emergency1' => $father, ':emergency2' => $mother, ':phone1' => $f_phone, ':phone2' => $m_phone));

    $_SESSION['insert'] = "New User Successfully Entered";

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
                <?php include "new_student_form.php"; ?>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>

</body>
</html>
