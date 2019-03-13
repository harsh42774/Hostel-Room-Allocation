<?php

require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);
$room_no=$_COOKIE['room_no'];

// $sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");				// Get the values from the data table to set it to the roommate's rows
if($stmt = $con->prepare("SELECT block,room,type,r1,r2,r3,r4,r5,room_fees FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($fblock,$froom,$ftype,$fr1,$fr2,$fr3,$fr4,$fr5,$froom_fees);
	while($stmt->fetch())
	{
        $block=$fblock;
        $room=$froom;
        $type=$ftype;
		$r1 = strtoupper($fr1);
		$r2 = strtoupper($fr2);
		$r3 = strtoupper($fr3);
		$r4 = strtoupper($fr4);
        $r5 = strtoupper($fr5);
        $room_fees=$froom_fees;
	}
	$stmt->close();
}

// Set the roommates alloted values to 1 and updating the room no., room type, room fees of all the roommates chosen
if(!empty($r1))
{
    $falloted=0;
    $ralloted=0;
    if($stmt = $con->prepare("SELECT alloted FROM login WHERE reg=?"))
    {
        $stmt->bind_param("s",$r1);
        $stmt->execute();
        $stmt->bind_result($falloted);
        while($stmt->fetch())
        {
            $ralloted=$falloted;
        }
        $stmt->close();
    }

    if($ralloted == 0 || $ralloted==NULL || $ralloted=='')
    {
        //$sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
        if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
        {
            $stmt->bind_param("ss", $alloted, $r1);
            $stmt->execute();
            $stmt->close();
        }
        // $sql=mysqli_query($con,"UPDATE data SET r1='$reg',r2='$r2',r3='$r3',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r1'");
        if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
        {
            $stmt->bind_param("sssssssss", $reg, $r2, $r3, $r4, $r5, $room, $type, $room_fees, $r1);
            $stmt->execute();
            $stmt->close();
        }
    }
    else
    {
        echo("<script>alert('$r1 is already alloted. Contact the student.');
	    location.href='main.html';
	    </script>");
        exit();
    }
}

if(!empty($r2))
{
    $falloted=0;
    $ralloted=0;
    if($stmt = $con->prepare("SELECT alloted FROM login WHERE reg=?"))
    {
        $stmt->bind_param("s",$r2);
        $stmt->execute();
        $stmt->bind_result($falloted);
        while($stmt->fetch())
        {
            $ralloted=$falloted;
        }
        $stmt->close();
    }

    if($ralloted == 0 || $ralloted==NULL || $ralloted=='')
    {
        // $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r2'");
        if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
        {
            $stmt->bind_param("ss", $alloted, $r2);
            $stmt->execute();
            $stmt->close();
        }
        // $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$reg',r3='$r3',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r2'");
        if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
        {
            $stmt->bind_param("sssssssss", $r1, $reg, $r3, $r4, $r5, $room, $type, $room_fees, $r2);
            $stmt->execute();
            $stmt->close();
        }
    }
    else
    {
        echo("<script>alert('$r2 is already alloted. Contact the student.');
	    location.href='main.html';
	    </script>");
        exit();
    }
}

if(!empty($r3))
{
    $falloted=0;
    $ralloted=0;
    if($stmt = $con->prepare("SELECT alloted FROM login WHERE reg=?"))
    {
        $stmt->bind_param("s",$r3);
        $stmt->execute();
        $stmt->bind_result($falloted);
        while($stmt->fetch())
        {
            $ralloted=$falloted;
        }
        $stmt->close();
    }

    if($ralloted == 0 || $ralloted==NULL || $ralloted=='')
    {
        // $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r3'");
        if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
        {
            $stmt->bind_param("ss", $alloted, $r3);
            $stmt->execute();
            $stmt->close();
        }
        // $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$reg',r4='$r4',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r3'");
        if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
        {
            $stmt->bind_param("sssssssss", $r1, $r2, $reg, $r4, $r5, $room, $type, $room_fees, $r3);
            $stmt->execute();
            $stmt->close();
        }
    }
    else
    {
        echo("<script>alert('$r3 is already alloted. Contact the student.');
	    location.href='main.html';
	    </script>");
        exit();
    }
}

if(!empty($r4))
{
    $falloted=0;
    $ralloted=0;
    if($stmt = $con->prepare("SELECT alloted FROM login WHERE reg=?"))
    {
        $stmt->bind_param("s",$r4);
        $stmt->execute();
        $stmt->bind_result($falloted);
        while($stmt->fetch())
        {
            $ralloted=$falloted;
        }
        $stmt->close();
    }

    if($ralloted == 0 || $ralloted==NULL || $ralloted=='')
    {
        // $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r4'");
        if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
        {
            $stmt->bind_param("ss", $alloted, $r4);
            $stmt->execute();
            $stmt->close();
        }
        // $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$r3',r4='$reg',r5='$r5',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r4'");
        if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
        {
            $stmt->bind_param("sssssssss", $r1, $r2, $r3, $reg, $r5, $room, $type, $room_fees, $r4);
            $stmt->execute();
            $stmt->close();
        }
    }
    else
    {
        echo("<script>alert('$r4 is already alloted. Contact the student.');
	    location.href='main.html';
	    </script>");
        exit();
    }
}

if(!empty($r5))
{
    $falloted=0;
    $ralloted=0;
    if($stmt = $con->prepare("SELECT alloted FROM login WHERE reg=?"))
    {
        $stmt->bind_param("s",$r5);
        $stmt->execute();
        $stmt->bind_result($falloted);
        while($stmt->fetch())
        {
            $ralloted=$falloted;
        }
        $stmt->close();
    }

    if($ralloted == 0 || $ralloted==NULL || $ralloted=='')
    {
        // $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$r1'");
        if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
        {
            $stmt->bind_param("ss", $alloted, $r5);
            $stmt->execute();
            $stmt->close();
        }
        // $sql=mysqli_query($con,"UPDATE data SET r1='$r1',r2='$r2',r3='$r3',r4='$r4',r5='$reg',room='$room',type='$type',room_fees='$room_fees' WHERE reg='$r5'");
        if($stmt = $con->prepare("UPDATE data SET r1=?,r2=?,r3=?,r4=?,r5=?,room=?,type=?,room_fees=? WHERE reg=?"))
        {
            $stmt->bind_param("sssssssss", $r1, $r2, $r3, $r4, $reg, $room, $type, $room_fees, $r5);
            $stmt->execute();
            $stmt->close();
        }
    }
    else
    {
        echo("<script>alert('$r5 is already alloted. Contact the student.');
	    location.href='main.html';
	    </script>");
        exit();
    }
}

$falloted=0;
$ralloted=0;
if($stmt = $con->prepare("SELECT block,room_fees FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($fblock, $froom_fees);
	while($stmt->fetch())
	{
		$block=$fblock;
	}
	$stmt->close();
}
if($stmt = $con->prepare("SELECT alloted FROM rooms WHERE room=? AND block=?"))
{
    $stmt->bind_param("ss",$room_no,$block);
    $stmt->execute();
    $stmt->bind_result($falloted);
    while($stmt->fetch())
    {
        $ralloted=$falloted;
    }
    $stmt->close();
}

if($ralloted==0 || $ralloted==NULL || $ralloted=='')
{
    // $sql=mysqli_query($con,"UPDATE rooms SET alloted='1' WHERE room='$room_no' AND block='$block'");	// Update the room no. and block
    $alloted=1;
    if($stmt = $con->prepare("UPDATE rooms SET alloted=? WHERE room=? AND block=?"))
    {
        $stmt->bind_param("iss",$alloted, $room_no, $block);
        $stmt->execute();
        $stmt->close();
    }
    // $sql=mysqli_query($con,"UPDATE data SET room_no='$room_no' WHERE reg='$reg'");  // Update the room no. to the database
    if($stmt = $con->prepare("UPDATE data SET room_no=? WHERE reg=?"))
    {
        $stmt->bind_param("ss", $room_no, $reg);
        $stmt->execute();
        $stmt->close();
    }

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
}
else
{
    echo("<script>alert('$room_no is already taken. Select another room.');
    location.href='main.html';
    </script>");
    exit();
}

// $sql=mysqli_query($con,"UPDATE login SET alloted='1' WHERE reg='$reg'");	// Update the login table value and set alloted to 1
$alloted=1;
if($stmt = $con->prepare("UPDATE login SET alloted=? WHERE reg=?"))
{
	$stmt->bind_param("ss", $alloted, $reg);
	$stmt->execute();
	$stmt->close();
}

header('Location: receipt.php');

?>