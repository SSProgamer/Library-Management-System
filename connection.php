<?php
//set variable
$password = "baipor2545";
$db_name = "book_loan_systema";

//setup database 
$con= mysqli_connect("localhost","root",$password,$db_name) or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');
?>