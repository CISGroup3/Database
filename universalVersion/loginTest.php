<!DOCTYPE html>

<head>
<title> Registry Test </title>
</head>

<?php if(isset($_GET['login']));/*user wants to login link*/?> 

		
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Email Address:<br>
			<input type="text" name="userEmail">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Password:<br>
			<input type="password" name="userPassword">
			<br>

		<input type="submit" value="SUBMIT" /> 
				
		</form> 

<?php //default
//connect to the db 
session_start();


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
	
			$userEmail="";
			$userPassword="";
			$userForumName="";
	
	
		if (isset($_POST['userEmail']))
			{
				$userEmail = $_POST['userEmail'];
				$_SESSION['userEmail'] = $userEmail; 
			
	
		if (isset($_POST['userPassword']))
			{
				$userPassword = $_POST['userPassword'];
				$_SESSION['userPassword'] = $userPassword; 
			} 
		
		$sql = "SELECT * FROM webforum.userdetails WHERE userEmail='$userEmail' and userPassword='$userPassword'";
		$result=@mysql_query($sql);
	
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row

		if($count==1){
		
		$result = @mysql_query("SELECT userNickname FROM webforum.userdetails WHERE userEmail='$userEmail' and userPassword='$userPassword'"); 
		$row = mysql_fetch_row($result);
		$read = $row[0];
		
		
		//echo $read;
		
		$_SESSION['userNickname'] = $read; //retrieves corresponding details and assigns to another session variable 
		
		$result = @mysql_query("SELECT userID FROM webforum.userdetails WHERE userEmail='$userEmail' and userPassword='$userPassword'");
		$row= mysql_fetch_row($result);
		$read = $row[0]; 
		
		$_SESSION['userID'] = $read; 
		
		header("location:Index2.php"); //redirects if successful
		
		} //end if 
		
		if ($count!=1) {
		echo "Wrong Username or Password";
		session_unset(); 
		header("location:index.php"); //redirects if not successful 
		}
}
?>

</html>
