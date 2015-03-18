<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en"> 
<head>
<title> Add New Question </title>
<meta charset = "utf-8">
<link rel="stylesheet" type="text/css" href="CSS/mystyle.css"/>

</head>

<body>
<?php	
		
		$dbcnx = @mysql_connect('localhost', 'root', 'cisgroup');
	if (!$dbcnx) //if a connection cannot be made, the code will exit gracefully 
		{
			exit( '<p> Unable to connect to the ' . 'database server at this time. </p>' );
		}
		
//select the webforum db 
	if(!@mysql_select_db('webforum'))
		if (!@mysql_select_db('webforum')) //if the connection is made but the database cannot be found, exit gracefully 
			{
				exit('<p>Unable to locate the forum ' . 'database at this time. </p>'); 
			}
			$deleteMe = $_SESSION['questionID'];
			//echo "<p>" .$deleteMe ."</p>"; 
			$sql = "DELETE FROM questiondetails WHERE questionID = '$deleteMe'";
			if($result = mysql_query($sql))
							{
								header("location:forumMenu.php"); 
							}
?>

<div id = "loadhead">
Loading...
</div>


</body>
</html>
