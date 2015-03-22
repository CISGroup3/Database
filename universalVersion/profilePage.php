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
		<a href="javascript:toggleFormVisibility();" id="nosub" style="display: none">Done?</a>		
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
						
						
						
						if ($stringCheck == "false")
							{
								echo "You have neglected to fill out an old or new password, or entered a wrong old password."; 
							
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
		
		?>
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