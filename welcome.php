<?php
session_start();
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
	<meta name="keywords" content="Apticook, apticook, aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, money, career, certificate" />
    <meta name="description" content="Welcome to AptiCook, The unique Platform to test your Aptitude Skills for FREE!.">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
    <link rel="shortcut icon" href=" images/favicon.png">

    <title>AptiCook | Welcome</title>

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
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AptiCook</a>
        </div>
        <div class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Welcome</a></li>
            <li ><a href="taketest.php">Test</a></li>
            <li><a href="profile.php"><?php echo $_SESSION['uname'];?></a></li>
			<li ><a href="people.php">People</a></li>
            <li ><a href="forum.php">Forum</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  <!---->
  
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1><center>Welcome <?php echo $_SESSION['uname']?> !</center></h1>
		<h2><u>Rules for taking Test:</u></h2>
        <p>You can choose one of the tests going on in the Test page by clicking on the test name.
Test duration is 45 minutes and there is +3 for Correct whereas -1 for Wrong Answers. Mark your Response by clicking on the radio button corresponding to that option. You can delete your response for any Question by clicking on the Reset Button below that question.</p>
        <p>Click the Submit Button on completion or the test will automatically end after 45 minutes from the time you start taking Test.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="taketest.php" role="button">Click here to Take a Test &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->
<p class="text-muted"><center>&copy; 2014 Rohit Mishra </center></p>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!-- START OF HIT COUNTER CODE -->
<br><script language="JavaScript" src="http://www.counter160.com/js.js?img=6"></script><br><a href="http://www.000webhost.com"><img src="http://www.counter160.com/images/6/left.png" alt="Apticook Counter" border="0" align="texttop"></a><a href="http://www.hosting24.com"><img alt="Apticook Visitors" src="http://www.counter160.com/images/6/right.png" border="0" align="texttop"></a>
<!-- END OF HIT COUNTER CODE -->
 <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>       
  </body>
</html>

