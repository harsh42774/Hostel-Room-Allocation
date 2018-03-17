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
	header("Location: 2bed.htm");
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
	header("Location: 3bed.htm");	
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
	header("Location: 4bed.htm");	
	exit();
}

?>