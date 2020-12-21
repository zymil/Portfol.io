<?php

    //adds user to Database with hashed password
    function createUser($username, $password) {
        global $db;
        $stmt = $db->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
        $stmt->execute([$username, sha1($password)]);
        return $stmt->fetch();  
    }
    
    function verifyUser($username, $password) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        return ($user !== false && password_verify($password, $user['password']));
    }

?>