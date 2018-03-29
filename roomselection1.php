<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$type=$_POST['type'];

if($type=='2ac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='ac',room='2',room_fees='79300' WHERE reg='$reg'");
    header("Location: 2bed.htm");
}
else if($type=='2nonac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='2',room_fees='42000' WHERE reg='$reg'");
    header("Location: 2bed.htm");
}
else if($type=='3ac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='ac',room='3',room_fees='75100' WHERE reg='$reg'");
    header("Location: 3bed.htm");
}
else if($type=='3nonac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='3',room_fees='37300' WHERE reg='$reg'");
    header("Location: 3bed.htm");
}
else if($type=='4ac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='ac',room='4',room_fees='69800' WHERE reg='$reg'");
    header("Location: 4bed.htm");
}
else if($type=='4nonac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='4',room_fees='32200' WHERE reg='$reg'");
    header("Location: 4bed.htm");
}
else if($type=='6ac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='ac',room='6',room_fees='61500' WHERE reg='$reg'");
    header("Location: 6bed.htm");
}
else if($type=='6nonac')
{
    $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='6',room_fees='28300' WHERE reg='$reg'");
    header("Location: 6bed.htm");
}


?>