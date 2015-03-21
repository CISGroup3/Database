<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Forum</title>
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
	
		<div id = "heading">
		Troubleshooting
		</div>
		
	
		<form action="">
<input type="checkbox" name="ComputerIssue" value="Computer-slow">My computer is very slow<br>
<input type="checkbox" name="ComputerIssue" value="Pop-ups">I have a large amount of pop-ups appearing<br>
<input type="checkbox" name="ComputerIssue" value="Browser">My browser won't open<br>
<input type="checkbox" name="ComputerIssue" value="Crashing">My computer keeps crashing<br>
<input type="checkbox" name="ComputerIssue" value="Starting">My computer won't start<br>
<input type="checkbox" name="ComputerIssue" value="Internet">I can't connect to the internet<br>
<input type="checkbox" name="ComputerIssue" value="Hard-drive">My hard drive isn't functioning correctly<br>
<input type="checkbox" name="ComputerIssue" value="Files">I have missing files<br>
</form>

<div id= "troubleshoot-button">
<button type= "button">Submit </button> 
</div>		

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		
	<div id="footer">
	<footer>
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
		
	</footer>
	</div>
</body>
</html>