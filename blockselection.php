<?php
require('sql_connect.php');
require('login_middleware.php');

$reg = strtoupper($_SESSION['user']);

//$reg=$_COOKIE['reg'];
$block=$_POST['block'];

if($block=='a')
{
    $sql=mysqli_query($con,"UPDATE data SET block='a' where reg='$reg'");
    header("Location: roomselection1.htm");
}
else if($block=='c')
{
    $sql=mysqli_query($con,"UPDATE data SET block='c' WHERE reg='$reg'");
    header("Location: roomselection1.htm");
}
?>
