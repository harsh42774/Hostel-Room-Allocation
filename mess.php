<?php

require('sql_connect.php');	// Required to connect to the database

$reg=strtoupper($_COOKIE['reg']);	// Get the cookie value
$mess=$_POST['mess'];				// Get the selected mess value
$room=$_COOKIE['room'];				// Get the room value

// $sql=mysqli_query($con,"UPDATE data SET mess='$mess' WHERE reg='$reg'");	// Update the mess value to the database

if($stmt = $con->prepare("UPDATE data SET mess=? WHERE reg=?"))
{
	$stmt->bind_param("ss", $mess, $reg);
	$stmt->execute();
	$stmt->close();
}

// $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$reg'");	// Update the login table value and set alloted to 1
$alloted=1;
if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
{
	$stmt->bind_param("ss", $alloted, $reg);
	$stmt->execute();
	$stmt->close();
}

// $sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");				// Get the values from the data table to set it to the roommate's rows

if($stmt = $con->prepare("SELECT room,type,room_fees,r1,r2,r3,r4,r5 FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($froom,$ftype,$froom_fees,$fr1,$fr2,$fr3,$fr4,$fr5);
	while($stmt->fetch())
	{
		$room = $froom;
		$type = $ftype;
		$room_fees = $froom_fees;
		$r1 = strtoupper($fr1);
		$r2 = strtoupper($fr2);
		$r3 = strtoupper($fr3);
		$r4 = strtoupper($fr4);
		$r5 = strtoupper($fr5);
	}
	$stmt->close();
}


/*while($row=mysqli_fetch_array($sql))
{
	$room=$row['room'];				// Get the room number
	$type=$row['type'];				// Get the room type
	$room_fees=$row['room_fees'];	// Get the room fees
	//Get the reg. no. of the roommates
	$r1=strtoupper($row['r1']);
    $r2=strtoupper($row['r2']);
    $r3=strtoupper($row['r3']);
    $r4=strtoupper($row['r4']);
    $r5=strtoupper($row['r5']);
}*/

// Set the roommates alloted values to 1 and updating the room no., room type, room fees of all the roommates chosen
if(!empty($r1))
{
	//$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
	if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $alloted, $r1);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r1='$reg',r2='$r2',r3='$r3',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r1'");
	if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("sssssssss", $reg, $r2, $r3, $r4, $r5, $room, $type, $room_fees, $r1);
		$stmt->execute();
		$stmt->close();
	}
}
if(!empty($r2))
{
	// $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r2'");
	if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $alloted, $r2);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$reg',r3='$r3',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r2'");
	if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("sssssssss", $r1, $reg, $r3, $r4, $r5, $room, $type, $room_fees, $r2);
		$stmt->execute();
		$stmt->close();
	}
}
if(!empty($r3))
{
	// $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r3'");
	if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $alloted, $r3);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$reg',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r3'");
	if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("sssssssss", $r1, $r2, $reg, $r4, $r5, $room, $type, $room_fees, $r3);
		$stmt->execute();
		$stmt->close();
	}
}
if(!empty($r4))
{
	// $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r4'");
	if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $alloted, $r4);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$r3',r4='$reg',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r4'");
	if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("sssssssss", $r1, $r2, $r3, $reg, $r5, $room, $type, $room_fees, $r4);
		$stmt->execute();
		$stmt->close();
	}
}
if(!empty($r5))
{
	// $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
	if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $alloted, $r5);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$r3',r4='$r4',r5='$reg',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r5'");
	if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
	{
		$stmt->bind_param("sssssssss", $r1, $r2, $r3, $r4, $reg, $room, $type, $room_fees, $r5);
		$stmt->execute();
		$stmt->close();
	}
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