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
	<div id = "table-heading">
		Norton
	</div>
	Norton anti-virus is one of the market leaders in anti-virus companies founded in 1991, 
	they have been providing premium software ever since helping to protect devices ranging from tablets and phones to laptops.
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/avglogo.png" alt="AVG" title="AVG" height="90" width="90"/></td>
    <td>
		<div id = "table-heading">
	Anti-Virus Guard (AVG)
	</div>
	AVG is one of the leading free anti-virus software out there and despite being a relatively new is 
	regarded as one of the best and most consistent anti-virus software out there.
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/avastlogo.png" alt="Avast" title="Avast" height="75" width="90"/></td>
    <td>
		<div id = "table-heading">
	Avast
	</div>
	Avast is also a high quality anti-virus software provider; even though they are not as impressive as 
	AVG they still provide a high quality service for free.
	</td>		
  </tr>
  
   <tr>
    <td width = "10%"><img src="Images/mcafeelogo.png" alt="McAfee" title="McAfee" height="70" width="90"/></td>
    <td>
		<div id = "table-heading">
	McAfee
	</div>
	MacAfee is one of the oldest anti-virus companies out there consistently providing protection for 
	all manner of users ranging from home use to office security.
	</td>		
 
  </tr>
   <tr>
    <td width = "10%"><img src="Images/wdefend.png" alt="Windows Defender" title="Windows Defender" height="90" width="90"/></td>
    <td>
		<div id = "table-heading">
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
				<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>	
			</ul>
		
	</footer>
	</div>
</body>
</html>