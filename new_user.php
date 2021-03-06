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
  $sql="insert into users(firstName, lastName, username, password,admin)
    values (:fname,:lname,:username,:password,1)";

    $check = hash('md5', $salt.$_POST['pass1']);
    $username = $_POST['email'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];

    $statement = $pdo->prepare($sql);
    $statement->execute(array(':fname'=>$fname,':lname'=>$lname,':username'=>$username,':password'=>$check,
          ));

    $_SESSION['insert'] = "New User Successfully Entered";

  header("location:index.php");
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
                <?php include "new_user_form.php"; ?>

                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>

</body>
</html>
