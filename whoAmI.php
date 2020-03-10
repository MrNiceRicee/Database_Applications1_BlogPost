<?php
//    require_once 'functions.php';
//    require_once 'loginHandler.php';
// $conn = dbconnect();
// $someID = "";
// $sql = "SELECT USER_ID, USERNAME, FIRST_NAME
//         FROM users 
//         WHERE BINARY USERNAME='" .getUserName(). "' AND " . " BINARY FIRST_NAME='" .getFirstName(). "'";
// $result = $conn->query($sql);

// if ($result ==1 ){
//     $row = $result->fetch_assoc();
//     $someID = $row["USER_ID"];
// }   
require_once 'functions.php';
include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<title> Who am I</title>
    	<style type="text/css">
    		body {
    			text-align: center;
    		}
    		
    	}
    	</style>
    </head>
    <body>
    	<h2> Hello, <?php echo " ".getFirstName() . " Username: " .getUserName().
            " ID: ".getUserId() ?>, Welcome back.  </h2><br>
        	
        <br><br>
        
        <a href="BlogEntry.html"> Make a blog </a>
        

        
        	
    </body>
    <footer>
    	<hr>
         <br>        	
        <a href="index.html"> Back to home page? </a>
    </footer>
</html>