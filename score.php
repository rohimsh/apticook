<?php
session_start();
$testid=htmlentities($_GET['testid']);
unset($_SESSION['time']);
if(!(isset($_SESSION['uid']) && ($_SESSION['uname']!="")))
{
	header('Location: index.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="Apticook, apticook,aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, money, career, certificate" />
    <meta name="description" content=" Get your Score and analysis of your Test in Aptitude.">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
 <link rel="shortcut icon" href=" images/favicon.png">
    <title>AptiCook | Score</title>

    <!-- Bootstrap core CSS -->
    <link href=" css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="  docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body background=" images/background.jpg">

 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AptiCook</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		   <li ><a href="welcome.php">Welcome</a></li>
            <li class="active"><a href="taketest.php">Test</a></li>
            <li><a href="profile.php"><?php echo $_SESSION['uname'];?></a></li>
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
  <?php
  
include 'db_login.php';
$link=mysql_fetch_array(mysql_query("SELECT * FROM response WHERE tid='".$_SESSION['tid']."';"));
$row=mysql_fetch_array(mysql_query("SELECT * FROM test WHERE tid='".$testid."';"));

$point=0;
for($i=1;$i<=30;$i++)
	{
	if($link[$i]!=' ')
	{
	
	if($link[$i])
	$point+=3;
	else
	$point-=1;
	}
	}
	date_default_timezone_set('Asia/Kolkata');
	$urating=($point-$row['avgscore']);
	$row['avgscore']=($row['avgscore']*$row['takenby']+$point)/(++$row['takenby']);
	$testrating=$row['rating'];
	$testrating-=$urating;
	$testrating/=$row['takenby'];
	$update=mysql_query("UPDATE test SET  `rating`=`rating`+'".$testrating."', takenby='".$row['takenby']."', avgscore+='".$row['avgscore']."' WHERE tid='".$testid."'");
	$update=mysql_query("UPDATE user SET  `rating`=`rating`+'".$urating."', score='".$point."' WHERE no='".$_SESSION['uid']."'");
	$update=mysql_query("INSERT INTO score VALUES (".$_SESSION['tid'].", ".$testid.", ".$_SESSION['uid'].", ".$point.", ".$urating.", '".date('d-m-Y h:m:s')."');");
	echo "<center>Congratulations ! Your Score is ".$point."<br><br><a class='btn btn-lg btn-primary' href='answers.php?testid=".$testid."' role='button'>Click here to view the Answers &raquo;</a>";
	
?>		
  </div>

    </div> <!-- /container -->
    <p class="text-muted"><center>&copy; 2014 Rohit Mishra </center></p>
	
<!-- START OF HIT COUNTER CODE -->
<br><script language="JavaScript" src="http://www.counter160.com/js.js?img=6"></script><br><a href="http://www.000webhost.com"><img src="http://www.counter160.com/images/6/left.png" alt="Apticook Counter" border="0" align="texttop"></a><a href="http://www.hosting24.com"><img alt="Apticook Visitors" src="http://www.counter160.com/images/6/right.png" border="0" align="texttop"></a>
<!-- END OF HIT COUNTER CODE -->
			
  <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>		
  </body>
</html>
