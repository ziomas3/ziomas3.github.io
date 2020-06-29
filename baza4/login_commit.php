<?php
include "baza.php";
session_start();

if($_POST['login']=='admin' && $_POST['password']=='tajne')
    { $_SESSION['admin']=true;

      echo "zalogowano pomyślnie";
    }
header("location:.");