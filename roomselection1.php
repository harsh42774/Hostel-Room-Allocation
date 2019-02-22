<?php
require('sql_connect.php'); // Required to connect to the database

$reg=$_COOKIE['reg'];   // Get the Reg. No.  of the logged in student
$type=$_POST['type'];   // Get the room type selected by the student

// Update the desired room type and its room fees to the database and redirect to the appropriate page
if($type=='2ac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='ac',room='2',room_fees='79300' WHERE reg='$reg'");
    $type='ac';
    $room=2;
    $room_fees=79300;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 2bed.htm");
}
else if($type=='2nonac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='2',room_fees='42000' WHERE reg='$reg'");
    $type='non-ac';
    $room=2;
    $room_fees=42000;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 2bed.htm");
}
else if($type=='3ac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='ac',room='3',room_fees='75100' WHERE reg='$reg'");
    $type='ac';
    $room=3;
    $room_fees=75100;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 3bed.htm");
}
else if($type=='3nonac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='3',room_fees='37300' WHERE reg='$reg'");
    $type='non-ac';
    $room=3;
    $room_fees=37300;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 3bed.htm");
}
else if($type=='4ac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='ac',room='4',room_fees='69800' WHERE reg='$reg'");
    $type='ac';
    $room=4;
    $room_fees=69800;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 4bed.htm");
}
else if($type=='4nonac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='4',room_fees='32200' WHERE reg='$reg'");
    $type='non-ac';
    $room=4;
    $room_fees=32200;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 4bed.htm");
}
else if($type=='6ac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='ac',room='6',room_fees='61500' WHERE reg='$reg'");
    $type='ac';
    $room=6;
    $room_fees=61500;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 6bed.htm");
}
else if($type=='6nonac')
{
    // $sql=mysqli_query($con,"UPDATE data SET type='non-ac',room='6',room_fees='28300' WHERE reg='$reg'");
    $type='non-ac';
    $room=6;
    $room_fees=28300;
    if($stmt = $con->prepare("UPDATE data SET type=?,room=?,room_fees=? WHERE reg=?"))
    {
        $stmt->bind_param("ssss", $type, $room, $room_fees, $reg);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: 6bed.htm");
}
else
{
    echo("<script language='JavaScript'>
    window.alert('Please select Room Type')
    window.location.href='roomselection1.htm'
    </script>");
}


?>