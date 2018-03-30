<?php
require('sql_connect.php');

$sql=mysqli_query($con,"SELECT * FROM extras");
while($row=mysqli_fetch_array($sql))
{
	$curr_rank=$row['rank'];
}
$curr_rank++;
$sql=mysqli_query($con,"UPDATE extras SET rank='$curr_rank'");

?>