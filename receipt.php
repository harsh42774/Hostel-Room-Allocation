<?php
require('sql_connect.php');

//$reg=$_COOKIE['reg'];
$reg = strtoupper($_SESSION['user']);

$sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");

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

while($row=mysqli_fetch_array($sql))
{
	$room_no=$row['room_no'];
	$block=$row['block'];
	echo "<table cellspacing='10'><tr><td>Hostel fees(INR):</td><td>".$row['room_fees']."</td></tr><tr><td>Mess fees(INR):</td><td>".$row['mess_fees']."</td></tr></table></center></div></body></html>";
}

$sql=mysqli_query($con,"UPDATE rooms SET alloted='1' WHERE room='$room_no' AND block='$block'");

?>
