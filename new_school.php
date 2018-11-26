<?php
session_start();
include "bootstrap.php";
include "connection.php";
include "navbar.php";
include "bootstrap_js.php";


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





} else{
    die("ACCESS DENIED");
}

if(isset($_POST['add']) ){
  $sql="insert into tbl_school_info(name, address)
    values (:name,:address)";

    

    $statement = $pdo->prepare($sql);
    $statement->execute(array(':name'=>$_POST['schoolName'],':address'=>$_POST['address']));

    $_SESSION['insert'] = "New School Successfully Entered";

  header("location:view_school_info.php");
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
                <?php include "new_school_form.php"; ?>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>

</body>
</html>
