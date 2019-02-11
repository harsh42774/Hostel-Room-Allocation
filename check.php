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
		// case 1 user is leader
		// if he is leader then this query would definitely return more than 1 row.
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
			// if all invites are accepted then only this part of code will be accessed
			// even if one invite is not accepted then it will stall
			header('Location: blockselection.htm');
			exit();
		}
		// case 2 user is invite accepting person and has accepted someone's invite
		elseif (mysqli_num_rows($sql3) == 0) {
			// we are getting to whom a person has sent invites if he has sent it to our dear user
			$sql4 = mysqli_query($con, "SELECT * FROM invite WHERE ito = '$reg' AND invite_true = 1");

			// if user has got any invite that he has accepted
			if (mysqli_num_rows($sql4)>0) {
				while ($row4 = mysqli_fetch_array($sql4)){
					$reg_from = $row4['ifrom'];
				}

				$sql5 = mysqli_query($con, "SELECT * FROM invite WHERE ifrom = '$reg_from'");
				while ($row5 = mysqli_fetch_array($sql5)){
						$flag_integrity = 1;// flag to check if invite_true only has 0 or 1
						if ($row5['invite_true'] == 0 || $row5['invite_true'] == '0') {
							setcookie('reg_from_invi',$reg_from,time() + (86400),"/");
							// get the user who has sent the user request
							// redirect accepting person
							// who has accepted invite
							// even if one request is not accepted by leader
							header("Location: accept_awaits_stall.php");
							exit();
						}
						elseif ($row5['invite_true'] == 1 || $row5['invite_true'] == '1') {
							$flag_integrity = 1;
						}
						else {
							$flag_integrity = 0;
						}
						// logic to let accepting user proceed to mess selection if a room is selected else stall!!!
						//if ($flag_integrity == 1) {
							// code...
						//}
				}
			}

			// if user hasnt got any invites and wants to be leader
			elseif (mysqli_num_rows($sql4)<=0) {
				header('Location: blockselection.htm');
				exit();
			}


		}
		// change comment, case for if person hasnt even used invite
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
