<?php
session_start();
if(!(isset($_SESSION['uid']) && ($_SESSION['uname']!="")))
{
	header('Location: index.php');
	exit();
}

if(isset($_POST['submit']))
{

 $discuss=htmlentities($_POST['discuss']);
 if($discuss==''){
	echo '<div class="alert alert-danger"><strong>Oh !</strong> Please post something, and then Try Again.</div>';
	}
	else
	{
	function check_submit($discuss)
		{include 'db_login.php';
			date_default_timezone_set('Asia/Kolkata');
			$discuss=mysql_real_escape_string($discuss);
								$result=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE no='".$_SESSION['uid']."';"));
			$sql = "insert into discuss values (' ', '".$_SESSION['uid']."', '".$_SESSION['uname']."', '".$result['image']."', '".$discuss."', '".date("d-m-Y")."', '".date("h:m")."');";
			$result=mysql_query($sql); 
				if($result)
				return true;
				else
				return false;
		}
	if(check_submit($discuss))
	{		
	echo '<div class="alert-popup"><strong>Well Done!</strong> You posted Successfuly.</div>';
	}
	else
	{	echo '<div class="alert alert-danger"><strong>Oh !</strong> Please post something, and then Try Again.</div>';
	}
	}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, submit, question, certificate" />
    <meta name="description" content="Submit Questions for Aptitude Tests for Others.">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
 <link rel="shortcut icon" href=" images/favicon.png">
    <title>AptiCook | Discussion</title>

    <!-- Bootstrap core CSS -->
    <link href=" css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	 <!-- Jquery for this template -->
	<script src=" js/jquery-latest.js"></script>
	<script>
	window.setTimeout(function() {
    $(".alert-popup").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });	
}, 1000);
	</script>
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
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AptiCook</a>
        </div>
        <div class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="welcome.php">Welcome</a></li>
            <li ><a href="taketest.php">Test</a></li>
            <li><a href="profile.php"><?php echo $_SESSION['uname'];?></a></li>
			<li ><a href="people.php">People</a></li>
            <li class="active"><a href="forum.php">Forum</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <h1><center>Discuss</center></h1>
	  <form method="POST" action=<?php $_SERVER['PHP_SELF']; ?>><center>
	  <div class="form-group">
	 <textarea name="discuss" placeholder="Discuss.." rows="2"   required autofocus class="form-control"></textarea>
	 </div>
	 <div><button type="submit" name="submit" class="btn btn-success" >Submit</button></div>
	 </center>
	 <?php
	 include 'db_login.php';
	 $result=mysql_query("SELECT * FROM discuss WHERE 1 ORDER BY no DESC;");	
	 echo '<div class="table-responsive"><table class="table" width="90%">';
	if(mysql_num_rows($result)){
			   while($row=mysql_fetch_array($result))
			         {
					 echo '<tr><td width = 5%><image class="forumimage" src="'.$row['image'].'"></image></td>';
					 echo '<td width = 85%>"'.$row['post'].'"';
					 echo '<br><a href="friend.php?fid='.$row[1].'">'.$row['uname']." posted this on ".$row['date']." at ".$row['time']."<br></td></tr>";
					 }
	}
	echo "</table>";
	?>
	</div></div>
        <p class="text-muted"><center>&copy; 2014 Rohit Mishra </center></p>
<!-- START OF HIT COUNTER CODE -->
<br><script language="JavaScript" src="http://www.counter160.com/js.js?img=6"></script><br><a href="http://www.000webhost.com"><img src="http://www.counter160.com/images/6/left.png" alt="Apticook Counter" border="0" align="texttop"></a><a href="http://www.hosting24.com"><img alt="Apticook Visitors" src="http://www.counter160.com/images/6/right.png" border="0" align="texttop"></a>
<!-- END OF HIT COUNTER CODE -->		
<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	  </body>
	  </html>