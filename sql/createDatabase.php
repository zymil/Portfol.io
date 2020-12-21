<?php

$db = new SQLite3("db.db");
$caught = false;

try {
$db->exec('


    ');
} catch (PDOException $e) {
    echo ("DB ERROR: ". $e->getMessage());
    $caught=true;
    die();
}
//Nice acho que já funciona, so falta o sql
if(!$caught){
    echo ("The Database was created successfully ");
}
?>
