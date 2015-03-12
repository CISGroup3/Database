<?php // logout.php page
    session_start();
    $_SESSION = array();
    session_unset();
    $page = "Index2.php";
    
	
            // if redirect to is a restricted page, redirect to index
            $file = "index.php";
    
    header("Location: $file");
?>