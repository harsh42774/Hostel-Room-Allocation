<?php

require('sql_connect.php');

$reg='16BCE1003';
$room=3;

$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$reg'");
$sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql))
{
    $r1=$row['r1'];
    $r2=$row['r2'];
    $r3=$row['r3'];
    $r4=$row['r4'];
    $r5=$row['r5'];
}

if(!empty($r1))
{
    $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
}
if(!empty($r2))
{
    $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r2'");
}
if(!empty($r3))
{
    $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r3'");
}
if(!empty($r4))
{
    $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r4'");
}
if(!empty($r5))
{
    $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
}


?>