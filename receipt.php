<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");

echo "<html><head><script type='text/javascript'>
	window.history.forward();
	function noBack() { window.history.forward(); }
	</script></head>
	<body onload='noBack();' 
	onpageshow='if (event.persisted) noBack();' onunload='s'>
	<h1>Receipt</h1>";

while($row=mysqli_fetch_array($sql))
{
	echo "<table><tr><td>Hostel Fees</td><td>".$row['room_fees']."</td></tr><tr><td>Mess Fees</td><td>".$row['mess_fees']."</td></tr></table></body></html>";
}

$sql=mysqli_query($con,"SELECT * FROM extras");
while($row=mysqli_fetch_array($sql))
{
	$curr_rank=$row['rank'];
}
$curr_rank++;
$sql=mysqli_query($con,"UPDATE extras SET rank='$curr_rank'");

?>