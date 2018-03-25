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
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
}

header("Location: mess.htm");

?>