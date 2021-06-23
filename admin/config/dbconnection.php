<?php

//rquired variables for database connection

$servername="localhost";
$myusername="root";
$password="";
$dbname="adminpanel";

//create connection
$con= mysqli_connect($servername,$myusername,$password,$dbname);
//check connection
if(!$con){
    header("Location: ../errors/db.php");
}

?>