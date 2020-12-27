<?php

    function addPhoto($name, $subject_id, $student_id) {
        global $db;
        $stmt = $db->prepare('INSERT INTO photo (name, subject_id, student_id) VALUES (?, ?, ?)');
        $stmt->execute(array($name, $subject_id, $student_id));
        return ($stmt->fetch());
    }

    function getNumberOfSubjectPhotos($subject_id) {
        global $db;  
        $stmt = $db->prepare('SELECT COUNT(*) FROM photo where subject_id = ?');
        $stmt->execute(array($subject_id));
        return ($stmt->fetch());
    }

    function getPhotoPathFromID($photo_id){
        global $db;
        $stmt= $db->prepare('SELECT photo_path from photo where id = ?');
        $stmt->execute(array($photo_id));

        return ($stmt->fetch());
    }
    
    function getSubjectPhotos($subject_id) {
        global $db;
        $stmt= $db->prepare('SELECT * from photo where subject_id = ?');
        $stmt->execute(array($subject_id));

        return ($stmt->fetchAll());
    }
?>