<?php
session_start();
require_once "connection.php";
require_once "bootstrap.php";
include "bootstrap_js.php";

if(!isset($_SESSION['success'])){
  header("location:login.php");
  return;
}



?>


<html>
<head>
  <title></title>
</head>

<body>
  <?php include "navbar.php";

  if(isset($_SESSION['insert']) ){
    echo "<div class='col-md-4 col-md-offset-5'><p class='text-success'>".$_SESSION['insert']."</p></div>";
    unset($_SESSION['insert']);
  }

  if(isset($_SESSION['error']) ){
    echo "<div class='col-md-4 col-md-offset-5'><p class='text-danger'>".$_SESSION['error']."</p></div>";
    unset($_SESSION['error']);
  }

  ?>

  <div class="container">
    <div class="row"></div>
    <div class="row">
      <div class="col">
        <div class="panel panel-default">
          <div class="panel-body"  style="overflow:auto">

           <h3>Welcome to the Afterschool Management System</h3>
           Please use the Navigation Bar for accessing features
         </div>
       </div>
     </div>

   </div>
   <div class="row"></div>
 </div>
</div>

</body>
</html>
