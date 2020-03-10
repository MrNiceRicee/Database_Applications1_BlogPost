<?php
//Access DB from our functions.php file
require_once 'functions.php';

//Saves our Form Data
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$userName = $_POST["username"];
$password = $_POST["password"];

//Credentials for accessing the database
$conn = dbconnect();

// $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD)
//         VALUES ('" .$firstName . "','" .$lastName . "','" .$userName . "','" . $password. "')";

$sql = "SELECT USER_ID, USERNAME, PASSWORD, FIRST_NAME
        FROM users WHERE BINARY USERNAME='" . $userName. "'";

$result = $conn->query($sql);
if ($conn->error)
{
    echo "Error: " .$sql . "<br>";
}
else if ($result->num_rows==0)
{
    $sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD)
                 VALUES ('" .$firstName . "','" .$lastName . "','" .$userName . "','" . $password. "')";
    if ($conn->query($sql) == TRUE)
    {
        echo "You are now registered!! <br> your info is saved in; <br>";
    }
    else 
    {
        echo "Error: " .$sql. "<br>" . $conn->error; 
    }
}else if ($result->num_rows>0){
    echo "someone with the same username is already registered!";
}
////Check Connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to mySQL:" .mysqli_connect_error();
}

//echo mysqli_get_server_info($conn);
//echo "System status: <br><br>". mysqli_stat($conn)
//Close connection
$conn-> close();
?>

<!DOCTYPE html>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just Registered</title>
</head>
<body>
	
	
<a href="index.html"> Back to home page? </a>

</body>
</html>
