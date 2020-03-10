<?php
require_once 'functions.php';
include 'header.php';
/*
*   loginhandler will let registered users login- it checks if a duplicate username was found
*/

//This is from the login.html
$username = $_POST["username"];
$password = $_POST["password"];

if ($username == NULL || trim($username) == ""){
    exit("Username is a required field");
}
if ($password == NULL || trim($username) ==""){
    exit("Password is a required field");
}


//creating the connection
$conn = dbconnect();

// Select user from bloguser table and see if they are registered
$sql = "SELECT USER_ID, USERNAME, PASSWORD, FIRST_NAME
        FROM users WHERE BINARY USERNAME='" . $username . "' AND " . " BINARY PASSWORD='" . $password. "'";
$result = $conn->query($sql);

//echo (#sql);
if ($conn->error)
{
    echo "Error: " .$sql . "<br>";
    include ('loginFailed.php');
    
    
}
else if ($result->num_rows==1)
{
 //   echo "Login was successful. ";
    $row = $result->fetch_assoc();
    saveUserName($row["USERNAME"]);
    saveFirstName($row["FIRST_NAME"]);
    saveUserId($row["USER_ID"]);
//    echo "Hello my name is " .getUserId();
//    echo "Login was successful. Welcome back " .getUserName() . " "  .getUserId();
    include ('loginResponse.php');
    
}
elseif($result->num_rows==0)
{
    include ('loginFailed.php');
}
elseif($result->num_rows>1){
    echo "Multiple users have registered.";
}
else 
{
    echo "Error: " .$sql . "<br>" . $conn->error;
}
$conn->close();
?>
