<?php
error_reporting(0);
$create = !file('sajt.db');

$db = new SQLite3('sajt.db');

if($create)
    include "baza_create.php";

session_start();
$me=$_SESSION['me']; 
