<?php

    function checkSubjectExistance($subject_name) {
        global $db;  
        $stmt = $db->prepare('SELECT * FROM student WHERE username = ?');
        $stmt->execute(array($subject_name));
        return ($stmt->fetch());
    }   

    function addSubject($subject_name, $admin_id, $folder_path) {
        global $db;
        $stmt = $db->prepare('INSERT INTO subject (name, admin_id, folder_path) VALUES (?, ?, ?)');
        $stmt->execute(array($subject_name, $admin_id, $folder_path));
        return ($stmt->fetch());
    }

    function getNumberOfSubjects() {
        global $db;  
        $stmt = $db->prepare('SELECT COUNT(*) FROM subject');
        $stmt->execute();
        return ($stmt->fetch());
    }

    function getSubjectNameFromID($admin_id){
        global $db;
        $stmt= $db->prepare('SELECT name from subject where id = ?');
        $stmt->execute(array($admin_id));

        return ($stmt->fetch());
    }

    function getSubjectIDFromName($subject_name){
        global $db;
        $stmt= $db->prepare('SELECT id from subject where name = ?');
        $stmt->execute(array($subject_name));

        return ($stmt->fetch());
    }

    function getSubjects() {
        global $db;
        $stmt= $db->prepare('SELECT * from subject');
        $stmt->execute();

        return ($stmt->fetchAll());
    }
    
?>