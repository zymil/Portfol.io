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

    insert into student (username, password, email) values ("pudim", "$2y$12$88LFrKB2TJtpMAsOzC6HlepTmDXy5dYJeGviZ73zxXLHWGHs0nITa", "josepinhal2@mail.com");
    insert into student (username, password, email) values ("José Pinhal", "pw", "josepinhal@mail.com");
    insert into student (username, password, email) values ("Tozé Brito", "pw", "tozebrito@mail.com");
    insert into student (username, password, email) values ("José Cid", "pw", "josecid@mail.com");
    
    
    
    create table subject (
    	id integer primary key autoincrement,
    	name text not null,
    	folder_path text,
        admin_id integer references student(id) not null,
        CONSTRAINT user_unique_error UNIQUE (name)
        CONSTRAINT user_unique_error UNIQUE (folder_path)
    );

    insert into subject (name, folder_path, admin_id) values ("SIBD", "/SIBD", 1);
    insert into subject (name, folder_path, admin_id) values ("LPRO", "/LPRO", 3);



    create table subject_class (
    	id integer primary key autoincrement,
    	weekday text not null,
    	start_hour integer not null,
    	start_min integer not null,
    	end_hour integer not null,
    	end_min integer not null,
    	subject_id integer references subject(id) not null,
    	constraint weekday_incorrect check (weekday = "monday" OR weekday = "tuesday" OR weekday = "wednesday" OR weekday = "thursday" OR weekday = "friday"),
    	constraint start_hour_must_be_greater_than_end_hour check (end_hour >= start_hour)
    );

    insert into subject_class (weekday, start_hour, start_min, end_hour, end_min, subject_id) 
    	values (
    		"tuesday", 
    		13,
    		30,
    		14,
    		00,
    		1
    );



    create table week_portfolio (
    	id integer primary key,
    	folder_path text,
    	subject_id integer references subject(id) not null
    );

    insert into week_portfolio (id, folder_path, subject_id) values (1, "SIBD/week1", 1);

    
    
    create table photo (
        id integer primary key autoincrement,
        name text not null,
        subject_id integer references subject(id) not null,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP not null
    );

    insert into photo (name, subject_id) values ("1.jpg", 1);
    insert into photo (name, subject_id) values ("2.jpg", 1);
    insert into photo (name, subject_id) values ("3.jpg", 2);


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
