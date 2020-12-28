<?php 
    include_once('../database/connect.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');
    include_once('../cookies/cookie.php');

    $new_admin_username = $_POST['new_admin_username'];
    $subject_id = $_POST['subject_id'];
    $admin_username = $_SESSION['username'];
    $admin_id = getStudentIdFromUsername($admin_username);
    $new_admin_id = getStudentIdFromUsername($new_admin_username);
    $page_path = "Location: ../pages/admin_add.php?subject=" . $subject_id;

    $folder_path = NULL; // PASTA

    if(!checkStudentExistance($new_admin_username)){
        $_SESSION['message'] = "Username doesn't exist";
        header($page_path);
        die();
    }

    $result = addAdmin($subject_id, $new_admin_id);
    if($result == 0) {
        $_SESSION['message'] = 'Maximum of 3 Extra Administrators';
        header($page_path);
        die();
    } else if ($result == -1){
        include_once('../cookies/cookie.php');
        $_SESSION['message'] = 'Username Already an Administrator';
        header($page_path);
    } else {
        include_once('../cookies/cookie.php');
        $_SESSION['message'] = 'Username Added';
        header($page_path);
    }

    

?>