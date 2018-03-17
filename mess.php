<?php

require('sql_connect.php');

$reg=$_COOKIE['reg'];
$mess=$_POST['mess'];

$sql=mysqli_query($con,"UPDATE data SET mess='$mess' WHERE reg='$reg'");
$sql=mysqli_query($con,"UPDATE data SET status='1' WHERE reg='$reg'");

if($mess=='special')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='67850' WHERE reg='$reg'");
}
else if($mess=='south veg')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='55200' WHERE reg='$reg'");
}
else if($mess=='south non-veg')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='61525' WHERE reg='$reg'");
}
else if($mess=='north veg')
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='55200' WHERE reg='$reg'");
}
else
{
	$sql=mysqli_query($con,"UPDATE data SET mess_fees='61525' WHERE reg='$reg'");
}

header("Location: payment.htm");

exit();

?>