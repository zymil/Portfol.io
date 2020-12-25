<?php
session_start();

  $db = new PDO('sqlite:../database/db.db');
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->query('PRAGMA foreign_keys = ON');

  if($db == NULL){
    throw new Exception("Failed to open database");
  }
?>
