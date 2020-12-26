<?php
    include_once('../cookies/cookie.php'); //tem que se iniciar na mesma mm que sej apara destruir

    session_destroy();
    include_once('../cookies/cookie.php');
    header('Location: ../pages/login.php');
?>