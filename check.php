<?php
require('sql_connect.php');	// this file is required to connect to the sql database
$reg=strtoupper($_COOKIE['reg']);	// get the cookie value
// $sql1=mysqli_query($con,"SELECT alloted FROM login WHERE reg='$reg'");	// to get the table values to check whether the student has already registered or not
// $sql=mysqli_query($con,"SELECT r1,r2,r3,r4,r5,mess FROM data WHERE reg='$reg'");

if($stmt=$con->prepare("SELECT alloted FROM login WHERE reg=?"))
{
	$stmt->bind_param("s", $reg);
	$stmt->execute();
	$stmt->bind_result($allot);

	while($stmt->fetch())
	{
		$alloted=$allot;
	}
	$stmt->close();
	// To check if the student is already alloted or not
	if($alloted==0)	// If not alloted the room, then re-direct to the hostel block selection page
	{
		header('Location: blockselection.htm');
		exit();
	}
	else
	{
		if($stmt1=$con->prepare("SELECT r1,r2,r3,r4,r5,mess FROM data WHERE reg=?"))
		{
			$stmt1->bind_param("s", $reg);
			$stmt1->execute();
			$stmt1->bind_result($fr1, $fr2, $fr3, $fr4, $fr5, $fmess);
			while($stmt1->fetch())
			{
				$r1=strtoupper($fr1);
				$r2=strtoupper($fr2);
				$r3=strtoupper($fr3);
				$r4=strtoupper($fr4);
				$r5=strtoupper($fr4);
				$mess=strtoupper($fmess);
			}
			$stmt1->close();
			// Check if he has registered for mess or not
			if($mess==NULL or $mess='')		// If mess selection is pending, re-direct to mess selection page
			{
				//	The below code just extracts the roommate's names and alerts the user about the roommmates and re-directs to mess selection page
				if(!($r5==NULL or $r5==''))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2, $r3, $r4, $r5 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}	
				else if(!($r3==NULL or $r3==''))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2, $r3 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!($r2==NULL or $r2==''))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!($r1==NULL or $r1==''))
				{
					echo("<script>alert('You have already been registered for room with $r1 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
			}
			else	// If already the whole process is completed, keep the student on the home page
			{
				echo("<script language='JavaScript'>
					window.alert('You have already registered for room and mess')
					window.location.href='main.html'
					</script>");
				exit();
			}
		}			
	}
}
?>