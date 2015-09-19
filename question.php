<?php
session_start();
$que=htmlentities($_POST['quename']);
if(!(isset($_SESSION['uid']) && ($_SESSION['uname']!="")))
{
	header('Location: index.php');
	exit();
}
date_default_timezone_set('Asia/Kolkata');


 	if(!$que)
	{echo '<div class="alert alert-danger"><strong>Oh !</strong> Please fill every detail and then Try Again.</div>';
	}
	else{
	include 'db_login.php';

			$que=mysql_real_escape_string($que);
			$result=mysql_fetch_array(mysql_query("SELECT 'numque' FROM user WHERE no='".$_SESSION['uid']."';"));
			$tid=$result[0]+1;
			$sql = "insert into test values (' ', '".$_SESSION['uid'].'0'.$tid."', '".$que."','".$_SESSION['uname']."', '1000.00', '0', '0', '0', '".date("d-m-Y")."');";
			$result=mysql_query($sql);
			if($result)
			{
			$result=mysql_query("UPDATE `user` SET `numque`='".$tid."' WHERE no='".$_SESSION['uid']."';");	
			$_SESSION['tid']=$_SESSION['uid'].'0'.$tid;
			$_SESSION['submitqno']=0;
			header('Location: submitque.php');}
			else{
			echo '<script type="text/javascript">alert("Oh ! It didn\'t work out.Try Again. :(");window.location.href="profile.php";</script>';
			}

			}
 ?>