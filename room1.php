<?php
require('sql_connect.php');     // Required to connect to the database

$reg=$_COOKIE['reg'];   // Get the Reg. No. of the logged in student
$room_no=$_POST['room_no']; // Get the room no. selected from the HTML form
setcookie('room_no',$room_no,time() + (86400),"/");	// Here, we set the cookie of the room no. which is used in other pages

header("Location: before_receipt.php");   // Redirect to the mess selection page

?>