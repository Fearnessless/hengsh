<?php
session_start();

$_SESSION=array();

setcookie('PHPSESSID','',time()-1,'/');

session_destroy();

echo "<script>window.location.replace('index.html');</script>";
?>