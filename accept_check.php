<?php
require('sql_connect.php');

$reg = strtoupper($_COOKIE['reg']);


$sql = mysqli_query($con, " SELECT * FROM invite WHERE ito = '$reg' ");

if (mysqli_num_rows($sql)<=0) {
  header('Location: check.php');
  exit();
}

elseif (mysqli_num_rows($sql)>0) {

  while($row=mysqli_fetch_array($sql))
  {
  	$to_reg = strtoupper($row['ito']);
  	$from_reg = strtoupper($row['ifrom']);
  	$accept_inv = $row['invite_true'];
    $accept_reject = $row['invite_reject'];
  }

  if ($accept_inv == '1' || $accept_inv == 1)
  {
    // if invite is accepted :
    header('Location: check.php');
    exit();

  }

  elseif ($accept_reject == 1 || $accpet_reject == '1') {
    header('Location: check.php');
    exit();
  }

  elseif ($accept_inv == '0' || $accept_inv == 0) {
    // Redirect to accpet.php
    header('Location: accept.php');
    exit();

  }

}
 ?>
