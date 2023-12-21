<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nfc";

//create a connection to database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

//check the connection
    if(!$conn)
    {
        die("Connection failed: " .mysqli_connect_error());
    }
?>