<?php

    function addSubject($subject_name, $student_id, $folder_path) {
        global $db;
        $stmt = $db->prepare('INSERT INTO subject (name, folder_path, admin_id) VALUES (?, ?, ?)');
        $stmt->execute(array($subject_name, $folder_path, $student_id));
        return ($stmt->fetch());
    }

    function getNumberOfSubjects() {
        global $db;  
        $stmt = $db->prepare('SELECT COUNT(*) FROM subject');
        $stmt->execute();
        return ($stmt->fetch());
    }

    function getFolderPathFromName($subject_name) {
        global $db;
        $stmt= $db->prepare('SELECT folder_path from subject where name = ?');
        $stmt->execute(array($subject_name));

        return ($stmt->fetch());
    }

    function getFolderPathFromID($admin_id){
        global $db;
        $stmt= $db->prepare('SELECT folder_path from subject where id = ?');
        $stmt->execute(array($admin_id));

        return ($stmt->fetch());
    }
?>