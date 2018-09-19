<?php


  function check($username, $pass){
    include "connection.php";
    $salt = 'XyZzy12*_';

    $check = hash('md5', $salt.$pass);
    $stmt = $pdo->prepare('SELECT user_id, firstName FROM users WHERE username = :em AND password = :pw');
    $stmt->execute(array( ':em' => $username, ':pw' => $check));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row===false){
      return(0);
    } else {

      $_SESSION['name'] = $row['firstName'];
      $_SESSION['user_id'] = $row['user_id'];
      return(1);
    };

  }
?>
