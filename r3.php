<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);	// Get the reg. no. of the logged in student
$key1=strtoupper($_POST['s1']);		// Get the key entered by the student
$key2=strtoupper($_POST['s2']);		// Get the key entered by the student
$flag=0;
//////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////// Roommate 1 ///////////////////////////

/* $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key1'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='3bed.htm';
	</script>");
	exit();
}

// To get the reg. no. from the key
while($row = mysqli_fetch_array($sql))
{
	$r1=$row['reg'];
} */

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
	location.href='3bed.htm';
	</script>");
	exit();
}

////////////////////// Roommate 2 ///////////////////////////

/* $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key2'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='3bed.htm';
	</script>");
	exit();
}

// To get the reg. no. from the key
while($row = mysqli_fetch_array($sql))
{
	$r2=$row['reg'];
} */

$flag=0;
if($stmt = $con->prepare("SELECT reg FROM login WHERE ikey=?"))
{
	$stmt->bind_param("s",$key2);
	$stmt->execute();
	$stmt->bind_result($fr2);
	while($stmt->fetch())
	{
		$r2 = strtoupper($fr2);
		$flag=1;
	}
	$stmt->close();
}

// To check if the key is valid or not and alert the student if the key is invalid
if($flag==0)
{
	echo("<script>alert('Please enter valid key');
	location.href='3bed.htm';
	</script>");
	exit();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

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
// $result2=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r2'");	// Get the alloted value of the desired roommate to check if he is already taken or not
if($stmt = $con->prepare("SELECT rank,alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s",$r2);
	$stmt->execute();
	$stmt->bind_result($frank2, $fa2);
	while($stmt->fetch())
	{
		$rank2 = $frank2;
		$a2 = $fa2;
	}
	$stmt->close();
}

/*	while($row = $result->fetch_assoc()) {
		$rank=$row['rank'];
	}
	while($row = $result1->fetch_assoc()) {
		$rank1=$row['rank'];
		$a1=$row['alloted'];
	}
	while($row = $result2->fetch_assoc()) {
		$rank2=$row['rank'];
		$a2=$row['alloted'];
	}	*/

if($a1==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='3bed.htm';
	</script>");
	exit();
}

else if($a2==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r2 is already registered with someone else');
	location.href='3bed.htm';
	</script>");
	exit();
}

else if($r1==$reg || $r1==$r2 || $r2==$reg)		// This condition is true if the student enters his own key or any 2 keys entered are the same
{
	echo("<script>alert('Two registration numbers cannot be same');
	location.href='3bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200 || abs($rank2-$rank)>200)		// This condition value is true if the rank gap between the students exceed 200
{
	echo("<script>alert('Difference between two ranks cannot exceed 200');
	location.href='3bed.htm';
	</script>");
	exit();
}
else
{
	// Update the reg. no. of the desired roommate to the database
	// $sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
	if($stmt = $con->prepare("UPDATE data SET r1=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $r1, $reg);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r2='$r2' WHERE reg='$reg'");
	if($stmt = $con->prepare("UPDATE data SET r2=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $r2, $reg);
		$stmt->execute();
		$stmt->close();
	}
}

header("Location: room.php");	// Redirect to the room selection page

?>