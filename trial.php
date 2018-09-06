<?php
require('sql_connect.php');
$reg=$_COOKIE['reg'];

$sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");
while($row=mysqli_fetch_array($sql))
{
    $block=$row['block'];
}

print $block;
?>