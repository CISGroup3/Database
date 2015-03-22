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
							
						</ul>
					</nav>
				</div>
			</ul>	
		</nav>
	</div>

		
	<?php if(isset($_GET['login']));/*user wants to login link*/?> 
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
			<b>Title:</b><br>
			<input type="text" name="questionTitle" size="30" maxlength="30">
			<br>
		
		<textarea rows = "6" cols="100" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="questionContent" placeholder="Please post your response here"></textarea> <br>
		
		
		
		<?php

			//get the category
			$arrayCounter = 0; 
			$variableArray = array(); //malware, antivirus etc.
			$idArray = array(); //1...7 
			$categoryList = @mysql_query('SELECT title, categoryID FROM categories');
			
			
				if (!$categoryList) 
					{
						exit('<p>Error performing query: ' . mysql_error() . '</p>');
					}
				while ($category = mysql_fetch_array($categoryList)) 
					{
						$categoryText = $category['title'];
						$variableArray[$arrayCounter] = $category['title']; //category[0] = malware etc.
						$idArray[$arrayCounter] = $category['categoryID']; //ID[0] = 1
						//echo $variableArray[$arrayCounter]; 
						$arrayCounter = $arrayCounter + 1; //array counter = 7 at end
						
					}	
				
				
				echo '<select name="Category" id = "Category" project="Category">';
				foreach($variableArray as $title)
					{
						echo "<option value='$title'>$title</option>";
					} //displays dropdown
				echo'</select>';


		?>
		<br>
		<div id = "center2">
		<?php 
			if ($loggedIn == "true")
				{
					echo'<input type="submit" value="SUBMIT" />'; 
				}
			else
				{
					echo '<p>You must be logged in to post</p>'; 
				}
		?>
		</form>
		</div>
		
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

<?php //default
//connect to the db 
			
//If variables have been submitted through the form, assign them and post them
	if (isset($_POST['questionTitle'])) 
		{
			//$variableArray = array(" ", "something"); //creates an array to hold each of the values 
			$questionTitle = $_POST['questionTitle'];
			//$variableArray[0] = $questionTitle; 
			$checker = "true"; //remains true as long as user enters a value in each box
			
			//$categoryID = $_SESSION['category']; 
			$userID = $_SESSION['userID']; 
			$questionDate = time(); 
			
			$categoryItem = $_POST['Category'];
			echo "<p>$categoryItem</p>";
			
			$counter = 0;
			
			foreach ($variableArray as $value) //find the ID of the category chosen by the user
				{
						if ($value != $categoryItem)
							{
								$counter = $counter + 1;
							}
					
						if ($value == $categoryItem)
							{
								break;
							}
				}
			
			echo $arrayCounter;
			echo $counter;
			$categoryID = $idArray[$counter];
			//echo $categoryID;
			
			if (!empty($_POST['questionContent']))
				{
					$questionText = $_POST['questionContent']; 
				}
			
			if (empty($_POST['questionContent']) OR empty($_POST['questionTitle']) OR $userID == "")
				{
					$checker = "false";
				}
			
						$query = @mysql_query("SELECT categoryID FROM categories WHERE title = $categoryText");
						
				
				//echo"<p>$questionTitle, $userID, $categoryID, $questionText</p>"; 
			
				$sql = "INSERT INTO questionDetails SET questionTitle='$questionTitle', userID ='$userID', categoryID = '$categoryID', questionText = '$questionText', questionStatus = 'Open', questionDate = FROM_UNIXTIME($questionDate), score =0";
				//creates a new user through a SQL insert query
				
				
			if ($checker == "true")
			{
				if (@mysql_query($sql))
					{
						echo '<p>Your query has been submitted.</p>';
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; //redirects to prevent the user refreshing the page and creating a user account twice
					}
			}	
				else if ($sql === false) //if the query doesn't work/returns false, then catch the error gracefully
					{
						echo '<p>Error adding submission: ' .
						mysql_error() . '</p>';
					} //end else 
			
		
			if ($checker == 'false')
				{
					echo '<p> You have neglected to fill in all of the textboxes.</p>'; 
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
</body>
</html>
