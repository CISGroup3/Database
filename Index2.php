<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
	
<head>
<title>Home page</title>
<meta charset = "utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css"/>

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
		//$_SESSION["userForumName"] = "";
		//$_SESSION["userEmail"] = ""; //sets variables for remembering login information
		echo "Session variables have been set "; 
		
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) {
		$loggedIn = "true";
		echo "User name is " . $_SESSION['userEmail'] . " "; 
			if(isset($_SESSION['userNickname']))
			{
				echo "Hello " .$_SESSION['userNickname'];
			}
		}
?>

	<div id = "nav">
		<nav>
			<ul>
				<li><img src="Images/Aegislogo.png" alt="Aegis Security" title="Aegis Security" height="50" width="80"></li>
				<li><a href="index.html">Home</a></li>
				<li><a href="News.html">Anti-Virus</a></li>
				<li><a href="FAQ.html">FAQ</a></li>
				<li><a href="Forum.html">Forum</a></li>
				<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>
				
				<div id = "nav2">
					<nav>
						<ul>
						<?php //if user is logged in, welcome them by user forum name
						if($loggedIn == "true")
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
			<img src="Images/Aegislogo.png" alt="Aegis Security" title="Aegis Security" height="150" width="200">
		</div>
		<p>
			Welcome to Aegis Security, iuhguirhaufbaerbfuhewbuhfbeuhwfbuhebfojhbejhfbehbfewifbeuhvfhevwfhbe
			efbfhewbfuhebvwuhfv	hewfbwlhefbjh	ew fjcfewbhf  fvuh fhe fug ephf fhgew fuh ewf
			eofni nro fbe fbuheb ouhebfije	buh fnfuenfpbhe fuh fbe hbhfv eh fbe jibfpeuhbfog yug eybiej bfhb lf
			 heu f upebfuhebqfuhbuhfbouh3wbfquhbouhewbrhufrbewjbjibcehf iurpgb;jirbg  bruhfbiewbfihbe iefjreqbg
			 grniqihtpuiehpi  urh rhuthqekgnoierjg;j verhqrej heherqn ihuih huiviurn bnghrughruu hunbnkjnjnjf
			 nihinnfbub rviurbhgiurbhgbr g uu huh rugighih qiq ofqriuig huhh ih ijh irghruqbruhgu rhberbrgb
			 uijigiuhr i uihuhhgr  uruighijeir righrr urhfqbbg yhghryeugrybjqefnfeh ehuqe hu
	
			<br><br>
	
			The website contains SUPRISE!
		</p>
	</div>
	
<div id="feedControl">Loading...</div>

	<div id="footer">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><b>|</b></li>
				<li><a href="News.html">Anti-Virus</a></li>
				<li><b>|</b></li>
				<li><a href="FAQ.html">FAQ</a></li>
				<li><b>|</b></li>
				<li><a href="Forum.html">Forum</a></li>
				<li><b>|</b></li>
				<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>	
			</ul>
	</div>
</body>
</html>