<?php

    function checkStudent($username, $password) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM student WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        return ($user == true && password_verify($password, $user['password']));
    }

    function checkStudentExistance($username) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM student WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        return ($user == true);
    }

    function addStudent($username, $password, $email) {
        global $db;
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare('INSERT INTO student (username, password, email) VALUES (?, ?, ?)');
        $stmt->execute(array($username, $password_hashed, $email));
        $output = $stmt->fetch();
        return ($output == true);
    }
    //in development
    function savePic($username){
        move_uploaded_file($_FILES['pic']['tmp_name'], "../pictures/$username.jpg");
    }

?>