<?php
require('sql_connect.php');		// Required to connect to the database

$reg=strtoupper($_COOKIE['reg']);	// Get the reg. no. of the student
$key1=strtoupper($_POST['s1']);		// Get the key entered by the student
$flag=0;

//////////////////////////////////////////////////////////////////////////////////////////////////////////

// $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key1'");	// Get the row in the database where the key matches
if($stmt = $con->prepare("SELECT reg FROM login WHERE ikey=?"))
{
	$stmt->bind_param("s",$key1);
	$stmt->execute();
	$stmt->bind_result($fr1);
	while($stmt->fetch())
	{
		$r1 = strtoupper($fr1);
		$flag=1;
	}
	$stmt->close();
}

// To check if the key is valid or not and alert the student if the key is invalid
if($flag==0)
{
	echo("<script>alert('Please enter valid key');
	location.href='2bed.htm';
	</script>");
	exit();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////

// $result=mysqli_query($con,"SELECT rank FROM login WHERE reg='$reg'");	// Get the rank of the logged in student
if($stmt = $con->prepare("SELECT rank FROM login WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($frank);
	while($stmt->fetch())
	{
		$rank = $frank;
	}
	$stmt->close();
}
// $result1=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r1'");	// Get the alloted value of the desired roommate to check if he is already taken or not
if($stmt = $con->prepare("SELECT rank,alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s",$r1);
	$stmt->execute();
	$stmt->bind_result($frank1, $fa1);
	while($stmt->fetch())
	{
		$rank1 = $frank1;
		$a1 = $fa1;
	}
	$stmt->close();
}


if($a1==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='2bed.htm';
	</script>");
	exit();
}

else if($r1==$reg)	// This condition is true if the student enters his own key
{
	echo("<script>alert('Two registration numbers cannot be same');
	location.href='2bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200)	// This condition value is true if the rank gap between the students exceed 200
{
	echo("<script>alert('Difference between two ranks cannot exceed 200');
	location.href='2bed.htm';
	</script>");
	exit();
}
else
{
	// $sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");	// Update the reg. no. of the desired roommate to the database
	if($stmt = $con->prepare("UPDATE data SET r1=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $r1, $reg);
		$stmt->execute();
		$stmt->close();
	}
}

header("Location: room.php");	// Redirect to the room selection page
?>