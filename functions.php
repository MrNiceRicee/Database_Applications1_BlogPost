<?php
function dbconnect(){
    //Credentials for accessing the database
    $dbservername="localhost";
    $dbusername="root";
    $dbpassword = "root";
    $dbname = "fridaynotes_1.10.2020";
    
    //create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    
    if ($conn ->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);    
    }
    return $conn;
    
}



// new functions for saving session data
//save userid
function saveUserId($idd)
{
//    sessions_start();
    $_SESSION["USER_ID"] = $idd;
}
//save username
function saveUserName($name)
{
//    session_start();
    $_SESSION["USERNAME"] = $name;
}
//save firstname
function saveFirstName($name)
{
//    session_start();
    $_SESSION["FIRST_NAME"] = $name;
}


function getUserId()
{
    return $_SESSION["USER_ID"];
}
function getFirstName(){
    return $_SESSION["FIRST_NAME"];
}
function getUserName()
{
    return $_SESSION["USERNAME"];
}

?>