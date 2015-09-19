<?php
session_start();
$time=$_GET['time'];
if(!(isset($_SESSION['time']))){
$_SESSION['time']=$time;
}
?>