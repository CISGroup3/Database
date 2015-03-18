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
	
	<div id="wrapper">
		<div id = "heading">
		Anti-Virus
		</div>
		
		<div id = "tablepad">
	<table width = "100%">
	<tr>

    <td width = "10%"><img src="Images/nortonlogo.png" alt="Norton" title="Norton" height="50" width="90"/></td>

    <td>
	<div id = "table-heading">
		Norton
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/avglogo.png" alt="AVG" title="AVG" height="50" width="90"/></td>
    <td>
		<div id = "table-heading">
	Anti-Virus Guard (AVG)
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/avastlogo.png" alt="Avast" title="Avast" height="50" width="90"/></td>
    <td>
		<div id = "table-heading">
	Avast
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
  </tr>
  
   <tr>
    <td width = "10%"><img src="Images/mcafeelogo.png" alt="McAfee" title="McAfee" height="50" width="90"/></td>
    <td>
		<div id = "table-heading">
	McAfee
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
 
  </tr>
   <tr>
    <td width = "10%"><img src="Images/wdefend.png" alt="Windows Defender" title="Windows Defender" height="50" width="90"/></td>
    <td>
		<div id = "table-heading">
	Windows Defender
	</div>
	Small paragraph of information and facts about the anti-virus
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
		
<!-- end of wrapper -->
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
</div>
</html>