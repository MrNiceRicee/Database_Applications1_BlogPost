<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<meta name = "description" content="some tutorials ">
		<title>All Blogs </title>
		<style type="text/css">
		section{
		  position: relative;
		  left: 30%;
		}
		nav{
		  position: relative;
		  border-radius:25px;
		  background: #484848;
		  width: 20%;
		  height: 200px;
		}
		ul{
    		position: absolute;
    		left: -25px;
    		top: 10px;
		}
		article{
		  position: absolute;
		  top: 10px;
		  right: 5px;
		  border-radius:25px;
		  background: #F5F5F5;
		  padding: 20px;
		  width: 50%;
		  height: 140px;
		  margin: auto;
		  text-align: left;
		}
		header{
    		position: sticky;
    		left: 10%;
    		top: 0;
    		background-color: #808080;
    		color: #FFFFFF;
    		width: 20%
		}
		div.blogtitle{
		    width: 100px;
		    word-wrap: break-word;
		}
		div.bloop{
		}
		a {
		  text-decoration: none;
    		color: #FFFFFF;
    	}
		</style>
	</head>
	<body>
		<header>
			<h4>
				All Blogs
    			<a href="index.html">
    				<br> HOME
    			</a>
			</h4>
		</header>



<?php
//Credentials for accessing the database
$dbservername="blogpostserver.mysql.database.azure.com";
$dbusername="admin1@blogpostserver";
$dbpassword = "Pass123!";
$dbname = "blogdatabasesql";
$bID = "";
$bTitle = "";
$bContent = "";
$bDate = "";
$bUID = "";
$bName = "";


//create connection
//$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($con, "blogpostserver.mysql.database.azure.com", "admin1@blogpostserver", {your_password}, {your_database}, 3306);
$conn=mysqli_init(); mysqli_ssl_set($conn, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($conn, {$dbservername}, {$dbusername}, {$dbpassword}, {$dbname}, 3306);

//$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn ->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT BLOG_ID, BLOG_TITLE, BLOG_CONTENT, BLOG_DATE, USER_ID, NAME FROM blogs";        //sql select all of these things, FROM the users table

$result = $conn->query($sql);
if ($result->num_rows > 0){         //check if it works
    //Loop through the users that returned from the database
    $someint = 1;
    while ($row = $result -> fetch_assoc()){
      //  echo "userID: " .$row["USER_ID"]. " Name: " .$row["FIRST_NAME"]. " " .$row["LAST_NAME"]. "<br>";
      $bID = $row["BLOG_ID"];
      $bTitle = $row["BLOG_TITLE"];
      $bContent = $row["BLOG_CONTENT"];
      $bDate = $row["BLOG_DATE"];
      $bUID = $row["USER_ID"];
      $bName = $row["NAME"];
      ?>
    	 <section>
    		<nav>
    			<ul style="color: #F5F5F5">
    				<div class = "blogtitle">
    					<div class= "bloop">
    					<b><?php echo $bTitle?></b>

    					</div>
    				    Author: <?php echo $bName?>
    				    <br>
    				</div>

    			</ul>
    			<article style ="color:#484848">
    				<!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque interdum rutrum sodales. Nullam mattis fermentum libero, non volutpat.
    		             -->
    		        <?php echo $bContent?>
    			</article>
    		</nav>

    	</section>
    	<br>
    	<br>

<?php
    $someint = $someint +1;
    }
}elseif($result->num_rows ==0){
   // echo "There are no blogs posted.";
   ?><br> hey there no blogs found<?php
}else{
   // echo "Error: " .$sql. "<br>" .$conn->error;
}
$conn->close();
?>




		<footer>

		</footer>
	</body>
</html>
