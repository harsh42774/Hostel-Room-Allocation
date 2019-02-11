<?php

require('sql_connect.php');

//$reg=$_COOKIE['reg'];
$reg = strtoupper($_SESSION['user']);

$mess=$_POST['mess'];

$sql=mysqli_query($con,"UPDATE data SET mess='$mess' WHERE reg='$reg'");

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
