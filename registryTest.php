

<head>
<title> Registry Test </title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>

<body>
	<?php if(isset($_GET['login']));/*user wants to login link*/?> 
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
			First name:<br>
			<input type="text" name="firstname">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Last name:<br>
			<input type="text" name="lastname">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Forum Name:<br>
			<input type="text" name="userForumName"> 
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Email Address:<br>
			<input type="text" name="userEmail">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Password:<br>
			<input type="password" name="userPassword" title="Do not include spaces in your password.">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Retype password:<br>
			<input type="password" name="confirmPassword">
			<br>
		
		<input type="submit" value="SUBMIT" /> 
		
		</form> 

<?php //default
//connect to the db 
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

//If variables have been submitted through the form, assign them and post them
	if (isset($_POST['firstname'])) 
		{
			$variableArray = array(" ", " ", " ", " ", " ", " "); //creates an array to hold each of the values 
			$firstname = $_POST['firstname'];
			$variableArray[0] = $firstname; 
			$checker = "true"; //remains true as long as user enters a value in each box
			$_SESSION['firstname'] = $firstname; 
			
		if (isset($_POST['lastname']))
			{
				$lastname = $_POST['lastname'];
				$variableArray[1] = $lastname; 
				$_SESSION['lastname'] = $lastname; 
			}
		
		if (isset($_POST['userForumName']))
			{
				$userForumName = $_POST['userForumName'];
				$variableArray[2] = $userForumName; 
				$_SESSION['userForumName'] = $userForumName; 
			}
	
		if (isset($_POST['userEmail']))
			{
				$userEmail = $_POST['userEmail'];
				$variableArray[3] = $userEmail; 
				$_SESSION['userEmail'] = $userEmail; 
			}
	
		if (isset($_POST['userPassword']))
			{
				$firstVariable = $_POST['userPassword'];
				$userPassword = str_replace(' ', '', $firstVariable); //prevents a password mismatch by removing unintentional whitespace
				$variableArray[4] = $userPassword; 
				$_SESSION['userPassword'] = $userPassword; 
			} 
	
		if (isset($_POST['confirmPassword']))
			{
				$secondVariable = $_POST['confirmPassword'];
				$confirmPassword = str_replace(' ', '', $secondVariable); //applies the same principle as before
				$variableArray[5] = $confirmPassword; 
			}
		
		foreach ($variableArray as $value)
			{
				if ($value == " ")
					{
					$checker = "false"; 
					}
			}

	
		if ($userPassword == $confirmPassword && $checker == "true") //checks the user entered their password the same on both tries and filled out all the boxes  
			{
		
				$sql = "INSERT INTO userDetails SET userLastName='$lastname', userFirstName = '$firstname', userNickname = '$userForumName', userEmail = '$userEmail', userPassword = '$userPassword'";
				//creates a new user through a SQL insert query
				
				if (@mysql_query($sql))
					{
						echo '<p>Your account has been made.</p>';
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Index2.php">'; //redirects to prevent the user refreshing the page and creating a user account twice
					}
				
				else if ($sql === false) //if the query doesn't work/returns false, then catch the error gracefully
					{
						echo '<p>Error adding submission: ' .
						mysql_error() . '</p>';
					} //end else 
			}//end if
		
			if ($userPassword !== $confirmPassword)
				{
					echo '<p>Your passwords do not match.
					Please try again. </p>';
					
				}
			if ($checker == 'false')
				{
					echo '<p> You have neglected to fill in all of the textboxes.</p>'; 
				}
		} //end if 
	
?> 
	

</body>

