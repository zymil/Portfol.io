<?php 

    include_once('../database/accounts.php');
    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');

    if($_POST['password'] === $_POST['password_confirmation'])
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email    = $_POST['email'];

      if(!checkStudentExistance($username)) {
        if(!addStudent($username, $password, $email)) {
          header("Location: ../pages/login.php");
        } 
        else {
          echo ("add error");
        }
      } 
      else {
        echo ("username exists");
        $_SESSION['message'] = 'Username already taken!';
      }
    }
    else {
      echo ("pw not same");
      $_SESSION['message'] = 'Passwords must match!';
    }
?>