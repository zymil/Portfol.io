<?php 
  include_once('../cookies/cookie.php');
  include_once('../database/students.php');
  include_once('../database/connect.php');


    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkStudent($username, $password)) {
      $_SESSION['username'] = $username;
      header('Location: ../pages/user_mainpage.php'); 
    } else {
      $_SESSION['message'] = 'Login Failed';
      header('Location: ../pages/login.php');
    }
?>