<?php

$dbhost = 'localhost'; //host
$dbuser = 'root'; //your username created
$dbpass = ''; //the password 4 that user
$dbname = 'mysql';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 

$check_num = $_POST['check'];
$desc = $_POST['desc'];
$amount = $_POST['checkAmount'];
$date = $_POST['date'];
$category = $_POST['category'];
$misc_desc = $_POST['miscDesc'];
$query = "INSERT INTO income (Check_Number, Purchase_Description, Purchase_Amount, Date, Category, Misc_Description) VALUES($check_num, '" . $desc . "', $amount, $date, '" . $category . "', '" . $misc_desc . "')";
print $query;
$result = mysqli_query($conn, $query) or die('Error in main query: ' . $query . mysqli_error($conn));
//$query = "COMMIT"; 
//$result = mysqli_query($conn, $query);
//header("Location:Income.html");
?>