<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Anti-Virus</title>
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
					</nav>
				</div>
			</ul>	
		</nav>
	</div>
	
		<div id = "heading">
		Anti-Virus
		</div>
		
		<div id = "tablepad">
	<table width = "100%">
	<tr>

    <td width = "10%"><img src="Images/nortonlogo.png" alt="Norton" title="Norton" height="90" width="90"/></td>

    <td>
	<div id = "table-heading2">
		Norton
	</div>
	Norton anti-virus is one of the market leaders in anti-virus companies founded in 1991, 
	they have been providing premium software ever since helping to protect devices ranging from tablets and phones to laptops.
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/avglogo.png" alt="AVG" title="AVG" height="90" width="90"/></td>
    <td>
		<div id = "table-heading2">
	Anti-Virus Guard (AVG)
	</div>
	AVG is one of the leading free anti-virus software out there and despite being a relatively new is 
	regarded as one of the best and most consistent anti-virus software out there.
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/avastlogo.png" alt="Avast" title="Avast" height="75" width="90"/></td>
    <td>
		<div id = "table-heading2">
	Avast
	</div>
	Avast is also a high quality anti-virus software provider; even though they are not as impressive as 
	AVG they still provide a high quality service for free.
	</td>		
  </tr>
  
   <tr>
    <td width = "10%"><img src="Images/mcafeelogo.png" alt="McAfee" title="McAfee" height="70" width="90"/></td>
    <td>
		<div id = "table-heading2">
	McAfee
	</div>
	MacAfee is one of the oldest anti-virus companies out there consistently providing protection for 
	all manner of users ranging from home use to office security.
	</td>		
 
  </tr>
   <tr>
    <td width = "10%"><img src="Images/wdefend.png" alt="Windows Defender" title="Windows Defender" height="90" width="90"/></td>
    <td>
		<div id = "table-heading2">
	Windows Defender
	</div>
	Windows defender comes free with every copy of a windows operating system and offers a good basic 
	protection from many of the issues that are faced by users with security issues.
	</td>		
  </tr>

</table>
		</div>
		<div id = "heading3">
		Comparison Table
		</div>
<div id="antitablepic">
<img src="Images/comparisontable.png" alt="Comparison Table" width="945" height="350"/>
</div>
	<p>
<div id="txt-decorate">
Boot-Time Scan
</div>
A boot time scan is a scan of the computer for virus etc. That runs when the computer starts up.

<div id="txt-decorate">
On-Demand Scan
</div>
On-demand scan works in a similar way to a boot time scan except it can be run at any time and is slightly less comprehensive.

<div id="txt-decorate">
Support
</div>
Support is whether or not the company providing the anti-virus service provides a support service in case something goes wrong.

<div id="txt-decorate">
Web Protection
</div>
Web protection allows protection from malicious content when browsing the web and will often allow you to see whether or not a website is safe before visiting it.

<div id="txt-decorate">
Live Updates
</div>
Live updates are whether or not the service is updated after the initial release to fix problems, add new features etc.

<div id="txt-decorate">
Cross-Platform
</div> 
Cross-platform is whether or not the service works on multiple devices e.g. phones, tablets.

<div id="txt-decorate">
E-mail Security
</div> 
E-mail security is protection against threats that could come from emails being sent or opened.
</p>
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