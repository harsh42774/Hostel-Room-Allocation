<?php

require('sql_connect.php');

$reg=$_COOKIE['reg'];	// Get the reg. no. of the logged in student
$mess=$_POST['mess'];	// Get the mess value selected by the student

// $sql=mysqli_query($con,"UPDATE data SET mess='$mess' WHERE reg='$reg'");	
// Update the mess type selected by the student to the database
if($stmt = $con->prepare("UPDATE data SET mess=? WHERE reg=?"))
{
	$stmt->bind_param("ss", $mess, $reg);
	$stmt->execute();
	$stmt->close();
}

// Set the mess fees value for the student logged in
if($mess=='special')
{
	// $sql=mysqli_query($con,"UPDATE data SET mess_fees='67900' WHERE reg='$reg'");
	$mess_fees=67900;
	if($stmt = $con->prepare("UPDATE data SET mess_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $mess_fees, $reg);
		$stmt->execute();
		$stmt->close();
	}
}
else if($mess=='south veg')
{
	// $sql=mysqli_query($con,"UPDATE data SET mess_fees='53300' WHERE reg='$reg'");
	$mess_fees=53300;
	if($stmt = $con->prepare("UPDATE data SET mess_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $mess_fees, $reg);
		$stmt->execute();
		$stmt->close();
	}
}
else if($mess=='south non-veg')
{
	// $sql=mysqli_query($con,"UPDATE data SET mess_fees='59300' WHERE reg='$reg'");
	$mess_fees=59300;
	if($stmt = $con->prepare("UPDATE data SET mess_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $mess_fees, $reg);
		$stmt->execute();
		$stmt->close();
	}
}
else if($mess=='north veg')
{
	// $sql=mysqli_query($con,"UPDATE data SET mess_fees='53300' WHERE reg='$reg'");
	$mess_fees=53300;
	if($stmt = $con->prepare("UPDATE data SET mess_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $mess_fees, $reg);
		$stmt->execute();
		$stmt->close();
	}
}
else
{
	// $sql=mysqli_query($con,"UPDATE data SET mess_fees='59300' WHERE reg='$reg'");
	$mess_fees=59300;
	if($stmt = $con->prepare("UPDATE data SET mess_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $mess_fees, $reg);
		$stmt->execute();
		$stmt->close();
	}
}

header("Location: payment.htm");	// Redirect to the payment page

exit();

?>