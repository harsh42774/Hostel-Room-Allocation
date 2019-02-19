<?php
require('sql_connect.php');		// Required to connect to SQL database

$reg=$_COOKIE['reg'];	// Get the Reg. No. of the logged in students

echo "<html><head><script type='text/javascript'>
	window.history.forward();
	function noBack() { window.history.forward(); }
	</script>
	<style>.container{
        border-width: 3px;
        border-spacing: 5px;
        border-style: inset;
        border-color: blue;
        border-radius: 5px;	
		margin:auto; width:300px; height: 150px; background-color: rgb(204,204,255);} 
		body{background-image:url('background.jpg');}
		input[type=submit] {
		border-radius: 5px;
		background-color: rgb(200, 200, 255);
		border-color: blue;
		color: black;
		text-align: center;
		font-size: 15px;
		padding: 10px;
		width: 120px;
		transition: all 0.5s;
		cursor: pointer;
		margin: 5px;
		font:Times New Roman;
		}

		input[type=submit] span {
		cursor: pointer;
		display: inline-block;
		position: relative;
		transition: 0.5s;
		}

		input[type=submit] span:after {
		content: '\00bb';
		position: absolute;
		opacity: 0;
		top: 0;
		right: -20px;
		transition: 0.5s;
		}

		input[type=submit]:hover span {
		padding-right: 25px;
		}

		input[type=submit]:hover span:after {
		opacity: 1;
		right: 0;
		}

	</style>
	<script type='text/javascript'>
	window.history.forward();
	function noBack() { window.history.forward(); }
	</script>
	</head>
	<body onload='noBack();' 
	onpageshow='if (event.persisted) noBack();' onunload='s'>
	<br><br><br><br>
	<div class='container'>
	<center><h3><u>Receipt</u></h3>";

// $sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");	// To get the details to be printed
if($stmt = $con->prepare("SELECT room_no,block,room_fees,mess_fees FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($froom_no, $fblock, $froom_fees, $fmess_fees);
	while($stmt->fetch())
	{
		$room_no=$froom_no;
		$block=$fblock;
		$room_fees=$froom_fees;
		$mess_fees=$fmess_fees;
	}
	$stmt->close();
}

// $sql=mysqli_query($con,"UPDATE rooms SET alloted='1' WHERE room='$room_no' AND block='$block'");	// Update the room no. and block
$alloted=1;
if($stmt = $con->prepare("UPDATE rooms SET alloted=? WHERE room=? AND block=?"))
{
	$stmt->bind_param("iss",$alloted, $room_no, $block);
	$stmt->execute();
	$stmt->close();
}

/* while($row=mysqli_fetch_array($sql))	// To print the fees
{
	$room_no=$row['room_no'];
	$block=$row['block'];
}*/
echo "<table cellspacing='10'><tr><td>Hostel fees(INR):</td><td>".$room_fees."</td></tr><tr><td>Mess fees(INR):</td><td>".$mess_fees."</td></tr></table></center></div></body></html>";

?>
