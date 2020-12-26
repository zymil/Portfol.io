<?php
include_once('../cookies/cookie.php');

session_destroy();
header('Location: ../pages/login.php');
?>