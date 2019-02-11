<?php
require('sql_connect.php');
$reg=strtoupper($_COOKIE['reg']);
$sql1=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg'");// for getting alloted field data
$sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");// for getting room occupied by students data

while($row1=mysqli_fetch_array($sql1))
{

	if($row1['alloted']==0)// not alloted
	{

		$sql3 = mysqli_query($con, "SELECT * FROM invite WHERE ifrom = '$reg'");
		if (mysqli_num_rows($sql3)>0) {
			while ($row3 = mysqli_fetch_array($sql3)) {

				if ($row3['invite_true'] == 0 || $row3['invite_true'] == 0) {// even if one requst is pending stall leader
					echo "lkfdjdsklfjksldagj";
					/*echo("<script>
								alert('Please wait for your possible future
											 roomates to accept your invite');
						location.href='main.html';
						</script>");*/

					header("Location: leader_stall.php");
					exit();
				}

				// if one rejected logic below-----
				/*elseif ($row3['invite_reject'] == 1 || $row3['invite_reject'] == '1') {
					// code...
				}*/

			}
		}

		// if all invites are accepted then only this part of code will be accessed
		// even if one invite is not accepted then it will stall
		header('Location: blockselection.htm');
		exit();
	}

	else// if alloted
	{
		while($row=mysqli_fetch_array($sql))
		{
			if(empty($row['mess']))
			{
				$r1=strtoupper($row['r1']);
				$r2=strtoupper($row['r2']);
				$r3=strtoupper($row['r3']);
				$r4=strtoupper($row['r4']);
				$r5=strtoupper($row['r5']);
				if(!empty($row['r5']))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2, $r3, $r4, $r5 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!empty($row['r3']))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2, $r3 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!empty($row['r2']))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!empty($row['r1']))
				{
					echo("<script>alert('You have already been registered for room with $r1 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
			}
			else
			{
				// redirect to reciept (reciept.php)
				echo("<script language='JavaScript'>
					window.alert('You have already registered for room and mess')
					window.location.href='receipt.php'
					</script>");
				exit();
			}
		}
	}
}

// what to add
/*

X \/ == task completed

1. add to wait if all roomatates have not accepted(for leader who is sending requests) X \/
2. if stalling leader create a stall page X\/
3. logout then login(request accept person), stall at main page, please wait for leader to get a roomate
4. when all has accepted redrect leader to room selection (roomselection.htm)

*/


?>
