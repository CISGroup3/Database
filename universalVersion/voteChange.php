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
		$_SESSION['voteCount'] = 1; 
		$loggedIn = "false";
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) 
			{
				$loggedIn = "true";
			}
		
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
					
//change the score
			$_SESSION['oldScore'] = 0; //initialise variable to hold the previous score of the question 
			
			$_SESSION['vote'] = $_GET['vote'];
			$questionID = $_SESSION['questionID'];
			$relID = $_SESSION['qid'];
			
			if ($_SESSION['vote'] == 'up')
				{
					$_SESSION['oldScore'] = $_SESSION['score']; //hold the old score in case the user wants to their up/down vote
					$_SESSION['score'] = $_SESSION['score'] + 1; 
					$_SESSION['currentScore'] = $_SESSION['score']; 
					$newScore = $_SESSION['score'];
					
					
					$sql = "UPDATE questionDetails SET score = $newScore WHERE questionID = $questionID";
						if($result = mysql_query($sql))
							{
								header("location:questionResponse.php?qid=$relID&id=1"); 
							}
				} //end if
			
			if ($_SESSION['vote'] == 'down')
				{
					$_SESSION['oldScore'] = $_SESSION['score']; //hold the old score in case the user wants to their up/down vote
					$_SESSION['score'] = $_SESSION['score'] - 1; 
					$_SESSION['currentScore'] = $_SESSION['score']; 
					$newScore = $_SESSION['score'];
					$questionID = $_SESSION['questionID'];
				
					$sql = "UPDATE questionDetails SET score = $newScore WHERE questionID = $questionID";
						if($result = mysql_query($sql))
							{
								header("location:questionResponse.php?qid=$relID&id=1"); 
							}
				}
			if ($_SESSION['vote'] == 'cancel')
				{
					$_SESSION['score'] = $_SESSION['oldScore']; 
					$newScore = $_SESSION['score'];
					$questionID = $_SESSION['questionID'];
					$_SESSION['voteCount'] = 0; //reset the vote count so the user can re-vote 
					$sql = "UPDATE questionDetails SET score = $newScore WHERE questionID = $questionID";
						if($result = mysql_query($sql))
							{
								header("location:questionResponse.php?qid=$relID&id=1"); 
							}
			
				} //end if
?>

	<div id = "nav">
		<nav>
			<ul>
			<div id = "navlogofloat">
				<a href="index.php"><img src="Images/athenalogo.png" alt="Athena Security" title="Athena Security" height="50" width="65"></a>
			</div>
				<li><a href="index.php">Home</a></li>
				<li><a href="anti-virus.php">Anti-Virus</a></li>
				<li><a href="FAQ.php">FAQ</a></li>
				<li><a href="forumMenu.php">Forum</a></li>
				<li><a href="Trouble-shooting.php">Trouble-Shooting</a></li>
				
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
							echo "<li><b> Welcome, user!</li></b>";
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
							
							echo "<li><a href=loginTest.php>Sign in</a></li>"
							
							?>
							<?php
							if ($loggedIn == "true")
							
							echo "<li><a href=logout.php>Sign out</a></li>"
							
							
							?>
							
						</ul>
					</nav>
				</div>
			</ul>	
		</nav>
	</div>

	<div id="wrapper">
		<div class="logoimg">
			<img height="150" width="200"/> 
		</div>
	
	</div> <!--end wrapper--> 

	
<div id="feedControl">Loading...</div>

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
				<li><a href="Trouble-shooting.php">Trouble-Shooting</a></li>	
			</ul>
	</div>
</body>
</html>
