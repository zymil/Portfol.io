<?php 

    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');
    include_once('../database/photos.php');

    $photo_name=$_POST['photo_name'];
    $subject_id=$_POST['subject_id'];
    $goBackPath = "Location: ../pages/admin.php?subject=" . $subject_id;

    deletePhoto($photo_name);
    header($goBackPath);

?>