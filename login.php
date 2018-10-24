<?php
require('sql_connect.php');
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['submit']))
{
	$reg=mysqli_escape_string($con,$_POST['reg']);
	$pass=mysqli_escape_string($con,$_POST['pass']);
	if(!$_POST['reg'])
	{
		echo("<script language='JavaScript'>
			window.alert('Please enter Registration Number')
			window.location.href='login.html'
			</script>");
		exit();
	}
	else if(!$_POST['pass'])
	{
		echo("<script language='JavaScript'>
			window.alert('Please enter Password')
			window.location.href='login.html'
			</script>");
		exit();
	}
	$sql=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg'");
	while($row=mysqli_fetch_array($sql))
	{
		$start_time = $row['start'];
		$end_time = $row['end'];
	}
	$start = $start_time;
	$end = $end_time;
	$start_time = strtotime($start_time);
	$end_time = strtotime($end_time);
	if(mysqli_num_rows($sql)>0)
	{
		$current_time = date('Y-m-d H:i:s');
		$current_time = strtotime($current_time);
		if($start_time <= $current_time)
		{
			if($current_time<=$end_time)
			{
				setcookie('reg',$reg,time() + (86400),"/");
				header('Location: home.html');
				exit();
			}
			else
			{
				echo ("<script language='JavaScript'>
				window.alert('Your registration period is over')
				window.location.href='login.html'
				</script>");
				exit();
			}
		}
		else
		{
			echo ("<script language='JavaScript'>
			window.alert('Your registeration is from $start to $end')
			window.location.href='login.html'
			</script>");
			exit();	
		}
	}
	else
	{ 
		echo ("<script language='JavaScript'>
			window.alert('Wrong Registration Number or Password. Please re-enter.')
			window.location.href='login.html'
			</script>");
		exit();
	}
}

?>