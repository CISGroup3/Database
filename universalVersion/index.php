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
							{
							echo "<li><a href=logout.php>Sign out</a></li>";
							}
							
							?>
						</ul>
					</nav>
				</div>
			</ul>	
		</nav>
	</div>
	
	<div id="wrapper">
	<div id="homepic">
			<img src="Images/athenasecuritylogo.png" alt="Athena Security" title="Athena Security" height="150" width="350"/>
			</div>

		<p>
			Paragraph explaining who we are, the purpose of this website and why this website was made 
			(Use research to back up the creation of this website ie. News) Also make it interesting as
			possible, it will be the first thing the user will see so its important that it gets their
			attention and curiosity.
			
			<br><br>
	
			Short summary of what this website has to offer. (NOTE: Make sure there's enough content
			so that the footer is at the bottom of the page (no white space at the bottom)
		</p>
	</div>
	
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
				<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>	
			</ul>
	</div>
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Javascript/1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Javascript/3.2.0.js"></script>

        <script>
            $('.help').tooltip()

        </script>
</body>
</html>