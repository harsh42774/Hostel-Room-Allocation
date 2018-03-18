<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);
$r1=strtoupper($_POST['s1']);
$r2=strtoupper($_POST['s2']);
$r3=strtoupper($_POST['s3']);
$r4=strtoupper($_POST['s4']);
$r5=strtoupper($_POST['s5']);

if($r1==$reg || $r2==$reg || $r3==$reg || $r4==$reg || $r5==$reg || $r1==$r2 || $r1==$r3 || $r1==$r4 || $r1==$r5 || $r2==$r3 || $r2==$r4 || $r2==$r5 || $r3==$r4 || $r3==$r5 || $r4==$r5)
{
	echo("<script>alert('Enter valid registration number');
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

header("Location: mess.htm");

?>