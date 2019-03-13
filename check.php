<?php
require('sql_connect.php');	// this file is required to connect to the sql database
$reg=strtoupper($_COOKIE['reg']);	// get the cookie value
// $sql1=mysqli_query($con,"SELECT alloted FROM login WHERE reg='$reg'");	// to get the table values to check whether the student has already registered or not
// $sql=mysqli_query($con,"SELECT r1,r2,r3,r4,r5,mess FROM data WHERE reg='$reg'");

if($stmt=$con->prepare("SELECT alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s", $reg);
	$stmt->execute();
	$stmt->bind_result($allot);

	while($stmt->fetch())
	{
		$alloted=$allot;
	}
	$stmt->close();
	// To check if the student is already alloted or not
	if($alloted==0)	// If not alloted the room, then re-direct to the hostel block selection page
	{
		header('Location: blockselection.htm');
		exit();
	}
	else
	{
		echo("<script language='JavaScript'>
			window.alert('You have already been alloted.')
			window.location.href='main.html'
			</script>");
		exit();
	}
}
?>