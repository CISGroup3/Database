<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<head>
<title>Register</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="CSS/mystyle.css"/>
<!DOCTYPE html>
<html lang="en">
<meta charset = "utf-8">
</head>

<body>
<?php
		$loggedIn = "false";
		
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) 
			{
				$loggedIn = "true";
			}
?>
	<div id = "nav">
		<nav>
			<ul>
				<li><img src="Images/athenalogo.png" alt="Athena Security" title="Athena Security" height="50" width="65"></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="anti-virus.php">Anti-Virus</a></li>
				<li><a href="FAQ.php">FAQ</a></li>
				<li><a href="forumMenu.php">Forum</a></li>
				<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>
				
				<div id = "nav2">
					<nav>
						<ul>
							<?php //if user is logged in, welcome them by user forum name
						if($loggedIn == "true" && !empty($_SESSION['userNickname']))
						{
						   echo "<li> <b> Welcome, " .$_SESSION['userNickname'] ."!</li> </b>"; 
						}
						if($loggedIn == "false")
						{
							echo "<li><b></li></b>";
						}
						
							?>
						</ul>
					</nav>
				</div>
				
				<div id = "nav3">
					<nav>
						<ul>
							<li><a href="registryTest.php">Register</a></li>
							<li><b>|</b></li>
							<?php
							if ($loggedIn == "false")
							{
							echo "<li><a href=loginTest.php>Sign in</a></li>";
							$_SESSION['userID'] = "";
							$_SESSION['voteCount'] = 0; 
							}
							?>
							<?php
							if ($loggedIn == "true")
							
							echo "<li><a href=logout.php>Sign out</a></li>";
							?>
						</ul>
					</nav>
				</div>
			</ul>	
		</nav>
	</div>
	
	<div id = "borderimg2">
<img src="Images/container.png" width="860" height="420">
</div>
	<div id = "container">
	<?php if(isset($_GET['login']));/*user wants to login link*/?> 
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
			First name:<br>
			<input type="text" name="firstname" maxlength="15" size="50">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Last name:<br>
			<input type="text" name="lastname" maxlength="15" size="50">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Forum Name:<br>
			<input type="text" name="userForumName" maxlength="10" size="50"> 
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Email Address:<br>
			<input type="text" name="userEmail" maxlength="70" size="50">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" size="50">
			Password:<br>
			<input type="password" name="userPassword" title="Do not include spaces in your password." maxlength="14" size="50">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" maxlength="15">
			Retype password:<br>
			<input type="password" name="confirmPassword" maxlength="14" size="50">
			<br><br>
		
		<input type="submit" value="Register"/> 
		
		</form> 
		</div>
		
		<div id = "heading4">
		Terms and Conditions
		</div>
		
		<ul>
		<li>Do not submit comments that contain personal information.</li>
		<li>Do not submit comments that are unlawful, harassing, abusive, threatening, harmful, obscene, profane, sexually orientated or racially offensive.</li>
		<li>Do not swear or use language that could offend other forum participants.</li>
		<li>Do not advertise or promote products or services.</li>
		<li>Do not spam or flood the forum. Only submit a comment once.</li>
		<li>Do not resubmit the same, or similar, comments.</li>
		<li>Keep your comments relevant to the discussion topic.</li>
		<li>Do not submit defamatory comments (comments that are untrue and capable of damaging the reputation of a person or organisation).</li>
		<li>Do not condone illegal activity or incite people to commit any crime, including incitement of racial hatred.</li>
		<li>Do not submit comments that could prejudice on-going or forthcoming court proceedings (contempt of court) or break a court injunction.</li>
		<li>Do not submit comments containing someone else's copyright material.</li>
		<li>Do not swear or use language that could offend other forum participants.</li>
		<li>Do not otherwise submit comments that are unlawful, harassing, abusive, threatening, harmful, obscene, profane, sexually orientated or racially offensive. This includes comments that are offensive to others with regards to religion, gender, nationality or other personal characteristic.</li>
		<li>Do not impersonate other forum members or falsely claim to represent a person or organisation.</li>
		<li>Do not submit comments or choose user names that contain personal information that would identify yourself or others. For example last names, addresses, phone numbers, email addresses or other online contact details either relating to yourself or other individuals.</li>
		<li>Do not post comments in languages other than English. </li>
		<li>Do not spam or flood the forum. Only submit a comment once. Do not resubmit the same, or similar, comments. Keep the number of comments you submit on a topic at a reasonable level. Multiple comments from the same individual, or a small number of individuals, may discourage others from contributing. </li>
		<li>Do not use an inappropriate user name (vulgar, offensive etc.).</li>
		<li>If you are under the age of 12 please get your parent/guardian's permission before participating in this forum. Users without this consent are not allowed to participate or provide us with personal information.</li>
		</ul>

		<div id="footer">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><b>|</b></li>
			<li><a href="anti-virus.php">Anti-Virus</a></li>
			<li><b>|</b></li>
			<li><a href="FAQ.php">FAQ</a></li>
			<li><b>|</b></li>
			<li><a href="forumMenu.php">Forum</a></li>
			<li><b>|</b></li>
			<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>	
		</ul>
	</div>
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
			$accountCreated = "false"; 
			
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
						
						$x = null;
						$_SESSION['userEmail'] = $x; //specifically ensure that the system does not auto login the user after they are registered.
						session_unset(); //unset the session variables 
						//$_SESSION['accountCreated'] = "true"; 
						//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=registryTest.php">'; 
						//redirects to prevent the user refreshing the page and creating a user account twice
						?>
						<script>if (window.confirm('Would you like to login now? Your account will still be created if you choose Cancel.')) {
							window.location.href='loginTest.php';
						}
						</script> <!--runs a script to redirect the user, asking if they want to log in right away -->
						<?php
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
</html>