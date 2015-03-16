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
			<img src="Images/athenasecuritylogo.png" alt="Athena Security" title="Athena Security" height="150" width="200"/> 
		</div>
		
	<?php if(isset($_GET['login']));/*user wants to login link*/?> 
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
			Title:<br>
			<input type="text" name="questionTitle">
			<br>
		
		<textarea rows = "4" cols="50" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="questionContent">Add your question text here.
		</textarea> <br>
		
		
		
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
	
<div id="feedControl">Loading...</div>

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
