<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en"> 
<head>
<title> Forum Questions </title>
<meta charset = "utf-8">
<link rel="stylesheet" type="text/css" href="CSS/mystyle.css"/>

</head>
<a name="top"></a>

<body>
<?php		
		
	if (isset($_GET['vote'])) 
		{
				header("location:voteChange.php"); 
		}
	
	
	if (isset($_GET['delete']))
		{
			header("location:deleteQuestion.php"); 
		}
		
		$loggedIn = "false";
		
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) 
			{
				$loggedIn = "true";
			}
		
		if (isset($_GET['postResponse']))
			{
				header("location:postResponse.php");
			}
		
		$questionID = $_GET['qid']; //gets the question ID from the previous page 
		$_SESSION['qid'] = $questionID; //for use with the voting page redirect 
		
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
		
		$responseCategoryID = $_SESSION['categoryID']; 
		$responseID = $questionID; //holds the primary key of the question 
		$_SESSION['questionID'] = $responseID; 
		$userID = $_SESSION['userID']; 
		
		$checkExists = "SELECT * FROM questiondetails WHERE questionID = '$responseID'";
		$result = mysql_query($checkExists);
		
		if (mysql_num_rows($result) == 0)
			{
					header("location:forumMenu.php");
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
							$_SESSION['userID'] = "";
							$_SESSION['voteCount'] = 0; 
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

	<?php
		$sessionVariableHere = 'placeholder'; //ignore this for now
		$getCategory = "SELECT title FROM categories INNER JOIN questionDetails
		ON categories.categoryID = questionDetails.categoryID WHERE categoryID = '$sessionVariableHere'"; //once a session variable is passed, this can be used to select the category
		
		$responseQuery = "SELECT userID FROM questionDetails
			WHERE questionID = '$responseID'"; 
			$result = mysql_query($responseQuery); 
			$row = mysql_fetch_row($result);
			$posterID = $row[0]; //assign the ID of the poster of the question to a variable
		
		
		#show the section of the question 
		$sectionQuery = "SELECT title FROM categories WHERE categoryID = '$responseCategoryID'";
		$result = mysql_query($sectionQuery);
		$row = mysql_fetch_row($result);
		$categoryTitle = $row[0]; 
		echo "<br><br><center><div id = heading5>$categoryTitle</div></center>";
		
				if ($loggedIn == "true" && $userID == $posterID)
			{
			echo "<div id = 'questioncolour2'><a href='deleteQuestion.php?delete=true'>Delete Your Question</a></div>";
			}
		
		if ($loggedIn == 'true')
		{
			echo "<div id = 'questioncolour'><a href='postResponse.php?postResponse=true'>Post a Reply</a></div>";
		}
		
		#shows the title of the question 
		$responseQuery = "SELECT questionTitle FROM questionDetails WHERE questionID = '$responseID'";
		$result = mysql_query($responseQuery); 
		$row = mysql_fetch_row($result);
		$questionTitle = $row[0];
		echo "<center><h2 id='questionFormat' >$questionTitle</h2></center>"; 

		$responseQuery = "SELECT userNickname FROM userDetails INNER JOIN questionDetails 
		ON userDetails.userID = questionDetails.userID
		WHERE questionID = '$responseID'"; 
		$result = mysql_query($responseQuery); 
		$row = mysql_fetch_row($result);
		$userNickname = $row[0];
		#show the time 
		$responseQuery2 = "SELECT questionDate FROM questionDetails 
		WHERE questionID = '$responseID'"; 
		$result2 = mysql_query($responseQuery2); 
		$row2 = mysql_fetch_row($result2);
		$dateStamp = $row2[0];
		echo "<p id='questionTitle2'>Posted by $userNickname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$dateStamp</p>"; 
		
		$responseQuery = "SELECT questionText FROM questionDetails WHERE questionID = '$responseID'"; 
		$result = mysql_query($responseQuery); 
		$row = mysql_fetch_row($result);
		$questionContent = $row[0];
		echo "<p>$questionContent</p>"; 
	
		$responseQuery = "SELECT score FROM questionDetails WHERE questionID = '$responseID'"; 
		$result = mysql_query($responseQuery); 
		$row = mysql_fetch_row($result);
		$score = $row[0];
		$_SESSION['score'] = $score; 
		
			$sameUser = ""; 
			$answerCheck = $_SESSION['voteCount']; 
			
		if ($posterID == $_SESSION['userID'])
			{
				$sameUser = "true"; 
			}
			
		if ($posterID != $_SESSION['userID'])
			{
				$sameUser = "false"; 
			}
		
		if ($sameUser == "false" && $answerCheck != 1 && $loggedIn == "true")
		{
		echo "<p id=questionTitle2>&#8593 <a href='voteChange.php?vote=up'>Up Vote</a> &nbsp; &#8595 <a href='voteChange.php?vote=down'>Down Vote</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score: <big><b>$score</b></big>
		</p> ";
		}

		if ($answerCheck  != 0 && $loggedIn == "true")
		{
		echo "<p id=questionTitle2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='voteChange.php?vote=cancel'>Cancel Vote</a>&nbsp;&nbsp;&nbsp;Score: <big><b>$score</b></big>
		</p> ";
		}
		
		if ($sameUser == "true" or $loggedIn == "false")
		{
		echo "<p id=questionTitle2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score: <big><b>$score</b></big>
		</p> ";
		}
		
		echo "<br>"; 
	//now we need to retrieve any responses (using the magic of pagination)
		$start=0;
		$limit=2; //Change this line to alter limit of posts for each page

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
//echo $id;
$query=mysql_query("SELECT responseContent, responseDetails.userID, userNickname FROM responseDetails INNER JOIN userDetails ON responseDetails.userID = userDetails.userID WHERE questionID = $responseID ORDER BY responseID DESC LIMIT $start, $limit");

	while($query2=mysql_fetch_array($query))
		{
			echo "<p id=questionTitle2> Posted by ".$query2['userNickname']."</p>"; 
			echo "<p>".$query2['responseContent']."</p>";
			//$title = implode($query2.['responseContent']);
			//echo $title; 
		}



$rows=mysql_num_rows(mysql_query("SELECT responseContent, userID FROM responseDetails WHERE questionID = $responseID LIMIT $start, $limit"));

$newQuery = "SELECT responseContent, userID FROM responseDetails WHERE questionID = $responseID ";
$newTotal = 0; //used to find the amount of rows returned. 
$newQuery = "SELECT responseContent, userID FROM responseDetails WHERE questionID = $responseID";
$responseList = mysql_query($newQuery); 
while ($response = mysql_fetch_array($responseList)) //iterate through all the rows  
				{
						$newTotal = $newTotal + 1; 
				}	


$total=ceil($newTotal/$limit);		
if($id>1)
{
	echo "<a href='?qid=$responseID&id=".($id-1)."' class='button'>PREVIOUS</a>";
}
if($id<$total)
{
	echo "<a href='?qid=$responseID&id=".($id+1)."' class='button'>NEXT</a>";
}

echo "<ul class='page'>"; //displays the page number 
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<li class='current'>".$i."</li>"; }
			
			else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
		}
echo "</ul>";
echo "<br><br>";

if ($loggedIn == "true" && $userID == $posterID)
			{
			echo "<div id = 'questioncolour2'><a href='deleteQuestion.php?delete=true'>Delete Your Question</a></div>";
			}
		
		if ($loggedIn == 'true')
		{
			echo "<div id = 'questioncolour'><a href='postResponse.php?postResponse=true'>Post a Reply</a></div>";
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
		<div id = "gototop">
			<b><a href='#top'>Back to Top</a></b>
		</div>
		
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
