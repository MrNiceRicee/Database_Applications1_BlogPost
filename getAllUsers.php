<?php
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
    
    $sql = "SELECT USER_ID, FIRST_NAME, LAST_NAME FROM users";        //sql select all of these things, FROM the users table
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0){         //check if it works
        //Loop through the users that returned from the database
        while ($row = $result -> fetch_assoc()){
            echo "userID: " .$row["USER_ID"]. " Name: " .$row["FIRST_NAME"]. " " .$row["LAST_NAME"]. "<br>";
        }
    }elseif($result->num_rows ==0){
        echo "There are no users in the database.";
    }else{
        echo "Error: " .$sql. "<br>" .$conn->error;
    }
    $conn->close();
?>