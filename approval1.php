<?php
require('sql_connect.php');
$reg = strtoupper($_COOKIE['reg']);

$accept_inv = mysqli_escape_string($con,$_POST['invi_accept']);
$reg_from = mysqli_escape_string($con,$_POST['reg_from_to']);

$sql = mysqli_query($con, "SELECT * FROM invite WHERE ifrom = '$reg_from' AND ito = '$reg'");

if (mysqli_num_rows($sql)>0) {

  if ($accept_inv == "accept") {

    $sql2 = mysqli_query($con, "UPDATE invite SET invite_true = 1 WHERE ito='$reg' AND ifrom = '$reg_from' ");

    header("Location: accept_check.php");
    exit();
  }

  if ($accept_inv == "reject") {

    $sql2 = mysqli_query($con, "UPDATE invite SET invite_reject = 1 WHERE ito='$reg' AND ifrom = '$reg_from' ");

    header("Location: accept_check.php");
    exit();
  }

}
elseif (mysqli_num_rows($sql)<=0) {
  header("Location: accept_check.php");
}

 ?>
