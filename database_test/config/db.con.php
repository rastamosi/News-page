<?php

$dbServername = "localhost";
$dbuser = "root";
$dbpassword = "mabahamim1";
$dbname = "practice";
$conn = mysqli_connect($dbServername, $dbuser, $dbpassword, $dbname);


if (!$conn) {  


    die("Connection failed" . mysqli_connect_error());  

}  

else {  

    // connect to the database named Pagination

    mysqli_select_db($conn, 'practice');  

}  



