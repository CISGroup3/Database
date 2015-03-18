<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Home</title>
<meta charset = "utf-8">

<link rel="stylesheet" type="text/css" href="CSS/mystyle.css"/>


<script type="text/javascript" src="Javascript/Google.js"></script>
<script src="Javascript/newsfeed.js"
type="text/javascript"></script>

<div id = "newsfeedcss">
<style type="text/css">
@import url("CSS/newsfeedstyle.css");
</style>

</div>
<script type="text/javascript">
function load() {
var feed ="http://feeds.feedburner.com/Securityweek?format=xml";
new GFdynamicFeedControl(feed, "feedControl");

}
google.load("feeds", "1");
google.setOnLoadCallback(load);
</script>
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
	
	<div id="homepic">
			<img src="Images/athenasecuritylogo.png" alt="Athena Security" title="Athena Security" height="150" width="350"/>
			</div>

			Athena Security was founded with the purpose of informing novice users about the threats of cyber-crime and 
			how they can protect themselves. The information which is provided will help users will a number of devices 
			from phone/tablets to computers. Athena Security provides a vast amount of information as well as a number of tools to ensure you can find 
			whatever information that you need. The tools which are available include:
			
			<ul>
			<li>
			<b>Anti-Virus Page</b>
			– This has a number of anti-virus software and will help you decide which bests suites your needs.
			<li>
			<b>FAQ Page</b> 
			– This has basic information which will help you stay protected from cyber-crime.
			<li>
			<b>Forum Page</b> 
			– This page allows you to post questions which the team at Athena security and the general public will 
			answer, this ensures you can get advice which is personalised for your needs.
			<li>
			<b>Trouble-Shooting Page</b> 
			– This page will help you diagnose the issue with your computer, it will then give you 
			some advice on how to get any issues that you are facing.
			</ul>
			A news feed is also available which will allow to you keep up to date with recent cyber-crimes, this can be seen below. 

	
<div id="feedControl"><br><br><br><br><br><br><br></div>

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
	</div>
</body>
</html>