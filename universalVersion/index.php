<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html> <!--Used for browsers to identify what version of html the page is written in-->
<html lang="en">  <!--Used to declare language of web page-->

<head>
<title>Home</title> <!--Title for page-->
<meta charset = "utf-8"> <!--Specify the character encoding for the HTML document-->

<link rel="stylesheet" type="text/css" href="CSS/mystyle.css"/> <!--Links CSS with HTML -->


<script type="text/javascript" src="Javascript/Google.js"></script> <!--Refers to JavaScript to function news feed-->
<script src="Javascript/newsfeed.js" type="text/javascript"></script> <!--Refers to another JavaScript used for the news feed-->

<div id = "newsfeedcss"> <!--Division class to set layout for news feed-->
<style type="text/css">
@import url("CSS/newsfeedstyle.css"); <!--Refer to news feed CSS file-->
</style>
</div>

<script type="text/javascript"> <!--Script used to function JavaScript into web page-->
function load() { <!--When the web page loads-->
var feed ="http://feeds.feedburner.com/Securityweek?format=xml"; <!--Variable that contains a RSS link-->
new GFdynamicFeedControl(feed, "feedControl"); <!--Feed is referred to as "feedControl" on html-->
}
google.load("feeds", "1"); <!--Loads 1 news feed-->
google.setOnLoadCallback(load); <!--Web page calls news feed-->
</script>
</head>

<body>

<?php //If statement use to identify if a user has logged in before they reach this web page
		$loggedIn = "false";
		
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) 
			{
				$loggedIn = "true";
			}
?>
	<div id = "nav"> <!--Division used to create the navigation bar-->
		<nav>
			<ul>
			<div id = "navlogofloat"> <!--Division used to make the logo float to the left-->
				<a href="index.php"><img src="Images/athenalogo.png" alt="Athena Security" title="Athena Security" height="50" width="65"></a>
			</div>
				<li><a href="index.php">Home</a></li> <!--List used to display page titles and their respective hyper links-->
				<li><a href="anti-virus.php">Anti-Virus</a></li>
				<li><a href="FAQ.php">FAQ</a></li>
				<li><a href="forumMenu.php">Forum</a></li>
				<li><a href="Trouble-shooting.php">Trouble-Shooting</a></li>
				
				<div id = "nav2"> <!--Division used to display welcome message for the user-->
					<nav>
						<ul>
							<?php //if a user is logged in, welcome them by user forum name
						if($loggedIn == "true" && !empty($_SESSION['userNickname']))
						{
						   echo "<li><b> Welcome, ".$_SESSION['userNickname']."!</a></li> </b>";
						}
						if($loggedIn == "false")
						{
							echo "<li><b></li></b>";
						}
							?> <!--If statement use to identify if a user is logged in on or not-->
						</ul>
					</nav>
				</div>
				
				<div id = "nav3"> <!--Division used to display Sign in/Sign out and Register-->
					<nav>
						<ul>

						<?php //If statement used to identify if a user is signed in or not
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
	
	<div id="homepic"> <!--Division used to position main logo on web page-->
			<img src="Images/athenasecuritylogo.png" alt="Athena Security" title="Athena Security" height="150" width="350"/>
			</div>

			Athena Security was founded with the purpose of informing novice users about the threats of cyber-crime and 
			how they can protect themselves. The information which is provided will help users will a number of devices 
			from phone/tablets to computers. Athena Security provides a vast amount of information as well as a number of tools to ensure you can find 
			whatever information that you need. The tools which are available include:
			
			<ul>
			<li>
			<b><a href="anti-virus.php">Anti-Virus Page</a></b> <!--Text which links to another page-->
			– This has a number of anti-virus software and will help you decide which bests suites your needs.
			<li>
			<b><a href="FAQ.php">FAQ Page</a></b> <!--Text which links to another page-->
			– This has basic information which will help you stay protected from cyber-crime.
			<li>
			<b><a href="forumMenu.php">Forum Page</a></b> <!--Text which links to another page-->
			– This page allows you to post questions which the team at Athena security and the general public will 
			answer, this ensures you can get advice which is personalised for your needs.
			<li>
			<b><a href="Trouble-shooting.php">Trouble-Shooting Page</a></b> <!--Text which links to another page-->
			– This page will help you diagnose the issue with your computer, it will then give you 
			some advice on how to get any issues that you are facing.
			</ul>
			A news feed is also available which will allow to you keep up to date with recent cyber-crimes, this can be seen below:

<div id="feedControl"> <!--Division used to display/position the news feed-->
<br><br><br><br> <!--Spacing-->
<b>Loading News Feed...</b>
<br><br><br><br> <!--Spacing-->
</div>

	<div id="footer"> <!--Division used to create the footer bar-->
			<ul>
				<li><a href="index.php">Home</a></li> <!--List used to display page titles and their respective hyper links-->
				<li><b>|</b></li> <!--Used to give page titles a more "boxed" effect-->
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