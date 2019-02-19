<?php
require('sql_connect.php');     // Required to connect to the database

$reg=$_COOKIE['reg'];   // Get the Reg. No. of the logged in student
$room_no=$_POST['room_no']; // Get the room no. selected from the HTML form

// $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no' WHERE reg='$reg'");  // Update the room no. to the database
if($stmt = $con->prepare("UPDATE data SET room_no=? WHERE reg=?"))
{
    $stmt->bind_param("ss", $room_no, $reg);
    $stmt->execute();
    $stmt->close();
}
/* $sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");  // Get the roommate's reg. no. from the database

while($row=mysqli_fetch_array($sql))
{
    $block=$row['block'];
    $r1=strtoupper($row['r1']);
    $r2=strtoupper($row['r2']);
    $r3=strtoupper($row['r3']);
    $r4=strtoupper($row['r4']);
    $r5=strtoupper($row['r5']);
} */
if($stmt = $con->prepare("SELECT block,r1,r2,r3,r4,r5 FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($fblock,$fr1,$fr2,$fr3,$fr4,$fr5);
	while($stmt->fetch())
	{
        $block=$fblock;
        $r1 = strtoupper($fr1);
        $r2 = strtoupper($fr2);
        $r3 = strtoupper($fr3);
        $r4 = strtoupper($fr4);
        $r5 = strtoupper($fr5);
	}
	$stmt->close();
}

// Update the room no. to the roommate's rows in the database
if(!empty($r1))
{
    // $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r1'");
    if($stmt = $con->prepare("UPDATE data SET room_no=?,block=? WHERE reg=?"))
    {
        $stmt->bind_param("sss", $room_no, $block, $r1);
        $stmt->execute();
        $stmt->close();
    }
}
if(!empty($r2))
{
    // $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r2'");
    if($stmt = $con->prepare("UPDATE data SET room_no=?,block=? WHERE reg=?"))
    {
        $stmt->bind_param("sss", $room_no, $block, $r2);
        $stmt->execute();
        $stmt->close();
    }
}
if(!empty($r3))
{
    // $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r3'");
    if($stmt = $con->prepare("UPDATE data SET room_no=?,block=? WHERE reg=?"))
    {
        $stmt->bind_param("sss", $room_no, $block, $r3);
        $stmt->execute();
        $stmt->close();
    }
}
if(!empty($r4))
{
    // $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r4'");
    if($stmt = $con->prepare("UPDATE data SET room_no=?,block=? WHERE reg=?"))
    {
        $stmt->bind_param("sss", $room_no, $block, $r4);
        $stmt->execute();
        $stmt->close();
    }
}
if(!empty($r5))
{
    // $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no',block='$block' WHERE reg='$r5'");
    if($stmt = $con->prepare("UPDATE data SET room_no=?,block=? WHERE reg=?"))
    {
        $stmt->bind_param("sss", $room_no, $block, $r5);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: mess.htm");   // Redirect to the mess selection page

?>