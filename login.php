<?php
require('sql_connect.php');

if(isset($_POST['submit']))
{
	$reg=mysqli_escape_string($con,$_POST['reg']);
	$pass=mysqli_escape_string($con,$_POST['pass']);
	if(!$_POST['reg'])
	{
		echo("<script language='JavaScript'>
			window.alert('Please enter Registration Number')
			window.location.href='ROOM_ALLOCATION_LOGIN.html'
			</script>");
		exit();
	}
	else if(!$_POST['pass'])
	{
		echo("<script language='JavaScript'>
			window.alert('Please enter Password')
			window.location.href='ROOM_ALLOCATION_LOGIN.html'
			</script>");
		exit();
	}
	$sql=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg' AND pass='$pass'");
	if(mysqli_num_rows($sql)>0)
	{
		setcookie('reg',$reg,time() + (86400),"/");
		header('Location: ROOM_ALLOCATION_HOMEPAGE.html');
		exit();
	}
	else
	{
		echo ("<script language='JavaScript'>
			window.alert('Wrong Registration Number or Password. Please re-enter.')
			window.location.href='ROOM_ALLOCATION_LOGIN.html'
			</script>");
		exit();
	}
}

?>