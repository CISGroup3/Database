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

<div id = "b2">
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

	
<div id = "borderimg">
<img src="Images/container.png" width="860" height="190">
</div>
	<div id = "container">
	
<?php if(isset($_GET['login']));/*user wants to login link*/?> 

		
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Email Address:<br>
			<input type="text" name="userEmail" size="50">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Password:<br>
			<input type="password" name="userPassword" size="50">
			<br><br>

		<input type="submit" value="Sign in"/> 
				
		</form>
		</div>

		<div id = "heading">
		Terms and Conditions
		</div>
		
		<p>
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
		<li>Do not advertise or promote products or services. </li>
		<li>Do not spam or flood the forum. Only submit a comment once. Do not resubmit the same, or similar, comments. Keep the number of comments you submit on a topic at a reasonable level. Multiple comments from the same individual, or a small number of individuals, may discourage others from contributing. </li>
		<li>Do not use an inappropriate user name (vulgar, offensive etc.).</li>
		<li>If you are under the age of 12 please get your parent/guardian's permission before participating in this forum. Users without this consent are not allowed to participate or provide us with personal information.</li>
		</ul>
		</p>
		
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

		if($count == 1){
		
		$result = @mysql_query("SELECT userNickname FROM webforum.userdetails WHERE userEmail='$userEmail' and userPassword='$userPassword'"); 
		$row = mysql_fetch_row($result);
		$read = $row[0];
		
		
		//echo $read;
		
		$_SESSION['userNickname'] = $read; //retrieves corresponding details and assigns to another session variable 
		
		$result = @mysql_query("SELECT userID FROM webforum.userdetails WHERE userEmail='$userEmail' and userPassword='$userPassword'");
		$row= mysql_fetch_row($result);
		$read = $row[0]; 
		
		$_SESSION['userID'] = $read; 
		$_SESSION['voteCount'] = 0; 
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
		//header("location:index.php"); redirects if successful
		
		} //end if 
		
		if ($count!=1) {
		echo "Wrong Username or Password";
		session_unset(); 
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
		//header("location:index.php"); redirects if not successful 
		}
}
?>
</div>
</html>