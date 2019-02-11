<?php
require('sql_connect.php');
require('login_middleware.php');
//$reg=strtoupper($_COOKIE['reg']);
$reg = strtoupper($_SESSION['user']);

$r1=strtoupper($_POST['s1']);
$r2=strtoupper($_POST['s2']);
$r3=strtoupper($_POST['s3']);
$r4=strtoupper($_POST['s4']);
$r5=strtoupper($_POST['s5']);

$result=mysqli_query($con,"SELECT rank FROM login WHERE reg='$reg'");
$result1=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r1'");
$result2=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r2'");
$result3=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r3'");
$result4=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r4'");
$result5=mysqli_query($con,"SELECT rank,alloted FROM login WHERE reg='$r5'");

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
while($row = $result4->fetch_assoc()) {
	$rank4=$row['rank'];
	$a4=$row['alloted'];
}
while($row = $result5->fetch_assoc()) {
	$rank5=$row['rank'];
	$a5=$row['alloted'];
}

if($a1==1)
{
	echo("<script>alert('$r1 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a2==1)
{
	echo("<script>alert('$r2 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a3==1)
{
	echo("<script>alert('$r3 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a4==1)
{
	echo("<script>alert('$r4 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($a5==1)
{
	echo("<script>alert('$r5 is already registered with someone else');
	location.href='6bed.htm';
	</script>");
	exit();
}

else if($r1==$reg || $r2==$reg || $r3==$reg || $r4==$reg || $r5==$reg || $r1==$r2 || $r1==$r3 || $r1==$r4 || $r1==$r5 || $r2==$r3 || $r2==$r4 || $r2==$r5 || $r3==$r4 || $r3==$r5 || $r4==$r5)
{
	echo("<script>alert('Enter valid registration number');
	location.href='6bed.htm';
	</script>");
	exit();
}
else if(abs($rank1-$rank)>200 || abs($rank2-$rank)>200 || abs($rank3-$rank)>200 || abs($rank4-$rank)>200 || abs($rank5-$rank)>200)
{
	echo("<script>alert('Difference between two ranks cannot exceed 200');
	location.href='6bed.htm';
	</script>");
	exit();
}
else
{
	$sql=mysqli_query($con,"UPDATE data SET r1='$r1' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r2='$r2' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r3='$r3' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r4='$r4' WHERE reg='$reg'");
	$sql=mysqli_query($con,"UPDATE data SET r5='$r5' WHERE reg='$reg'");
}

header("Location: room.php");

?>
