<?php
require('sql_connect.php');
require('login_middleware.php');
//$reg=strtoupper($_COOKIE['reg']);
$reg = strtoupper($_SESSION['user']);

$r1=strtoupper($_POST['s1']);
$r2=strtoupper($_POST['s2']);
$r3=strtoupper($_POST['s3']);

$result=mysqli_query($con,"SELECT rank FROM login WHERE reg='$reg'");
$result1=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r1'");
$result2=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r2'");
$result3=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r3'");

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
while($row = $result3->fetch_assoc()) {
	$rank3=$row['rank'];
	$a3=$row['alloted'];
}

if($a1==1)
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='4bed.htm';
	</script>");
	exit();
}

else if($a2==1)
{
	echo("<script>alert('$r2 is already registered with someone else');
	location.href='4bed.htm';
	</script>");
	exit();
}

else if($a3==1)
{
	echo("<script>alert('$r3 is already registered with someone else');
	location.href='4bed.htm';
	</script>");
	exit();
}

else if($r1==$reg || $r2==$reg || $r3==$reg || $r1==$r2 || $r1==$r3 || $r2==$r3)
{
	echo("<script>alert('Two registration numbers cannot be same');
	location.href='4bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200 || abs($rank2-$rank)>200 || abs($rank3-$rank)>200)
{
	echo("<script>alert('Difference between twos ranks cannot exceed 200');
	location.href='4bed.htm';
	</script>");
	exit();
}
else
{
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r2='$r2' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r3='$r3' WHERE reg='$reg'");
}

header("Location: room.php");

?>
