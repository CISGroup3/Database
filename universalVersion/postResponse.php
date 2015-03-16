<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en"> 
<head>
<title> Add New Question </title>
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
		$_SESSION['responseCategoryID'] = 1; //holds the response category
		$responseCategoryID = 1; 
		$responseID = 57; //holds the primary key of the question 
		$_SESSION['questionID'] = $responseID; 
		$userID = 17; 
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
		<div class="logoimg">
			<img height="150" width="200"/> 
		</div>
		
	<?php if(isset($_GET['login']));/*user wants to login link*/?> 
	
	<?php
		$sessionVariableHere = 'placeholder'; //ignore this for now
		$getCategory = "SELECT title FROM categories INNER JOIN questionDetails
		ON categories.categoryID = questionDetails.categoryID WHERE categoryID = '$sessionVariableHere'"; //once a session variable is passed, this can be used to select the category
	
		$responseCategoryID = 1;  //for now the category is set to 1. 
		#show the section of the question 
	?>
	
	<hr> </hr>
	<form action="<?php echo $_SERVER["PHP_SELF"]; if($loggedIn != "true"){echo'style ="display:none"';} ?>" method="post" id="questionFormat" input type="text" name="responseContent">
	<textarea action="<?php  if($loggedIn != "true"){echo'style ="display:none"';} echo $_SERVER["PHP_SELF"];?>" method="post" style="width: 300px; height: 150px" id="questionFormat" name="responseContent">Please post your response here.</textarea>
	<br>
	<?php 
			if ($loggedIn == "true")
				{
					echo'<input type="submit" value="SUBMIT" />'; 
					
				}
			else
				{
					echo '<p>You must be logged in to respond</p>
					'; 
					
				}
		?>
	</form>
	
	</div> <!--end wrapper--> 

<?php //code for posting a response
	if (isset($_POST['responseContent'])) 
		{
			$responseContent = $_POST['responseContent']; 
			$questionID = $_SESSION['questionID'];
			echo "<p>Response content is" .$responseContent ."here</p>";
			$responseDate = time(); 
			$sql = "INSERT INTO responseDetails SET userID = '$userID', questionID = '$questionID', score = 0, responseDate = FROM_UNIXTIME($responseDate), preferredAnswer = 'F', responseContent = '$responseContent'";
			
			
			if (@mysql_query($sql))
					{
						echo '<p>Your query has been submitted.</p>';
						header("location:questionResponse.php"); 
						//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Index2.php">'; //redirects to prevent the user refreshing the page and creating a user account twice
					} 
			
		} //end if 

?> 
	
<div id="feedControl">Loading...</div>
		<p>Codes of Conduct and Terms of Service to go here</p>
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
</body>
</html>
