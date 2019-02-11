<?php
require('sql_connect.php');

$reg = strtoupper($_SESSION['user']);

//$reg = strtoupper($_COOKIE['reg']);


$sql = mysqli_query($con, " SELECT * FROM invite WHERE ito = '$reg' ");

if (mysqli_num_rows($sql)<=0) {
  header('Location: main.html');
  exit();
}

elseif (mysqli_num_rows($sql)>0) {

  while($row=mysqli_fetch_array($sql))
  {
  	$to_reg = strtoupper($row['ito']);
  	$from_reg = strtoupper($row['ifrom']);
  	$accept_inv = $row['invite_true'];
    $accept_reject = $row['invite_reject'];

    // if any invitation is accepted
      if ($accept_inv == '1' || $accept_inv == 1)
      {
        // if invite is accepted :
        header('Location: check.php');
        exit();

      }

  }

// code below counts for only last option but becasue of above logic it works

  // if all $accept_inv were 0
  if ($accept_inv == '0' || $accept_inv == 0) {
    // Redirect to accpet.php
    header('Location: accept.php');
    exit();

  }
/// if all invite ere rejected code is more ellaborated in accept.php and is working there just fine
  elseif ($accept_reject == 1 || $accpet_reject == '1') {
    header('Location: check.php');
    exit();
  }

}
?>
