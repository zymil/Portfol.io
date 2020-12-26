<?php

    function checkStudent($username, $password) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM student WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        return (($user == true) && password_verify($password, $user['password']));
    }

    function checkStudentExistance($username) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM student WHERE username = ?');
        $stmt->execute(array($username));
        return ($stmt->fetch());
    }

    function addStudent($username, $password, $email) {
        global $db;
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare('INSERT INTO student (username, password, email) VALUES (?, ?, ?)');
        $stmt->execute(array($username, $password_hashed, $email));
        return ($stmt->fetch());
    }

    function getStudentIdFromUsername($username) {
        global $db;
        $stmt= $db->prepare('SELECT id from student where username = ?');
        $stmt->execute(array($username));

        return ($stmt->fetchColumn());
    }

    

?>