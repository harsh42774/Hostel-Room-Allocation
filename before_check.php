<?php

require("sql_connect.php");
$reg=strtoupper($_COOKIE['reg']);

$sql1=mysqli_query($con,"SELECT alloted FROM login WHERE reg='$reg'");
while($row=mysqli_fetch_array($sql1))
{
  $alloted=$row['alloted'];
}

if ($alloted == 1) {
  header("Location: check.php");
}

elseif ($alloted == 0) {
    $sql2 = mysqli_query($con, "SELECT * FROM data WHERE reg = '$reg'");

    if (mysqli_num_rows($sql2)>0) {
      $row = mysqli_fetch_array($sql2);

      $r1 = $row['r1'];
      $r2 = $row['r2'];
      $r3 = $row['r3'];
      $r4 = $row['r4'];
      $r5 = $row['r5'];
      $room = $row['room_no'];

      $sql3 = mysqli_query($con, "UPDATE data SET block = NULL, room = 0, type = NULL, room_no = NULL
        ,r1 = NULL,r2 = NULL,r3 = NULL,r4 = NULL,r5 = NULL, mess = NULL, room_fees = 0, mess_fees = 0
        WHERE reg = '$reg'");

      if ($room != NULL) {
        $sql4 = mysqli_query($con, "UPDATE rooms SET alloted = 0 WHERE room = $room");
      }
      if ($r1  != NULL) {
        $sql5 = mysqli_query($con, "UPDATE data SET block = NULL, room = 0, type = NULL, room_no = NULL
          ,r1 = NULL,r2 = NULL,r3 = NULL,r4 = NULL,r5 = NULL, mess = NULL, room_fees = 0, mess_fees = 0
          WHERE reg = '$r1'");
      }
      if ($r2  != NULL) {
        $sql6 = mysqli_query($con, "UPDATE data SET block = NULL, room = 0, type = NULL, room_no = NULL
          ,r1 = NULL,r2 = NULL,r3 = NULL,r4 = NULL,r5 = NULL, mess = NULL, room_fees = 0, mess_fees = 0
          WHERE reg = '$r2'");
      }
      if ($r3  != NULL) {
        $sql7 = mysqli_query($con, "UPDATE data SET block = NULL, room = 0, type = NULL, room_no = NULL
          ,r1 = NULL,r2 = NULL,r3 = NULL,r4 = NULL,r5 = NULL, mess = NULL, room_fees = 0, mess_fees = 0
          WHERE reg = '$r3'");
      }
      if ($r4  != NULL) {
        $sql8 = mysqli_query($con, "UPDATE data SET block = NULL, room = 0, type = NULL, room_no = NULL
          ,r1 = NULL,r2 = NULL,r3 = NULL,r4 = NULL,r5 = NULL, mess = NULL, room_fees = 0, mess_fees = 0
          WHERE reg = '$r4'");
      }
      if ($r5  != NULL) {
        $sql9 = mysqli_query($con, "UPDATE data SET block = NULL, room = 0, type = NULL, room_no = NULL
          ,r1 = NULL,r2 = NULL,r3 = NULL,r4 = NULL,r5 = NULL, mess = NULL, room_fees = 0, mess_fees = 0
          WHERE reg = '$r5'");
      }

      header("Location: check.php");
    }
}


?>
