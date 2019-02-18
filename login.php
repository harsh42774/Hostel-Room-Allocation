<?php
require('sql_connect.php');		// Required to connect to sql database
date_default_timezone_set('Asia/Kolkata');		// To set server time's location
if(isset($_POST['submit']))		// If login button is pressed
{
	$reg=mysqli_escape_string($con,$_POST['reg']);	// To remove any escape characters present and store the registration no. to $reg variable
	$pass=mysqli_escape_string($con,$_POST['pass']);// To remove any escape characters present and store the password to $pass variable
	$flag=0;
	if(!$_POST['reg'])	// If no register no. is entered alert the user to enter the register no.
	{
		echo("<script language='JavaScript'>
			window.alert('Please enter Registration Number')
			window.location.href='login.html'
			</script>");
		exit();
	}
	else if(!$_POST['pass'])	// If no password is entered alert the user to enter the password
	{
		echo("<script language='JavaScript'>
			window.alert('Please enter Password')
			window.location.href='login.html'
			</script>");
		exit();
	}

	// $sql=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg'");	// Fetch the login details from the database which has the register no. as input by the user

	if($stmt = $con->prepare("SELECT start,end FROM login WHERE reg=? and pass=?"))
	{
		$stmt->bind_param("ss",$reg,$pass);
		$stmt->execute();
		$stmt->bind_result($fstart,$fend);
		while($stmt->fetch())
		{
			$start_time = $fstart;
			$end_time = $fend;
			$flag=1;
		}
		$stmt->close();
	}

	$start = $start_time;
	$end = $end_time;
	$start_time = strtotime($start_time);	// Convert the string fetched to time format for verification
	$end_time = strtotime($end_time);
	// Check if register no. and password is correct or not
	if($flag==1)	// This condition is true if the reg. no. and password is correct
	{
		$current_time = date('Y-m-d H:i:s');	// Get the current date and time from the server
		$current_time = strtotime($current_time);	// Convert the string fetched to time format for comparision
		// Check if current time is in the time slot alloted to the student
		if($start_time <= $current_time)
		{
			if($current_time<=$end_time)	// This condition is true if the current time is in the time slot
			{
				setcookie('reg',$reg,time() + (86400),"/");	// Here, we set the cookie of the register no. which is used in other pages to get specific information from the database
				header('Location: home.html');	// Redirect the user to the home page
				exit();	// Skip the rest of the code
			}
			else
			{
				echo ("<script language='JavaScript'>
				window.alert('Your registration period is over')	// Alert the user that the registration period is over for that student
				window.location.href='login.html'					// Redirect the student to the login page
				</script>");
				exit();
			}
		}
		else
		{
			echo ("<script language='JavaScript'>
			window.alert('Your registeration is from $start to $end')	// Alert the student that his registration is not started yet
			window.location.href='login.html'							// Redirect the student to login page
			</script>");
			exit();	
		}
	}
	else
	{ 
		echo ("<script language='JavaScript'>
			window.alert('Wrong Registration Number or Password. Please re-enter.')		// Alert the user that register no. and password is incorrect
			window.location.href='login.html'	// Redirect to login page
			</script>");
		exit();
	}
}
?>