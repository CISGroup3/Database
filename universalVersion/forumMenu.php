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
							{
							echo "<li><a href=loginTest.php>Sign in</a></li>"
							$_SESSION['userID'] = "";
							$_SESSION['voteCount'] = 0; 
							}
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

		<div id = "heading">
		Terms and Conditions
		</div>
		
				<p>
		<ul>
		<li>Do not submit comments that contain personal information.</li>
		<li>Do not submit comments that are unlawful, harassing, abusive, threatening, harmful, obscene, profane, sexually orientated or racially offensive.</li>
		<li>Do not swear or use language that could offend other forum participants.</li>
		<li>Do not advertise or promote products or services.</li>
		<li>Do not spam or flood the forum. Only submit a comment once.</li>
		<li>Do not resubmit the same, or similar, comments.</li>
		<li>Keep your comments relevant to the discussion topic.</li>
		<li>Do not submit defamatory comments (comments that are untrue and capable of damaging the reputation of a person or organisation).</li>
		<li>Do not condone illegal activity or incite people to commit any crime, including incitement of racial hatred.</li>
		<li>Do not submit comments that could prejudice on-going or forthcoming court proceedings (contempt of court) or break a court injunction.</li>
		<li>Do not submit comments containing someone else's copyright material.</li>
		<li>Do not swear or use language that could offend other forum participants.</li>
		<li>Do not otherwise submit comments that are unlawful, harassing, abusive, threatening, harmful, obscene, profane, sexually orientated or racially offensive. This includes comments that are offensive to others with regards to religion, gender, nationality or other personal characteristic.</li>
		<li>Do not impersonate other forum members or falsely claim to represent a person or organisation.</li>
		<li>Do not submit comments or choose user names that contain personal information that would identify yourself or others. For example last names, addresses, phone numbers, email addresses or other online contact details either relating to yourself or other individuals.</li>
		<li>Do not post comments in languages other than English. </li>
		<li>Do not advertise or promote products or services. </li>
		<li>Do not spam or flood the forum. Only submit a comment once. Do not resubmit the same, or similar, comments. Keep the number of comments you submit on a topic at a reasonable level. Multiple comments from the same individual, or a small number of individuals, may discourage others from contributing. </li>
		<li>Do not use an inappropriate user name (vulgar, offensive etc.).</li>
		<li>If you are under the age of 12 please get your parent/guardian's permission before participating in this forum. Users without this consent are not allowed to participate or provide us with personal information.</li>
		</ul>
		</p>
		
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