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
	<meta name="keywords" content="aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, money, career, certificate" />
    <meta name="description" content="Choose one test and analyse yourself in Aptitude">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
 <link rel="shortcut icon" href=" images/favicon.png">
    <title>AptiCook | Test Menu</title>

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
            <li ><a href="welcome.php">Welcome</a></li>
            <li class="active"><a href="#">Test</a></li>
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
echo '<div class="table-responsive"><table class="table " id="table" name="table" style="text-align:center" >
<tr class="">
<td    ><b>Test</b></td>
<td    ><b>Contributor</b></td>
<td   ><b>Test taken by</b></td>
<td   ><b>Avg. Score</b></td>
<td   ><b>Date Added</b></td>';

$query=mysql_query('SELECT * FROM `test` WHERE `status` = 1 ORDER BY rating DESC');
$i=1;

										if(mysql_num_rows($query)){
			                              while($row=mysql_fetch_array($query))
			                               { ?><tr>
 <td ><?php echo '<a href="test.php?id='.$row[1].'">'.$row[2]; ?></a></td>
  <td  ><?php echo $row[3];?> </td> 
  <td ><?php echo $row[5];?> </td>
  <td  ><?php echo $row[6];?> </td>
   <td ><?php echo $row[8];?> </td>
    </tr>
   </div>
<?php }}
echo '</table>';
											
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