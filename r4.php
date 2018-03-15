<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$r1=$_POST['s1'];
$r2=$_POST['s2'];
$r3=$_POST['s3'];

if($r1==$reg)
{
	echo("<h1><font color='red'>Enter valid registration Number</font></h1><h3><a href='ROOM_ALLOCATION_ROOMMATE_SELECTION_4.htm'>Back</a></h3>");
	exit();
}
else if($r2==$reg)
{
	echo("<h1><font color='red'>Enter valid registration Number</font></h1><h3><a href='ROOM_ALLOCATION_ROOMMATE_SELECTION_4.htm'>Back</a></h3>");
	exit();
}
else if($r3==$reg)
{
	echo("<h1><font color='red'>Enter valid registration Number</font></h1><h3><a href='ROOM_ALLOCATION_ROOMMATE_SELECTION_4.htm'>Back</a></h3>");
	exit();
}
else
{
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r2='$r2' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r3='$r3' WHERE reg='$reg'");
}

header("Location: ROOM_ALLOCATION_MESS_SELECTION.htm");

?>