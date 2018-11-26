 <?php // Do not put any HTML above this line
SESSION_START();
//
// error_log("");
// error_log("");
require_once "connection.php";
require_once "bootstrap.php";
include "checkPassword.php";


if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$user = 'umsi@umich.edu';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is meow123

$failure = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
          $failure = "Username and password are required";
		      error_log("Login fail ".$failure);
          $_SESSION['error']=$failure;
          header("Location: login.php");
          return;

    } else {



      $check = hash('md5', $salt.$_POST['pass']);
      // error_log("Username= ".$_POST['email']);
      // error_log("Password= ".$_POST['pass']);
      // error_log("hash1= ".$check);
      // error_log("hash2= ".$stored_hash);

      $username = $_POST['email'];
      $pass = $_POST['pass'];

      $login = check($username, $pass);
      if($login==1){
        $_SESSION['success']=1;
        header("Location: index.php");
        return;
          }else {
                error_log("Row not found");
                $failure = "Incorrect password";
                error_log("Login fail ".$row['name'].$check);
                $_SESSION['error']=$failure;
                header("Location: login.php");
                return;
              }
				}
    }

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<link href="signin.css" rel="stylesheet">
<title>Dhruv Gupta Login Page</title>
</head>
<body class="text-center">
  <script src="login.js"></script>
<div class="container">
<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
  }

?>

  <form id='login' class="form-signin" method="POST">

    <img class="mb-4" src="KarateGirlicon.png" alt="" width="100" height="100">
    <label for="email" class="sr-only">User Name</label>
    <input type="text" name="email" id="email"  class="form-control">
    <label for="pass" class="sr-only">Password</label>
    <input type="password" class="form-control" name="pass" id="pass"><br/>





    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Log In" onclick="return doValidate();">
    <!-- <input type="submit" name="cancel" value="Cancel"> -->
  </form>
<p>

<!-- Hint: The password is the four character sound a cat
makes (all lower case) followed by 123. -->
</p>
</div>

</body>
</html>
