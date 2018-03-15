<?php
require('sql_connect.php');

$room=$_POST['bed'];
$reg=$_COOKIE['reg'];
$type=$_POST['type'];

$sql=mysqli_query($con,"UPDATE data SET type='$type' WHERE reg='$reg'");
$sql=mysqli_query($con,"UPDATE data SET room='$room' WHERE reg='$reg'");
if($room=='2')
{
	if($type=='ac')
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='107405' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='67569' WHERE reg='$reg'");
	}
	header("Location: ROOM_ALLOCATION_ROOMMATE_SELECTION_2.htm");
	exit();
}
else if($room=='3')
{
	if($type=='ac')
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='102978' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='62498' WHERE reg='$reg'");
	}
	header("Location: ROOM_ALLOCATION_ROOMMATE_SELECTION_3.htm");	
	exit();
}
else
{
	if($type=='ac')
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='97285' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='57064' WHERE reg='$reg'");
	}
	header("Location: ROOM_ALLOCATION_ROOMMATE_SELECTION_4.htm");	
	exit();
}

?>