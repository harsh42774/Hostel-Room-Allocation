<?php
require('sql_connect.php');
$reg=$_COOKIE['reg'];

$sql=mysqli_query($con,"SELECT ito from invite WHERE ifrom='$reg'");
while($row=mysqli_fetch_array($sql))
{
    $r1=$row['ito'];
}

print $r1;
?>