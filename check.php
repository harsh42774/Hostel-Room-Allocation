<?php
require('sql_connect.php');
$reg=$_COOKIE['reg'];
$sql1=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql1))
{
	if($row['status']==0)
	{
		header('Location: roomselection.htm');
		exit();
	}
	else
	{
		echo("<script language='JavaScript'>
		window.alert('You have already registered')
		window.location.href='main.html'
		</script>");
		exit();			
	}
}
?>