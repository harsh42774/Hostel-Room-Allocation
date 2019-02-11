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
		// if he is leader then this query would definitely return more than or equal to 1 row.
		if (mysqli_num_rows($sql3)>0) {
			// i here is to check how many roomates has accepted invite
			$i = 0;
			$roomies = array();
			while ($row3 = mysqli_fetch_array($sql3)) {

				if ($row3['invite_true'] == 0 || $row3['invite_true'] == 0) {// even if one requst is pending stall leader
					/*echo("<script>
								alert('Please wait for your possible future
											 roomates to accept your invite');
						location.href='main.html';
						</script>");*/

					header("Location: leader_stall.php");
					exit();
				}
				elseif ($row3['invite_true'] == 1 || $row3['invite_true'] == 1)
				{
					$roomies[$i] = $row3['ito'];
					$i = $i + 1;
				}

				// if one rejected logic below-----
				/*elseif ($row3['invite_reject'] == 1 || $row3['invite_reject'] == '1') {
					// code...
				}*/

			}
			// if all invites are accepted then only this part of code will be accessed
			// even if one invite is not accepted then it will stall

			//if no one has accepted invited (well if i is 0 there is huge error!1)
			if ($i == 0) {
				header('Location: leader_stall.php');
				exit();
			}
			// else if someone has accepted inite and no one is remaing to accept invite
			if ($i == 1) {
				$sql7 = mysqli_query($con, "UPDATE data SET r1 = '$roomies[0]' WHERE reg = '$reg'");
				header("Location: roomselection1.htm");
				exit();
			}
			if ($i == 2) {
				$sql7 = mysqli_query($con, "UPDATE data SET r1 = '$roomies[0]', r2 = '$roomies[1]' WHERE reg = '$reg'");
				header("Location: roomselection1.htm");
				exit();
			}
			if ($i == 3) {
				$sql7 = mysqli_query($con, "UPDATE data SET r1 = '$roomies[0]', r2 = '$roomies[1]', r3 = '$roomies[2]'  WHERE reg = '$reg'");
				header("Location: roomselection1.htm");
				exit();
			}
			if ($i == 5) {
				$sql7 = mysqli_query($con, "UPDATE data SET r1 = '$roomies[0]', r2 = '$roomies[1]', r3 = '$roomies[2]', r4 = '$roomies[3]',
					r5 = '$roomies[5]' WHERE reg = '$reg'");
				header("Location: roomselection1.htm");
				exit();
			}

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
				// get the rows where $reg_from(person sending invites) has sent a request
				// if above condition is true else I can think only of error!!
				if (mysqli_num_rows($sql5)>0) {
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
							if ($flag_integrity == 1) {// if invite_true hasn't got any values other than 0 or 1 else error
								// logic to stall here
								$sql6 = mysqli_query($con, "SELECT * FROM login WHERE reg = '$reg_from'");
								// if this person is in login else there is huge error
								if (mysqli_num_rows($sql6)>0) {
									while ($row6 = mysqli_fetch_array($sql6)) {
										$alloted_reg_from = $row6['alloted'];
										if ($alloted_reg_from == 0 || $alloted_reg_from == "0") {
											setcookie('reg_from_invi_await_room',$reg_from,time() + (86400),"/");
											header("Location: room_selection_stall.php");
											exit();
										}
										// below logic is thrash, but removing may cause me to test code again and i dont have that much time
										elseif ($alloted_reg_from == 1 || $alloted_reg_from == "1") {
											header("Location: mess1.htm");
										}
									}
								}
							}
					}
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
3. logout then login(request accept person), stall at main page, please wait for leader to get a roomate X\/
4. when all has accepted redirect leader to room selection (roomselection.htm) X\/
5. stall accepting person when all invites are accepted by all the persons whom request sending person(leader)
   has sent request to and leader hasnt selected a room
	 else proceed to mess selection X\/
6. add redirection to room selection and update data table(fill the roomates) for leader
	 if leader's invitation is accepted by all X\/

*/


?>
