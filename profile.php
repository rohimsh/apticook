<?php
session_start();
if(!(isset($_SESSION['uid']) && ($_SESSION['uname']!="")))
{
	header('Location: index.php');
	exit();
}
if(isset($_POST['submit']))
{
	$name=htmlentities($_POST['name']);
	$univ=htmlentities($_POST['univ']);
	$branch=htmlentities($_POST['branch']);
	$npass=htmlentities($_POST['npass']);
	$cpass=htmlentities($_POST['cpass']);
	
	
	if(!$name)
	{echo ' <div class="alert alert-danger"><strong>Oh !</strong> Please fill your Name and then Try Again.</div>';
	}
 else
	{
	
function check_profile($name, $univ, $branch, $npass, $cpass)
		{include 'db_login.php';
			$name=mysql_real_escape_string($name);
			$npass=mysql_real_escape_string($npass);
			$cpass=mysql_real_escape_string($cpass);
			$result=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE no='".$_SESSION['uid']."';"));
			if($cpass!=''){
			if((MD5($cpass.$quark))==$result['pass']){
		    $sql = mysql_query("UPDATE `user` SET `name`='".$name."', `univ`='".$univ."',`branch`='".$branch."',`pass`='".MD5($npass.$quark)."' WHERE no='".$_SESSION['uid']."';");	
			return true;
			}
			else
				return false;
				}
			else
			{
		    $sql = mysql_query("UPDATE `user` SET `name`='".$name."',`univ`='".$univ."',`branch`='".$branch."' WHERE no='".$_SESSION['uid']."';");			
			if($sql)
			return true;
			}
		}
		if(check_profile($name, $univ, $branch, $npass, $cpass))
			{	echo '<script type="text/javascript">alert("Changes have been made to the DataBase!");window.location.href="profile.php";</script>';
			}
		else
			{echo ' <div class="alert alert-danger"><strong>Oops !</strong> Password was INCORRECT or Something else was WRONG...</div>';
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
    <meta name="description" content="Edit and Update Your Profile on AptiCook. Be Smart. Change how you look!">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
    <link rel="shortcut icon" href=" images/favicon.png">

    <title>AptiCook | <?php echo $_SESSION['uname']?></title>

    <!-- Bootstrap core CSS -->
    <link href=" css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	<script src=" js/jquery-latest.js"></script>
		<script>
	window.setTimeout(function() {
    $(".alert-popup").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });	
}, 3000);
function question(){ 
var quename=prompt("Give this TEST a Name:");
if(quename){
<?php $quename?> var quename <?phpecho ;?>
window.location.href="question.php";
}
}
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
            <li class="active"><a href="profile.php"><?php echo $_SESSION['uname'];?></a></li>
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
  <?php
include 'db_login.php';
$obj=mysql_connect($db_host,$db_username,$db_password) or die('Error connecting to mysql');
					mysql_select_db($db_database, $obj);
					if(!$obj)
					{
						echo ' <div class="alert alert-danger"><strong>Oh !</strong> Unable to Connect to DataBase. Please Try Again.</div>';
						exit;
					}
					$result=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE no='".$_SESSION['uid']."';"));
					echo '<div class="row"> <div class="col-xs-6 col-md-4">
					<img class="featurette-image img-responsive" src="'.$result[3].'"></img><form id="imageform" method="POST" enctype="multipart/form-data" action="ajax.php?id='.$_SESSION["uid"].'"><center><input type="file" name="photoimg" id="photoimg" size="1"></input><button type="submit" name="submit" class="btn btn-lg btn-success">Upload</button></form></center></div>';
					echo '  <div class="col-xs-6 col-md-4"><form class="form-signin" action="'.$_SERVER['PHP_SELF'].'" method="POST" role="form"> <h2>Change Password</h2><table ><tr><td><input type="password" name="cpass" placeholder="Current Password" class="form-control"></input></td></tr>
					<tr><td><input type="password" name="npass" placeholder="New Password" class="form-control"></input></td></tr></table></div>';
	
					echo'  <div class="col-xs-6 col-md-4"><div class="table-responsive"><table class="table"><tr><td>Name :  </td><td>&nbsp;</td><td><input type="text" name="name" value="'.$_SESSION['uname'].'" class="form-control" required ></input></td></tr>';
					echo '<tr><td>University :  </td><td>&nbsp;</td><td><input type="text" name="univ" value="'.$result[4].'" class="form-control"  ></input></td></tr>';
					echo '<tr><td>Branch :  </td><td>&nbsp;</td><td><input type="text" name="branch" value="'.$result[5].'" class="form-control" ></input></td></tr>';
					echo '<tr><td>Rating :  </td><td>&nbsp;</td><td>'.$result[6].'</td></tr>';
					echo '<tr><td>Avg_Score :  </td><td>&nbsp;</td><td>'.$result[7].'</td></tr>';
					echo '<tr><td>Tests_Taken:  </td><td>&nbsp;</td><td>'.$result[9].'</td></tr>';
					echo '<tr><td>Questions :  </td><td>&nbsp;</td><td>'.$result[10].'</td></tr> </table><button type="submit" name="submit" class="btn btn-lg btn-success">Save my Changes</button></form> </div> ';
			if($result['rating']>=2000)
				{echo '<br><form class="form-signin" action="question.php" method="POST" role="form"><input type="text" name="quename" placeholder="Question Set Name" class="form-control" required ></input><br><button type="submit" name="submit" class="btn btn-lg btn-success">Add this Test Set to DataBase</button></form>';
				}
					
?>
</div></div>
</div></div>

        <p class="text-muted"><center>&copy; 2014 Rohit Mishra </center></p>
<!-- START OF HIT COUNTER CODE -->
<br><script language="JavaScript" src="http://www.counter160.com/js.js?img=6"></script><br><a href="http://www.000webhost.com"><img src="http://www.counter160.com/images/6/left.png" alt="Apticook Counter" border="0" align="texttop"></a><a href="http://www.hosting24.com"><img alt="Apticook Visitors" src="http://www.counter160.com/images/6/right.png" border="0" align="texttop"></a>
<!-- END OF HIT COUNTER CODE -->
 <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>