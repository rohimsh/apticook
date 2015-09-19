<?php
session_start();

$path = "images/profile/";
$path1 = "images/profile/";
$id=$_GET['id'];

    $valid_formats = array("jpg", "png", "gif", "bmp");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];
            
			$path2 = $path1.$name;
			if (file_exists("images/profile/".$_FILES["photoimg"]["name"]))
  {
                        echo '<script type="text/javascript">alert("Error: File Name already Exists. Change filename and Upload");window.location.href="profile.php";</script>';                 
  }
else
  {
            if(strlen($name))
                {
                    
                    if($size<(1024*1024))
                        {
  // $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

          $tmp = $_FILES['photoimg']['tmp_name'];

           if(move_uploaded_file($tmp, $path.$name))
                                {
//echo  $path.$actual_image_name;
		include 'db_login.php';
			$db = mysql_connect($db_host, $db_username, $db_password);	  
			mysql_select_db($db_database, $db);
                   mysql_query("UPDATE user SET image = '$path2' WHERE no='".$id."';") or die(mysql_error());
				   
						header('Location: profile.php');
                           }
                            else
                                echo '<script type="text/javascript">alert("Error: Image uploading Failed.");window.location.href="profile.php";</script>';
                        }
                        else
                        echo '<script type="text/javascript">alert("Error: File Size greater than 1MB.");window.location.href="profile.php";</script>';                 
                        }
                        else
                        echo '<script type="text/javascript">alert("Error: Invalid File Format.");window.location.href="profile.php";</script>';                 
                }
				}
                
            else
                echo "Please select image..!";
 
?>
