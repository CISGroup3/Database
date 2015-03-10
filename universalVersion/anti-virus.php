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
		<div id = "heading">
		Anti-Virus
		</div>
		
		<div id = "tablepad">
	<table width = "100%" border = "black solid 1px">
	<tr>

    <td width = "10%">Norton Logo</td>

    <td>
	<div id = "table-heading">
		Norton
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
  </tr>
  
  <tr>
    <td width = "10%">AVG Logo</td>
    <td>
		<div id = "table-heading">
	Anti-Virus Guard (AVG)
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
  </tr>
  
  <tr>
    <td width = "10%">Avast Logo</td>
    <td>
		<div id = "table-heading">
	Avast
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
  </tr>
  
   <tr>
    <td width = "10%">McAfee Logo</td>
    <td>
		<div id = "table-heading">
	McAfee
	</div>
	Small paragraph of information and facts about the anti-virus
	</td>		
 
  </tr>
   <tr>
    <td width = "10%">Windows Defender Logo</td>
    <td>
		<div id = "table-heading">
	Windows Defender
	</div>
	Small paragraph of information and facts about the anti-virus
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
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Javascript/1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Javascript/3.2.0.js"></script>

        <script>
            $('.help').tooltip()

        </script>

	


</body>
</html>