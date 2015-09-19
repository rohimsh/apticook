<?php
session_start();
$testid=$_GET['id'];

if(!(isset($_SESSION['uid']) && ($_SESSION['uname']!="")))
{
	header('Location: index.php');
	exit();
}
if(!(isset($_SESSION['time'])))
{
echo '<script type="text/javascript">
var oye = new Date();
oye = oye.getTime();
settime();
function settime(){
var req;
req = new XMLHttpRequest();
req.open("GET","settime.php?time="+oye,true); 
req.send();
}</script>';
}
else
{
echo '<script type="text/javascript">
var oye='.$_SESSION['time'].';
</script>';
}

if(!(isset($_SESSION['tid']) && ($_SESSION['tid']!=""))){

include 'db_login.php';
			$queryuser=mysql_query("UPDATE user SET `numtest`=`numtest`+1 WHERE no='".$_SESSION['uid']."';");
			$queryuser=mysql_query("UPDATE test SET `takenby`=`takenby`+1 WHERE tid='".$testid."';");
			$queryuser=mysql_query("SELECT `numtest` FROM user WHERE no='".$_SESSION['uid']."';");
			$ans=mysql_fetch_array($queryuser);
			$_SESSION['tid']=$_SESSION['uid'].'0'.$ans[0];
			$query=mysql_query("insert into response values ('".$_SESSION['tid']."', '".$testid."', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');");

}

$tid=$_SESSION['tid'];
echo'<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="Apticook, apticook, aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, money, career, certificate" />
    <meta name="description" content="Take a 45 minutes Test and see where you stand in Aptitude..">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
 <link rel="shortcut icon" href=" images/favicon.png">
    <title>AptiCook | Test</title>

    <!-- Bootstrap core CSS -->
    <link href=" css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Dont actually copy this line! -->
    <!--[if lt IE 9]><script src="  docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

<body onload="startTimer();"  background=" images/background.jpg">
<script>
if(document.refreshForm.visited.value=="")
{
 startTimer();
}
</script>
<script type="text/javascript">
var running = false;
var endTime = null;
var timerID = null;
function startTimer() {
running = true;


// change last multiple for the number of minutes

endTime =oye +(1000 * 60 * 135);

showCountDown();
}

function showCountDown() {
var now = new Date();
now = now.getTime();

if (endTime - now == 0) {
//stopTimer();
alert("Time is up.");
document.FORM.submit();

} else {
var delta = new Date(endTime - now);

var theMin = delta.getMinutes();
var theSec = delta.getSeconds();
var theTime = theMin;
if(theMin==59){alert("Time is up.");
document.FORM.submit();}
theTime += ((theSec < 10) ? ":0" : ":") + theSec;
document.forms[0].timerDisplay.value = theTime;
if (running) {
timerID = setTimeout("showCountDown()",1000);
}
}
}
function stopTimer() {
clearTimeout(timerID);
running = false;
document.forms[0].timerDisplay.value = "00:00";

}
</script>
  
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AptiCook</a>
		 <ul class="nav navbar-nav"><li class="active"><form ><input type="text" name="timerDisplay" value="0:00" style="margin-top:3px;padding-top:3px;margin-bottom:-5px;height:35px;font-size:22px;font-weight:bold;width:60px;background-color:#f8f8f8;color:black;"></input></form></li></ul>
        </div>
           <div class="navbar-collapse collapse">        
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="welcome.php">Welcome</a></li>
            <li class="active"><a href="taketest.php">Test</a></li>
            <li><a href="profile.php">'.$_SESSION['uname'].'</a></li>
			<li ><a href="people.php">People</a></li>
            <li ><a href="forum.php">Forum</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  
  
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1><center>Test</center></h1>';
		echo '<div class="alert-popup"><strong>All the Best '.$_SESSION['uname'].' !</strong> ;)</div>';	
										include 'db_login.php';
										 $result=mysql_query("SELECT * FROM question WHERE tid='".$testid."' LIMIT 30;");
		                                 if(mysql_num_rows($result)){
			                              while($row=mysql_fetch_array($result))
			                               {				                           	                            
											 { echo '<br>Q.'.$row["no"].'  &nbsp;'.$row['question'].'';
											 echo '<form action="response.php?tid='.$tid.'"><br><table class="table" width="1024px"><tr><td width="50%" ><input type="radio" name="response" value="a" onclick="getans('.$row["no"].', '.$row["no"].', '.$tid.', this.value)"  /> '.$row['opt1'].'</input> </td>';
											 echo '<td width="50%" ><input type="radio" name="response" value="b" onclick="getans('.$row["no"].', '.$row["no"].', '.$tid.', this.value)" /> '.$row['opt2'].'</input> </td></tr>';
											 echo '<tr><td width="50%" ><input type="radio" name="response" value="c" onclick="getans('.$row["no"].', '.$row["no"].', '.$tid.', this.value)" /> '.$row['opt3'].'</input> </td>';
											 echo '<td width="50%" ><input type="radio" name="response" value="d" onclick="getans('.$row["no"].', '.$row["no"].', '.$tid.', this.value)" /> '.$row['opt4'].'</input></td></tr> </table><input type="Reset" name="response" onClick="getans('.$row["no"].', '.$row["no"].', '.$tid.', this.value)" ></input>   </form>';
											 
											 }
				                             }
											 
											 echo '<br><br><form name="FORM" id="FORM" action=score.php?testid='.$testid.' method="post"><center><input type="submit"  value="Submit" class="btn btn-large btn-primary" ></form></center>';
				                         }
										else {
			                    echo "<center><h3>No Questions at this time... :)</h3></center>";
		                                }
?>
<script type="text/javascript">
function getans(str1, str3, str4, str2)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("response").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","response.php?qid="+str1+"&qno="+str3+"&tid="+str4+"&opt="+str2,true);
xmlhttp.send();
}

</script>
	<script src=" js/jquery-latest.js"></script>
	<script>
	window.setTimeout(function() {
    $(".alert-popup").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });	
}, 1000);
	</script>
	</div></div>
	<p class="text-muted"><center>&copy; 2014 Rohit Mishra </center></p>
<!-- START OF HIT COUNTER CODE -->
<br><script language="JavaScript" src="http://www.counter160.com/js.js?img=6"></script><br><a href="http://www.000webhost.com"><img src="http://www.counter160.com/images/6/left.png" alt="Apticook Counter" border="0" align="texttop"></a><a href="http://www.hosting24.com"><img alt="Apticook Visitors" src="http://www.counter160.com/images/6/right.png" border="0" align="texttop"></a>
<!-- END OF HIT COUNTER CODE -->
  <script src=" js/jquery-1.10.2.min.js"></script>
    <script src=" js/bootstrap.min.js"></script>
	</body>
</html>