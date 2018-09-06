<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$room_no=$_POST['room_no'];

$sql=mysqli_query($con,"UPDATE data SET room_no='$room_no' WHERE reg='$reg'");
$sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql))
{
    $block=$row['block'];
    $r1=strtoupper($row['r1']);
    $r2=strtoupper($row['r2']);
    $r3=strtoupper($row['r3']);
    $r4=strtoupper($row['r4']);
    $r5=strtoupper($row['r5']);
}

if(!empty($r1))
{
    $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r1'");
}
if(!empty($r2))
{
    $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r2'");
}
if(!empty($r3))
{
    $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r3'");
}
if(!empty($r4))
{
    $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r4'");
}
if(!empty($r5))
{
    $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r5'");
}

header("Location: mess.htm");

?>