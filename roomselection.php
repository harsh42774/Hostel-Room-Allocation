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
		$sql=mysqli_query($con,"UPDATE data SET room_fees='79300' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='42000' WHERE reg='$reg'");
	}
	header("Location: 2bed.htm");
	exit();
}
else if($room=='3')
{
	if($type=='ac')
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='75100' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='37300' WHERE reg='$reg'");
	}
	header("Location: 3bed.htm");	
	exit();
}
else if($room=='4')
{
	if($type=='ac')
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='69800' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='32200' WHERE reg='$reg'");
	}
	header("Location: 4bed.htm");	
	exit();
}
else
{
	if($type=='ac')
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='61500' WHERE reg='$reg'");
	}
	else
	{
		$sql=mysqli_query($con,"UPDATE data SET room_fees='28300' WHERE reg='$reg'");
	}
	header("Location: 6bed.htm");	
	exit();
}

?>