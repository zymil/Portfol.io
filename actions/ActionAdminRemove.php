<?php 
    include_once('../database/connect.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');
    include_once('../cookies/cookie.php');

    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $username = $_SESSION['username'];

    $page_path = "Location: ../pages/admin_remove.php?subject=" . $subject_id;

    if(removeAdmin($subject_id, $student_id) == 0){
        $_SESSION['message'] = "Error!";
        header($page_path);
        die();
    }
    else {
        include_once('../cookies/cookie.php');
        $_SESSION['message'] = getStudentUsernameFromId($student_id) . ' Removed';
        header($page_path);
    }

    

?>