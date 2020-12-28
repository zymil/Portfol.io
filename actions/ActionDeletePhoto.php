<?php 

    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');
    include_once('../database/photos.php');

    $photo_name = $_POST['photo_name'];
    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $photo_path = "../pictures/" . $subject_name . "/" . $photo_name;
    $goBackPath = "Location: ../pages/admin.php?subject=" . $subject_id;

    if (file_exists($photo_path)) {
        unlink($photo_path);
        $_SESSION['message'] = "File Successfully Deleted!";
    } else {
        $_SESSION['message'] = "Error!";
    }

    deletePhoto($photo_name);
    header($goBackPath);

?>