<?php
session_start();
if(!(isset($_SESSION['uid']) && ($_SESSION['uname']!="")))
{
	header('Location: index.php');
	exit();
}

if(isset($_POST['submit']))
{
 $que=htmlentities($_POST['que']);
 $opt1=htmlentities($_POST['opt1']);
 $opt2=htmlentities($_POST['opt2']);
 $opt3=htmlentities($_POST['opt3']);
 $opt4=htmlentities($_POST['opt4']);
 $ans=htmlentities($_POST['ans']);
 echo $que;
 echo $opt1;
 echo $opt2;
 echo $opt3;
 echo $opt4;
 echo $ans;
 if($opt1!=''&&$opt2!=''&&$opt3!=''&&$opt4!=''){
	if(!$que||!$ans)
	{echo '<div class="alert alert-danger"><strong>Oh !</strong> Please fill every detail and then Try Again.</div>';
	}
	else
	{
	function check_submit($que, $opt1, $opt2, $opt3, $opt4, $ans)
		{include 'db_login.php';
			$que=mysql_real_escape_string($que);
			$opt1=mysql_real_escape_string($opt1);
			$opt2=mysql_real_escape_string($opt2);
			$opt3=mysql_real_escape_string($opt3);
			$opt4=mysql_real_escape_string($opt4);
			$ans=mysql_real_escape_string($ans);
			$sql = "insert into question values (' ', '".$que."', '".$opt1."', '".$opt2."', '".$opt3."', '".$opt4."', '".$ans."', '".$_SESSION['uid']."','".$_SESSION['tid']."','0');";
			$result=mysql_query($sql); 
				if($result)
				return true;
				else
				return false;
		}
	if(check_submit($que, $opt1, $opt2, $opt3, $opt4, $ans))
	{			if($_SESSION['submitqno']==30)
				{header('Location: welcome.php');
				exit;}
				$_SESSION['submitqno']++;
				 header('Location: submitque.php', true, 303);
				exit;
				
	}
	else
	{echo '<script>window.history.back();</script>';
	}
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
    <title>AptiCook | Submit Questions</title>

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
<?php echo '<div class="alert-popup"><strong>Well Done!</strong> You added  Question '.$_SESSION['submitqno'].' to DataBase.</div>';?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <form method="POST" action=<?php $_SERVER['PHP_SELF']; ?>><center>
	  <div class="form-group">
	 <textarea name="que" placeholder="Question" rows="4" cols="100"  required autofocus class="form-control"></textarea><br>
	 </div>
	 <div class="form-group">
	 <input type="text" name="opt1"   placeholder="First Option" maxlength=100 size=50 required class="form-control"></input>
	 </div>
	 <div class="form-group">
	 <input type="text" name="opt2"   placeholder="Second Option" maxlength=100 size=50 required class="form-control"></input>
	 </div>
	 <div class="form-group">
	 <input type="text" name="opt3"   placeholder="Third Option" maxlength=100 size=50 required class="form-control"></input>
	 </div>
	 <div class="form-group">
	 <input type="text" name="opt4"   placeholder="Fourth Option" maxlength=100 size=50 required class="form-control"></input>
	 </div>
	 <div class="form-group">
	 <input type="text" name="ans"   placeholder="Correct Option like a, b, c or d" maxlength=100 size=50 required class="form-control"></input>
	 </div>
      <div><button type="submit" name="submit" class="btn btn-success" >Submit this Question</button></div>
		</div></div>
        <p class="text-muted"><center>&copy; 2014 Rohit Mishra </center></p>

   <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
	  </body>
	  </html>