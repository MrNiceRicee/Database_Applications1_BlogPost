<?php

// function dbconnect(){
//     //Credentials for accessing the database
//     $dbservername="localhost";
//     $dbusername="root";
//     $dbpassword = "root";
//     $dbname = "fridaynotes_1.10.2020";
    
//     //create connection
//     $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    
//     if ($conn ->connect_error)
//     {
//         die("Connection failed: " . $conn->connect_error);
//     }
//     return $conn;
    
// }
require_once 'functions.php';
include 'header.php';

$conn = dbconnect();


$blogTitle = $_POST["blogTitle"];
$blogBody = $_POST["blogBody"];
$authorName = getFirstName();
$userid = getUserId();

//echo "<br>name " .getFirstName(). " id: " .getUserId();

// $sql = "INSERT INTO blogs (BLOG_TITLE, BLOG_CONTENT , USER_ID ,NAME)
//          VALUES('" .$blogTitle. "', '" .$blogBody. "','3','someauthor')";

$sql = "INSERT INTO blogs (BLOG_TITLE, BLOG_CONTENT , USER_ID ,NAME)
        VALUES('" .$blogTitle. "', '" .$blogBody. "','" .$userid. "','" .$authorName."')";

if($conn->query($sql) == TRUE){
    echo "Your Blog has been posted!";
}else{
    echo "Error " .$sql. "<br>" . $conn->error;
}

if (mysqli_connect_errno()){
    echo "Failed to connect to mySQL " .mysqli_connect_error();
}


$conn->close();

?>
