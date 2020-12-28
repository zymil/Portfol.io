<?php

include_once('../cookies/cookie.php');

$db = new SQLite3("db.db");
$caught = false;

try {
$db->exec('
    PRAGMA foreign_keys = OFF;
    BEGIN TRANSACTION;


    drop table if exists photo;
    drop table if exists week_portfolio;
    drop table if exists subject_class;
    drop table if exists subject;
    drop table if exists student;



    create table student (
        id integer primary key autoincrement,
        username text not null,
        password text not null,
        email text not null,
        CONSTRAINT user_unique_error UNIQUE (email)
        CONSTRAINT user_unique_error UNIQUE (username)
    );

    insert into student (username, password, email) values ("pudim", "$2y$10$/T3ZUPfa8TJptlw1mPSVvuE9v4DW0VVRAgFYfC5vR7Xyc6piZ6/tK", "pudim@mail.com");
    insert into student (username, password, email) values ("tarte", "$2y$10$/T3ZUPfa8TJptlw1mPSVvuE9v4DW0VVRAgFYfC5vR7Xyc6piZ6/tK", "tarte@mail.com");
    insert into student (username, password, email) values ("bolo", "$2y$10$/T3ZUPfa8TJptlw1mPSVvuE9v4DW0VVRAgFYfC5vR7Xyc6piZ6/tK", "bolo@mail.com");
    insert into student (username, password, email) values ("maçã", "$2y$10$/T3ZUPfa8TJptlw1mPSVvuE9v4DW0VVRAgFYfC5vR7Xyc6piZ6/tK", "maca@mail.com");
    insert into student (username, password, email) values ("roscas", "$2y$10$/T3ZUPfa8TJptlw1mPSVvuE9v4DW0VVRAgFYfC5vR7Xyc6piZ6/tK", "roscas@mail.com");
    
    
    create table subject (
    	id integer primary key autoincrement,
    	name text not null,
    	folder_path text,
        admin_id integer references student(id) not null,
        admin_sub1 integer references student(id),
        admin_sub2 integer references student(id),
        admin_sub3 integer references student(id),
        CONSTRAINT user_unique_error UNIQUE (name)
        CONSTRAINT user_unique_error UNIQUE (folder_path)
    );

    insert into subject (name, folder_path, admin_id, admin_sub1, admin_sub2) values ("SIBD", "pictures/SIBD", 1, 3, 4);
    insert into subject (name, folder_path, admin_id, admin_sub1, admin_sub2) values ("LPRO", "pictures/LPRO", 3, 5, 2);
    insert into subject (name, folder_path, admin_id, admin_sub1) values ("TCON", "pictures/TCON", 4, 1);

    
    
    create table photo (
        id integer primary key autoincrement,
        name text not null,
        subject_id integer references subject(id) not null,
        student_id integer references student(id) not null,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP not null
    );

    insert into photo (name, subject_id, student_id) values ("alltheoptions.png", 1, 2);
    insert into photo (name, subject_id, student_id) values ("sysinfo.png", 1, 3);
    insert into photo (name, subject_id, student_id) values ("juilio.jpg", 1, 3);
    insert into photo (name, subject_id, student_id) values ("redfoxv2.png", 1, 5);
    insert into photo (name, subject_id, student_id) values ("1.jpg", 1, 1);
    insert into photo (name, subject_id, student_id) values ("HIDArduinoProof.png", 1, 5);
    insert into photo (name, subject_id, student_id) values ("immendorff.jpg", 1, 2);
    insert into photo (name, subject_id, student_id) values ("3.jpg", 2, 4);
    insert into photo (name, subject_id, student_id) values ("image.jpg", 3, 3);
    insert into photo (name, subject_id, student_id) values ("scotiapiper.jpg", 3, 1);


    COMMIT TRANSACTION;
    PRAGMA foreign_keys = ON;

    ');
} catch (PDOException $e) {
    echo ("DB ERROR: ". $e->getMessage());
    $caught=true;
    die();
}
//Nice acho que já funciona, so falta o sql
if(!$caught){
    $_SESSION['message'] = 'The Database was created successfully!';
    header('Location: ../pages/login.php');
}
?>
