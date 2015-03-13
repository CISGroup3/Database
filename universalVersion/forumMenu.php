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
				<li><img src="Images/athenalogo.png" alt="Athena Security" title="Athena Security" height="50" width="65"></li>
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
	
	<div id="wrapper">
		<div id = "heading">
		Forum
		</div>
		
		<div id = "tablepad">
	<table width = "100%">
	<tr>

    <td width = "10%"><img src="Images/malware.png" alt="Malware" title="Malware" height="50" width="90"/></td>

    <td>
	<div id = "table-heading">
	<a href="index.php">Malware</a>
	</div>
	Short description of topic
	</td>		
 </tr>

  <tr>
    <td width = "10%"><img src="Images/antiviruses.png" alt="Anti-Viruses" title="Anti-Viruses" height="50" width="90"/></td>
    <td>
	<div id = "table-heading">
	<a href="index.php">Anti-Viruses</a>
	</div>
	Short description of topic
	</td>		
  </tr>
  
  <tr>
    <td width = "10%"><img src="Images/computersupport.png" alt="Computer Support" title="Computer Support" height="50" width="90"/></td>
    <td>
	<div id = "table-heading">
	<a href="index.php">Computer Support</a>
	</div>
	Short description of topic
	</td>		
 
  </tr>
   <tr>
    <td width = "10%"><img src="Images/mobiletablet.png" alt="Mobile/Tablet Support" title="Mobile/Tablet Support" height="50" width="90"/></td>
    <td>
	<div id = "table-heading">
	<a href="index.php">Mobile/Tablet Support</a>
	</div>
	Short description of topic
	</td>	
	
		
  </tr>
   <tr>
    <td width = "10%"><img src="Images/operate.png" alt="Mobile/Tablet Support" title="Mobile/Tablet Support" height="50" width="90"/></td>
    <td>
	<div id = "table-heading">
	<a href="index.php">Operating Systems</a>
	</div>
	Short description of topic
	</td>	
 
  </tr>
   <tr>
    <td width = "10%"><img src="Images/browsers.png" alt="Mobile/Tablet Support" title="Mobile/Tablet Support" height="50" width="90"/></td>
    <td>
	<div id = "table-heading">
	<a href="index.php">Browsers</a>
	</div>
	Short description of topic
	</td>		
 
  </tr>
   <tr>
    <td width = "10%"><img src="Images/misc.png" alt="Miscellaneous" title="Miscellaneous" height="50" width="90"/></td>
    <td>
	<div id = "table-heading">
	<a href="index.php">Miscellaneous</a>
	</div>
	Short description of topic
	</td>	
 
  </tr>
</table>
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
</body>
</html>