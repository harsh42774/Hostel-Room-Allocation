<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$sql1=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql1))
{
	if($row['status']==0)
	{
		header('Location: ROOM_ALLOCATION_ROOM_SELECTION.htm');
		exit();
	}
	else
	{
		echo("<script language='JavaScript'>
		window.alert('You have already registered')
		window.location.href='ROOM_ALLOCATION_MAIN_PAGE.html'
		</script>");
		exit();			
	}
}
?>