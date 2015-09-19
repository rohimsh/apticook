<?php
session_start();
$passkey=$_GET['passkey'];
include 'db_login.php';
		$result1=mysql_query("SELECT * FROM `tempuser` WHERE confirmcode ='".$passkey."' ");
// If successfully queried 
if($result1){
// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "tempuser"
if($count==1){ 
$rows=mysql_fetch_array($result1);
$Name=$rows['Name'];
$Email=$rows['Email'];
$Pass=$rows['Pass']; 

			$sql = mysql_query("insert into user values (' ', '".$Name."', '".($Email)."', 'images/thumbnails/notavailablem.jpg', ' ', ' ','1000',' ', '".$Pass."', ' ', ' ', '1');");
			}
// if not found passkey, display message "Wrong Confirmation code" 
else {
echo "<div class='alert alert-danger'>Wrong Confirmation code</div>";
}
// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($sql){
$sql = mysql_query("DELETE FROM `tempuser` WHERE confirmcode='".$passkey."' ");
$_SESSION['uid']=$no;
$_SESSION['uname']=$Name;

header('Location: welcome.php');
}
}
else{
echo "<div class='alert alert-danger'>Sorry ,perhaps we were unable to connect to our database.</div>";
}
?>