<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Current Questions</title>
<meta charset = "utf-8">

<link rel="stylesheet" type="text/css" href="CSS/mystyle.css"/>

</head>

<body>

<?php
		$loggedIn = "false";
		
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) 
			{
				$loggedIn = "true";
			}
			
		$categoryID = $_GET['cv'];
		$_SESSION['categoryID'] = $categoryID; 
		
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
						   echo "<li><b> Welcome, ".$_SESSION['userNickname']."!</a></li> </b>";
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

						<?php
							if ($loggedIn == "true")
							{
							echo"<li><a href='profilePage.php'>Your Profile</a></li>";
							echo "<li><b>|</b></li>"; 

							}
							if ($loggedIn == "false")
							{
							echo"<li><a href='registryTest.php'>Register</a></li>";
							echo "<li><b>|</b></li>"; 
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

		<div id = "heading">
		Current Questions
		</div>
	
	<?php

			
	
	$arrayCounter = 0; 
	$variableArray = array(); //holds question titles
	$idArray = array();
	
	$questionsList = @mysql_query("SELECT questionID, questionTitle FROM questionDetails WHERE categoryID = '$categoryID' ORDER BY questionID DESC");
		
		if (!$questionsList) 
					{
						exit('<p>Error performing query: ' . mysql_error() . '</p>');
					}
					
				while ($question = mysql_fetch_array($questionsList)) 
					{
						$questionTitle = $question['questionTitle'];
						$variableArray[$arrayCounter] = $question['questionTitle'];
						$idArray[$arrayCounter] = $question['questionID']; 
						
						$arrayCounter = $arrayCounter + 1; //array counter 
					}	
				
				$arrayCounter = 0;
			
			foreach($variableArray as $title)
					{
						$relID = $idArray[$arrayCounter];
						echo "<center><h2><a href='questionResponse.php?qid=$relID' id='questionTitle'>$title</a></h2></center>";
						$arrayCounter = $arrayCounter + 1; 
					} 
					
			if ($loggedIn == "true")
				{
					echo "<center><div id = 'questioncolour'><a href='addNewQuestion.php'>Add a New Question!</a></div></center>";
				}
	?>

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
	</div>
</body>
</html>