<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);	// Get the reg. no. of the logged in student
$key1=strtoupper($_POST['s1']);		// Get the key entered by the student
$key2=strtoupper($_POST['s2']);		// Get the key entered by the student
$key3=strtoupper($_POST['s3']);		// Get the key entered by the student
$key4=strtoupper($_POST['s4']);		// Get the key entered by the student
$key5=strtoupper($_POST['s5']);		// Get the key entered by the student
$flag=0;
//////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////// Roommate 1 ///////////////////////////

/*$sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key1'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
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
	location.href='6bed.htm';
	</script>");
	exit();
}

////////////////////// Roommate 2 ///////////////////////////

/* $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key2'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
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
	location.href='6bed.htm';
	</script>");
	exit();
}

////////////////////// Roommate 3 ///////////////////////////

/* $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key3'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
	</script>");
	exit();
}

// To get the reg. no. from the key
while($row = mysqli_fetch_array($sql))
{
	$r3=$row['reg'];
} */

$flag=0;
if($stmt = $con->prepare("SELECT reg FROM login WHERE ikey=?"))
{
	$stmt->bind_param("s",$key3);
	$stmt->execute();
	$stmt->bind_result($fr3);
	while($stmt->fetch())
	{
		$r3 = strtoupper($fr3);
		$flag=1;
	}
	$stmt->close();
}

// To check if the key is valid or not and alert the student if the key is invalid
if($flag==0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
	</script>");
	exit();
}

////////////////////// Roommate 4 ///////////////////////////

/* $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key4'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
	</script>");
	exit();
}

// To get the reg. no. from the key
while($row = mysqli_fetch_array($sql))
{
	$r4=$row['reg'];
} */
$flag=0;
if($stmt = $con->prepare("SELECT reg FROM login WHERE ikey=?"))
{
	$stmt->bind_param("s",$key4);
	$stmt->execute();
	$stmt->bind_result($fr4);
	while($stmt->fetch())
	{
		$r4 = strtoupper($fr4);
		$flag=1;
	}
	$stmt->close();
}

// To check if the key is valid or not and alert the student if the key is invalid
if($flag==0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
	</script>");
	exit();
}

////////////////////// Roommate 5 ///////////////////////////

/* $sql = mysqli_query($con, "SELECT reg FROM login where ikey='$key5'");

// To check if the key is valid or not
if(mysqli_num_rows($sql)<=0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
	</script>");
	exit();
}

// To get the reg. no. from the key
while($row = mysqli_fetch_array($sql))
{
	$r5=$row['reg'];
} */
$flag=0;
if($stmt = $con->prepare("SELECT reg FROM login WHERE ikey=?"))
{
	$stmt->bind_param("s",$key5);
	$stmt->execute();
	$stmt->bind_result($fr5);
	while($stmt->fetch())
	{
		$r5 = strtoupper($fr5);
		$flag=1;
	}
	$stmt->close();
}

// To check if the key is valid or not and alert the student if the key is invalid
if($flag==0)
{
	echo("<script>alert('Please enter valid key');
	location.href='6bed.htm';
	</script>");
	exit();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

// $result=mysqli_query($con,"SELECT rank FROM login WHERE reg='$reg'");			// Get the rank of the logged in student
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
// $result3=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r3'");	// Get the alloted value of the desired roommate to check if he is already taken or not	
if($stmt = $con->prepare("SELECT rank,alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s",$r3);
	$stmt->execute();
	$stmt->bind_result($frank3, $fa3);
	while($stmt->fetch())
	{
		$rank3 = $frank3;
		$a3 = $fa3;
	}
	$stmt->close();
}
// $result4=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r4'");	// Get the alloted value of the desired roommate to check if he is already taken or not	
if($stmt = $con->prepare("SELECT rank,alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s",$r4);
	$stmt->execute();
	$stmt->bind_result($frank4, $fa4);
	while($stmt->fetch())
	{
		$rank4 = $frank4;
		$a4 = $fa4;
	}
	$stmt->close();
}
// $result5=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r5'");	// Get the alloted value of the desired roommate to check if he is already taken or not	
if($stmt = $con->prepare("SELECT rank,alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s",$r5);
	$stmt->execute();
	$stmt->bind_result($frank5, $fa5);
	while($stmt->fetch())
	{
		$rank5 = $frank5;
		$a5 = $fa5;
	}
	$stmt->close();
}

/* while($row = $result->fetch_assoc()) {
	$rank=$row['rank'];
}
while($row = $result1->fetch_assoc()) {
	$rank1=$row['rank'];
	$a1=$row['alloted'];
}
while($row = $result2->fetch_assoc()) {
	$rank2=$row['rank'];
	$a2=$row['alloted'];
}
while($row = $result3->fetch_assoc()) {
	$rank3=$row['rank'];
	$a3=$row['alloted'];
}
while($row = $result4->fetch_assoc()) {
	$rank4=$row['rank'];
	$a4=$row['alloted'];
}
while($row = $result5->fetch_assoc()) {
	$rank5=$row['rank'];
	$a5=$row['alloted'];
} */

if($a1==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a2==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r2 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a3==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r3 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a4==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r4 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a5==1)	// This condition value is true if the desired roommate is already selected by someone else
{
	echo("<script>alert('$r5 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($r1==$reg || $r2==$reg || $r3==$reg || $r4==$reg || $r5==$reg || $r1==$r2 || $r1==$r3 || $r1==$r4 || $r1==$r5 || $r2==$r3 || $r2==$r4 || $r2==$r5 || $r3==$r4 || $r3==$r5 || $r4==$r5)	// This condition is true if the student enters his own key or any 2 keys entered are the same
{
	echo("<script>alert('Enter valid registration number');
	location.href='6bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200 || abs($rank2-$rank)>200 || abs($rank3-$rank)>200 || abs($rank4-$rank)>200 || abs($rank5-$rank)>200)	// This condition value is true if the rank gap between the students exceed 200
{
	echo("<script>alert('Difference between two ranks cannot exceed 200');
	location.href='6bed.htm';
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
	// $sql=mysqli_query($con,"UPDATE data SET r3='$r3' WHERE reg='$reg'");
	if($stmt = $con->prepare("UPDATE data SET r3=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $r3, $reg);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r4='$r4' WHERE reg='$reg'");
	if($stmt = $con->prepare("UPDATE data SET r4=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $r4, $reg);
		$stmt->execute();
		$stmt->close();
	}
	// $sql=mysqli_query($con,"UPDATE data SET r5='$r5' WHERE reg='$reg'");
	if($stmt = $con->prepare("UPDATE data SET r5=? WHERE reg=?"))
	{
		$stmt->bind_param("ss", $r5, $reg);
		$stmt->execute();
		$stmt->close();
	}
}

header("Location: room.php");	// Redirect to the room selection page

?>