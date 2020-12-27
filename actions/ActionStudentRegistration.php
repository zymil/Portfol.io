<?php 
    include_once('../database/connect.php');
    include_once('../database/students.php');
    include_once('../cookies/cookie.php');

    if($_POST['password'] === $_POST['password_confirmation'])
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email    = $_POST['email'];

      if(strlen($password) < 4){
        $_SESSION['message'] = 'Password too short';
        header('Location: ../pages/student_registration.php');
        die();
      }

      try {
        addStudent($username, $password, $email);
        include_once('../cookies/cookie.php');
        $_SESSION['username'] = $username;
        $_SESSION['message'] = 'Registration Successful!';
        header("Location: ../pages/login.php");
        } catch(PDOException $e) {
            if (strpos($e->getMessage(), 'student.username') !== false)
                $_SESSION['message'] = 'Username already exists!';
            else if (strpos($e->getMessage(), 'student.email') !== false)
                $_SESSION['message'] = 'Email already exists!';
            else
                $_SESSION['message'] = 'Registration failed!';
            header('Location: ../pages/student_registration.php');
        }
    } 
    else $_SESSION['message'] = 'Passwords have to match and you must fill all boxes!';

?>