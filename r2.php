<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);
$r1=strtoupper($_POST['s1']);

$result=mysqli_query($con,"SELECT rank FROM login WHERE reg='$reg'");
$result1=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r1'");

while($row = $result->fetch_assoc()) {
	$rank=$row['rank'];
}
while($row=mysqli_fetch_array($result1))
{
	$rank1=$row['rank'];
	$a1=$row['alloted'];
}

if($a1==1)
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='2bed.htm';
	</script>");
	exit();
}

else if($r1==$reg)
{
	echo("<script>alert('Two registration numbers cannot be same');
	location.href='2bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200)
{
	echo("<script>alert('Difference between two ranks cannot exceed 200');
	location.href='2bed.htm';
	</script>");
	exit();
}
else
{
	$result3=mysqli_query($con, "SELECT ito FROM invite WHERE ifrom='$reg'");
	$a1='FALSE';
	while($row=mysqli_fetch_array($result3))
	{
		$a1=$row['ito'];
	}
	$sql1=mysqli_query($con, "SELECT * FROM invite WHERE ito='$r1'");
	$selected=0;
	while($row=mysqli_fetch_array($sql1))
	{
		if($row['invite_true']==1 or $row['invite_true']=='1')
		{
			$selected=1;
			break;
		}
	}
	if($a1=='FALSE')
	{
		if($selected==1)
		{
			echo("<script>alert('The student has accepted another invite');
			location.href='2bed.htm';
			</script>");
		}
		else
		{
			$sql=mysqli_query($con, "INSERT INTO invite(ifrom,ito) values('$reg','$r1')");
			$sql=mysqli_query($con, "UPDATE login SET invite='1' WHERE reg='$r1'");
			echo("<script>alert('Invite sent. Please refresh the page when the student accepts the invite and complete the other processes.');
			location.href='2bed.htm';
			</script>");
		}
	}
	else
	{
		$result4=mysqli_query($con, "SELECT r1 FROM data WHERE reg='$reg'");
		while($row=mysqli_fetch_array($result4))
		{
			$r1=$row['r1'];
		}
		if($r1!=NULL){
			header("Location: room.php");
		}
		else{
			echo("<script>alert('You have already sent an invite. Please, contact the student.');
			location.href='2bed.htm';
			</script>");
		}
	}
}
/*
else
{
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
}

header("Location: room.php");
*/
?>