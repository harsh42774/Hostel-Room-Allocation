<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);
$r1=strtoupper($_POST['s1']);
$r2=strtoupper($_POST['s2']);

$result=mysqli_query($con,"SELECT rank FROM login WHERE reg='$reg'");
$result1=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r1'");
$result2=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r2'");

while($row = $result->fetch_assoc()) {
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

if($a1==1)
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='3bed.htm';
	</script>");
	exit();
}

else if($a2==1)
{
	echo("<script>alert('$r2 is already registered with someone else');
	location.href='3bed.htm';
	</script>");
	exit();
}

else if($r1==$reg || $r1==$r2 || $r2==$reg)
{
	echo("<script>alert('Two registration numbers cannot be same');
	location.href='3bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200 || abs($rank2-$rank)>200)
{
	echo("<script>alert('Difference between two ranks cannot exceed 200');
	location.href='3bed.htm';
	</script>");
	exit();
}
else
{
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r2='$r2' WHERE reg='$reg'");
}

header("Location: room.php");

?>