<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);
$r1=strtoupper($_POST['s1']);

if($r1==$reg)
{
	echo("<script>alert('Enter valid registration number');
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