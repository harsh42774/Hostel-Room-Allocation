<?php

require('sql_connect.php');

$reg=$_COOKIE['reg'];
$mess=$_POST['mess'];
$room=$_COOKIE['room'];

$sql=mysqli_query($con,"UPDATE data SET mess='$mess' WHERE reg='$reg'");
$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$reg'");
$sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql))
{
	$room=$row['room'];
	$type=$row['type'];
	$room_fees=$row['room_fees'];
    $r1=$row['r1'];
    $r2=$row['r2'];
    $r3=$row['r3'];
    $r4=$row['r4'];
    $r5=$row['r5'];
}

if(!empty($r1))
{
	$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
	$sql=mysqli_query($con,"UPDATE data SET r1='$reg',r2='$r2',r3='$r3',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r1'");
}
if(!empty($r2))
{
	$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r2'");
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$reg',r3='$r3',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r2'");
}
if(!empty($r3))
{
	$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r3'");
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$reg',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r3'");
}
if(!empty($r4))
{
	$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r4'");
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$r3',r4='$reg',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r4'");
}
if(!empty($r5))
{
	$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$r3',r4='$r4',r5='$reg',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r5'");
}

if($mess=='special')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='67900' WHERE reg='$reg'");
}
else if($mess=='south veg')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='53300' WHERE reg='$reg'");
}
else if($mess=='south non-veg')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='59300' WHERE reg='$reg'");
}
else if($mess=='north veg')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='53300' WHERE reg='$reg'");
}
else
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='59300' WHERE reg='$reg'");
}

header("Location: payment.htm");

exit();

?>