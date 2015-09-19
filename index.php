<?php
session_start();
if(isset($_POST['submit']))
{
 $Email=htmlentities($_POST['Email']);
 $Pass=htmlentities($_POST['Pass']);
	if(!$Email||!$Pass)
	 {echo '<div class="alert-dangerpopup"><strong>Oh !</strong> Please fill Email and Password and then Try Again.</div>';
	 }
 else
	{
	function check_login($Email, $Pass)
		{include 'db_login.php';
			$Pass=mysql_real_escape_string($Pass);
			$Email=mysql_real_escape_string($Email);
			$sql = mysql_query("SELECT * FROM user WHERE EMAIL='".$Email."';");
			
			$result=mysql_fetch_array($sql); 
				if($result)
				{
				if(MD5($Pass.$quark)==$result[8])
				{
				$_SESSION['uid']=$result[0];
				$_SESSION['uname']=$result[1];
				return true;
				}
				}
				else
				return false;
		}
	if(check_login($Email, $Pass))
	{
	header('Location: welcome.php');	
	}
	else
	{echo ' <div class="alert-dangerpopup"><strong>Oh !</strong>Sorry, No Such combination found. Try Again.</div>';
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
	<meta name="keywords" content="aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, money, career, certificate" />
    <meta name="description" content="Compare your Aptitude Skills with others in world for Free!">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
 <link rel="shortcut icon" href="images/favicon.png">
    <title>AptiCook </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/style.css" rel="stylesheet">
	<!-- Custom javascript for this template -->
	<script src="js/jquery-latest.js"></script>
	<script>
	window.setTimeout(function() {
    $(".alert-dangerpopup").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });	
}, 4000);
	</script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="  docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

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
          <form class="navbar-form navbar-right" action="<?php $_SERVER['PHP_SELF']; ?>" method='POST' role="form">
            <div class="form-group">
              <input type="text" name="Email" placeholder="Email" class="form-control" autofocus>
            </div>
            <div class="form-group">
              <input type="password" name="Pass"  placeholder="Password" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Test your Aptitude !</h1>
        <p>AptiCook is the place for showcasing your aptitude skills to others in world. It helps in preparing for the tests taken by companies as a part of their recruitment process and also for MBA entance exams. Sign up &amp; start scoring. Did i tell you,  it's completely FREE..! Happy Apti ;)</p>
        <p><a class="btn btn-primary btn-lg"  href="signup.php" role="button">Sign up &raquo;</a></p>
      </div>
    </div>

    <div class="container">
     <!--  Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>What..?</h2>
          <p>AptiCook is a tool which you can use for assessing your Aptitude Skills. You can take as many tests as you wish for and improve your rating!</p>
           <!-- <p><a class="btn btn-default" href="" role="button">Read More &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
          <h2>Why..?</h2>
			<p>Because there is no other Platform available to analyse your Aptitude skills and know where do you stand as compared to other aspirants in world.</p>
			 <!-- <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>-->
       </div>
        <div class="col-md-4">
          <h2>How..?</h2>
		  <p>There are several tests going on. Take any test and see how well do you perform. Each test has varied level of difficulty.  </p>
         <!--   <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>-->
        </div>
      </div>

    </div> <!-- /container -->
  <p class="text-muted"><center>&copy; 2014 <a href="//facebook.com/rohitmishra.nitjsr">Rohit Mishra </center></a></p>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=" js/jquery-1.10.2.min.js"></script>
    <script src=" js/bootstrap.min.js"></script>

      
   

  </body>
</html>
