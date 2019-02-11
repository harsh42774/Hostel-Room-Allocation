<?php
require('sql_connect.php');
require('login_middleware.php');
$reg = strtoupper($_SESSION['user']);
//$reg = strtoupper($_COOKIE['reg']);

$accept_inv = mysqli_escape_string($con,$_POST['invi_accept']);
$reg_from = mysqli_escape_string($con,$_POST['reg_from_to']);


// get the details from the server
$sql = mysqli_query($con, "SELECT * FROM invite WHERE ifrom = '$reg_from' AND ito = '$reg'");

if (mysqli_num_rows($sql)>0) {

  if ($accept_inv == "accept") {

    // if user pressed accept we update as user has accepted invite
    $sql2 = mysqli_query($con, "UPDATE invite SET invite_true = 1 WHERE ito='$reg' AND ifrom = '$reg_from' ");
    // reject all the later requests as one perosn can accept only one request

    $sql3 = mysqli_query($con, "UPDATE invite SET invite_reject = 1 WHERE ito='$reg' AND invite_true = 0");

    header("Location: accept_check.php");
    exit();
  }

  if ($accept_inv == "reject") {
    // if pressed reject we makr that request as rejected
    $sql2 = mysqli_query($con, "UPDATE invite SET invite_reject = 1 WHERE ito='$reg' AND ifrom = '$reg_from' ");

    header("Location: accept_check.php");
    exit();
  }

}
// if 0 requests were found we redirect to accept_check (many more requests could come in between redirecting from this
// page so we need to check again if there are any more new requests)

elseif (mysqli_num_rows($sql)<=0) {
  header("Location: accept_check.php");
}

 ?>
