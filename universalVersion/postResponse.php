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
	<textarea action="<?php  if($loggedIn != "true"){echo'style ="display:none"';} echo $_SERVER["PHP_SELF"];?>" method="post" style="width: 939px; height: 150px" id="questionFormat" name="responseContent" placeholder="Please post your response here"></textarea>
	<br>
	
	<div id ="center">
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
	</div>
	

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
		<div id = "heading4">
		Terms and Conditions
		</div>
		
		<hr>
		
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
		<li>Do not advertise or promote products or services. </li>
		<li>Do not spam or flood the forum. Only submit a comment once. Do not resubmit the same, or similar, comments. Keep the number of comments you submit on a topic at a reasonable level. Multiple comments from the same individual, or a small number of individuals, may discourage others from contributing. </li>
		<li>Do not use an inappropriate user name (vulgar, offensive etc.).</li>
		<li>If you are under the age of 12 please get your parent/guardian's permission before participating in this forum. Users without this consent are not allowed to participate or provide us with personal information.</li>
		</ul>
		</p>
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
