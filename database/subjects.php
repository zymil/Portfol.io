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

        return ($stmt->fetchColumn());
    }

    function getSubjectIDFromName($subject_name){
        global $db;
        $stmt= $db->prepare('SELECT id from subject where name = ?');
        $stmt->execute(array($subject_name));

        return ($stmt->fetchColumn());
    }

    function getSubjects() {
        global $db;
        $stmt= $db->prepare('SELECT * from subject');
        $stmt->execute();

        return ($stmt->fetchAll());
    }

    function getAdmin_main($subject_id) {
        global $db;
        $stmt= $db->prepare('SELECT admin_id from subject where id = ?');
        $stmt->execute(array($subject_id));

        return ($stmt->fetchColumn());
    }

    function getAdmin_sub1($subject_id) {
        global $db;
        $stmt= $db->prepare('SELECT admin_sub1 from subject where id = ?');
        $stmt->execute(array($subject_id));

        return ($stmt->fetchColumn());
    }

    function getAdmin_sub2($subject_id) {
        global $db;
        $stmt= $db->prepare('SELECT admin_sub2 from subject where id = ?');
        $stmt->execute(array($subject_id));

        return ($stmt->fetchColumn());
    }

    function getAdmin_sub3($subject_id) {
        global $db;
        $stmt= $db->prepare('SELECT admin_sub3 from subject where id = ?');
        $stmt->execute(array($subject_id));

        return ($stmt->fetchColumn());
    }

    function addAdmin($subject_id, $student_id) {
        global $db;
        if( getAdmin_sub1($subject_id) == NULL) {
            if ((getAdmin_main($subject_id) != $student_id)
            && (getAdmin_sub2($subject_id) != $student_id)
            && (getAdmin_sub3($subject_id) != $student_id) ) {
                $stmt = $db->prepare('UPDATE subject SET admin_sub1=? WHERE id=?');
                $stmt->execute(array($student_id, $subject_id));
                return 1;
            }
            return -1;
        }
        if( getAdmin_sub2($subject_id) == NULL) {
            if ((getAdmin_main($subject_id) != $student_id)
            && (getAdmin_sub1($subject_id) != $student_id)
            && (getAdmin_sub3($subject_id) != $student_id) ) {
                $stmt = $db->prepare('UPDATE subject SET admin_sub2=? WHERE id=?');
                $stmt->execute(array($student_id, $subject_id));
                return 1;
            }
            return -1;
        }
        if( getAdmin_sub3($subject_id) == NULL) {
            if ((getAdmin_main($subject_id) != $student_id)
            && (getAdmin_sub1($subject_id) != $student_id)
            && (getAdmin_sub2($subject_id) != $student_id) ) {
                $stmt = $db->prepare('UPDATE subject SET admin_sub3=? WHERE id=?');
                $stmt->execute(array($student_id, $subject_id));
                return 1;
            }
            return -1;
        }
        if ((getAdmin_main($subject_id) == $student_id)
        || (getAdmin_sub1($subject_id) == $student_id)
        || (getAdmin_sub2($subject_id) == $student_id)
        || (getAdmin_sub3($subject_id) == $student_id) ) {
            return -1;
        }
        return 0;
    }
    
?>