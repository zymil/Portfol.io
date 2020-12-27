<?php 
    include_once('../database/connect.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');
    include_once('../cookies/cookie.php');

    $subject_name = $_POST['subject_name'];
    $admin_username = $_SESSION['username'];
    $admin_id = getStudentIdFromUsername($admin_username);

    $folder_path = NULL; // PASTA

    if(strlen($subject_name) < 3){
    $_SESSION['message'] = 'Name too short';
    header('Location: ../pages/subject_registration.php');
    die();
    }

    try {
    addSubject($subject_name, $admin_id, $folder_path);
    include_once('../cookies/cookie.php');
    $_SESSION['message'] = 'Registration Successful!';
    header("Location: ../pages/user_mainpage.php");
    } catch(PDOException $e) {
        if (strpos($e->getMessage(), 'subject.name') !== false)
            $_SESSION['message'] = 'Subject already exists!';
        else
            $_SESSION['message'] = 'Registration Successful!';
        header('Location: ../pages/subject_registration.php');
    }

    

?>