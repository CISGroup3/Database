<?php
session_start(); //starts the session to store certain variables using cookies
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>FAQ page</title>
<meta charset = "utf-8">



<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>


</head>

<body>

<?php
		$loggedIn = "false";
		//$_SESSION["userForumName"] = "";
		//$_SESSION["userEmail"] = ""; //sets variables for remembering login information
		echo "Session variables have been set "; 
		
		if (array_key_exists('userEmail', $_SESSION) && !empty($_SESSION['userEmail'])) {
		$loggedIn = "true";
		echo "User name is " . $_SESSION['userEmail'] . " "; 
			if(isset($_SESSION['userNickname']))
			{
				echo "Hello " .$_SESSION['userNickname'];
			}
		}
?>

	<div id = "nav">
		<nav>
			<ul>
				<li><img src="Images/Aegislogo.png" alt="Aegis Security" title="Aegis Security" height="50" width="80"></li>
				<li><a href="Index2.php">Home</a></li>
				<li><a href="News.php">Anti-Virus</a></li>
				<li><a href="FAQ.php">FAQ</a></li>
				<li><a href="Forum.html">Forum</a></li>
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
							<li><a href="index.html">Register</a></li>
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
		<p>Anti-Virus</p>
		</div>
			<table width = "100%" border = "black solid 1px">
  <tr>

    <td width = "23%">Malware</td>

    <td>Smith</td>		

  </tr>
  <tr>
    <td width = "23%">Anti viruses</td>
    <td>Jackson</td>		

  </tr>
  <tr>
    <td width = "23%">Whats wrong with my computer</td>
    <td>Doe</td>		
 
  </tr>
   <tr>
    <td width = "23%">Mobile/tablet support</td>
    <td>Doe</td>		
 
  </tr>
   <tr>
    <td width = "23%">Operating systems</td>
    <td>Doe</td>		
 
  </tr>
   <tr>
    <td width = "23%">Browsers</td>
    <td>Doe</td>		
 
  </tr>
   <tr>
    <td width = "23%">Misc</td>
    <td>Doe</td>		
 
  </tr>
</table>
		
		
<!-- end of wrapper -->
	</div>
	

		
	<div id="footer">
	<footer>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><b>|</b></li>
				<li><a href="News.html">Anti-Virus</a></li>
				<li><b>|</b></li>
				<li><a href="FAQ.html">FAQ</a></li>
				<li><b>|</b></li>
				<li><a href="Forum.html">Forum</a></li>
				<li><b>|</b></li>
				<li><a href="Trouble-shooting.html">Trouble-Shooting</a></li>	
			</ul>
		
	</footer>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script>
            $('.help').tooltip()

        </script>

</body>
</html>