<?php
session_start();
$_SESSION['me']='';
$_SESSION['rola']=0;
echo "<script>location='.'</script>";