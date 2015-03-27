<?php
session_start(); //starts the session to store certain variables using cookies
 ?>
 
 <!DOCTYPE html>
<html lang="en"> 
<head>
<title> Your Profile </title>
<meta charset = "utf-8">
<script script type="text/javascript" src="Javascript/getelementbyid-form.js"></script>
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
						
						   echo "<li><b> Welcome, ".$_SESSION['userNickname']."!</a></li> </b>"; 
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
							echo "<li><a href=registryTest.php>Register</a></li>";
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
		
		<div id = "heading">
		Profile
		</div>
		<?php 
				
				$profileEmail = $_SESSION['userEmail']; 
				$profileID = $_SESSION['userID'];
				$profileNickname = $_SESSION['userNickname'];
				$profileRepPoints = $_SESSION['userRepPoints'];
				$profileFName = $_SESSION['userFName'];
				$profileLName = $_SESSION['userLName']; //assign all the session variables to in page variables for easy use 
				echo "<p>User name: " .$profileFName ." " .$profileLName ."</p>";
				echo "<p>User forum name: " .$profileNickname ."</p>"; 
				echo "<p>Reputation Points: " .$profileRepPoints ."</p>";
				//echo $profileLName; 

		?>

			
			
			<?php if(isset($_GET['login']));/*user wants to login link*/?> 

		<div id = "profilecolour">
		<a href="javascript:toggleFormVisibility();" id="sub">Change Password?</a>
		</div>
		
		<center><form action="<?php echo $_SERVER['PHP_SELF']; ?> #" method="post" name ="subscribe" id="subscribe_frm" style ="display: none">
			Old Password:<br>
			<input type="password" name="oldPassword" size="50" maxlength="14">
			<br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="subscribe_frm">
			New Password:<br>
			<input type="password" name="newPassword" size="50" maxlength="14">
			<br><br>

		<div id = "profilecolour">
		<input type="submit" id = "subscribe_frm" name = "subscribe" value="Submit"/> 
		<br>
		<a href="javascript:toggleFormVisibility();" id="nosub" style="display: none">Close</a>		
		</form></center>
		<p></p>
		</div>
		
		<?php 
		
			$dbcnx = @mysql_connect('localhost', 'root', 'cisgroup');
				if (!$dbcnx) //if a connection cannot be made, the code will exit gracefully 
					{
						exit( '<p> Unable to connect to the ' . 'database server at this time. </p>' );
					}

			//select the webforum db 
				if(!@mysql_select_db('webforum'))
					if (!@mysql_select_db('webforum')) //if the connection is made but the database cannot be found, exit gracefully 
						{
							exit('<p>Unable to locate the forum ' . 'database at this time. </p>'); 
						}
						
				if (isset($_POST['oldPassword']))
					{
						$stringCheck = "true"; 
						$oldPassword = $_POST['oldPassword']; 
							if (empty($oldPassword))
								{
									$stringCheck = "false"; 
								}
							
							if ($oldPassword != $_SESSION['userPassword'])
								{
									$stringCheck = "false"; 
								}
					
						if (isset($_POST['newPassword']))
							{
								$newPassword = $_POST['newPassword'];
									if (empty($newPassword))
										{
											$stringCheck = "false"; 
										}
						
						if ($oldPassword == $_POST['newPassword'])
							{
								$stringCheck = "false"; 
							}
						
						
						if ($stringCheck == "false")
							{
								//echo "You have: neglected to fill out one of the fields, entered the wrong current password, or not changed the new password."; 
								?>
									<script>if (window.confirm('You have neglected to fill out one of the fields, entered the wrong current password, or not entered a new different password. Retry?')) {
											window.location.href='profilePage.php';
											}
						</script> <!--runs a script to redirect the user, asking if they want to log in right away -->
						<?php
							}
						
						
							} //end if for new password 
				
						if ($stringCheck == "true")
							{
								$sql = "UPDATE userdetails SET userPassword = '$newPassword' WHERE userID = '$profileID'";
								
								$result = @mysql_query($sql); 
									if ($result == 1)
										{
											$_SESSION['userPassword'] = $newPassword; 
											?>
											<script>window.alert('Your password has been changed!');
											</script>
											<?php
										}
									if ($result == 0)
										{
											?>
											<script>window.alert('There was a problem processing your request. Please try again later.');
											</script>
											<?php
										}
										 
										
										
							}
				
					} //end if 
		
			//include a function to return all the questions associated with one user 
			echo "<center><h1>Your Questions</h1></center>";
			
			
			$arrayCounter = 0; 
			$variableArray = array(); //holds question titles
			$idArray = array();
	
			$questionsList = @mysql_query("SELECT questionID, questionTitle FROM questionDetails WHERE userID = '$profileID' ORDER BY questionID DESC");
			
			if (!$questionsList) 
					{
						exit('<p>Error performing query: ' . mysql_error() . '</p>');
					}
					
				while ($question = mysql_fetch_array($questionsList)) 
					{
						$questionTitle = $question['questionTitle'];
						$variableArray[$arrayCounter] = $question['questionTitle'];
						$idArray[$arrayCounter] = $question['questionID']; 
						
						$arrayCounter = $arrayCounter + 1; //array counter 
					}	
				
				$arrayCounter = 0;
			
			foreach($variableArray as $title)
					{
						$relID = $idArray[$arrayCounter];
						echo "<center><h2><a href='questionResponse.php?qid=$relID&id=1' id='questionTitle'>$title</a></h2></center>";
						$arrayCounter = $arrayCounter + 1; 
					} 
		
		?>
		
		<div id = "heading4">
		Terms and Conditions
		</div>
		<hr>

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
		<li>Do not advertise or promote products or services. </li>
		<li>Do not spam or flood the forum. Only submit a comment once. Do not resubmit the same, or similar, comments. Keep the number of comments you submit on a topic at a reasonable level. Multiple comments from the same individual, or a small number of individuals, may discourage others from contributing. </li>
		<li>Do not use an inappropriate user name (vulgar, offensive etc.).</li>
		<li>If you are under the age of 12 please get your parent/guardian's permission before participating in this forum. Users without this consent are not allowed to participate or provide us with personal information.</li>
		</ul>
		
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
				<li><a href="Trouble-shooting.php">Trouble-Shooting</a></li>	
			</ul>
	</div>
	</div>
</body>
</html>

<!--script to toggle reset password form visibility-->
<script>
var frm_element = document.getElementById('ChangePassword'); 
var vis = frm_element.style;
vis.display = 'none';
</script>