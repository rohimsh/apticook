<?php	
$opt = $_GET['opt'];
$qno = $_GET['qno'];
$qid = $_GET['qid'];
$tid = $_GET['tid'];
include 'db_login.php';											
$result=mysql_fetch_array(mysql_query("SELECT * FROM question WHERE no='".$qid."';"));

if($opt==$result['ans'])
$update=mysql_query("UPDATE `response` SET `".$qno."`=1 WHERE `tid`=".$tid.";");
else if($opt=='')
$update=mysql_query("UPDATE `response` SET `".$qno."`=' ' WHERE `tid`=".$tid.";");
else
$update=mysql_query("UPDATE `response` SET `".$qno."`=0 WHERE `tid`=".$tid.";");

?>