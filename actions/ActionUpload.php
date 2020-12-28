<?php

  include_once('../database/connect.php');
  include_once('../cookies/cookie.php');
  include_once('../database/students.php');
  include_once('../database/subjects.php');
  include_once('../database/photos.php');

$subject_id = $_POST['subject_id'];

$main_dir = "../pictures/";
$subject_name = $_POST['subject_name'];
$admin_page = $_POST['admin_page'];

if($admin_page) {
  $goBackPath = "Location: ../pages/admin.php?subject=" . $subject_id;
} else {
  $goBackPath = "Location: ../pages/list_gallery.php?subject=" . $subject_id;
}
$full_path = $main_dir . $subject_name . "/";

if (!file_exists($full_path)) {
  mkdir($full_path, 0777, true);
}

$target_file = $full_path . basename($_FILES["photoToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photoToUpload"]["tmp_name"]);
  if($check !== false) {
    $_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $_SESSION['message'] = "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  session_start();
  $_SESSION['message'] = "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photoToUpload"]["size"] > 700000) {
  session_start();
  $_SESSION['message'] = "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  session_start();
  $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header($goBackPath);
// if everything is ok, try to upload file
} else {
  session_start();
  if (move_uploaded_file($_FILES["photoToUpload"]["tmp_name"], $target_file)) {
    $_SESSION['message'] = "The file ". htmlspecialchars( basename( $_FILES["photoToUpload"]["name"])). " has been uploaded.";
    addPhoto(basename($_FILES["photoToUpload"]["name"]), $subject_id, getStudentIdFromUsername($_SESSION['username']));
    header($goBackPath);
  } else {
    $_SESSION['message'] = "Sorry, there was an error uploading your file.";
    header($goBackPath);
  }
}
?>