<?php
require('sql_connect.php');     // Required to connect to the SQL database

$reg=$_COOKIE['reg'];   // To get the Reg. No. of the logged in student
// $sql=mysqli_query($con,"SELECT room,type FROM data WHERE reg='$reg'");  // Get the room type from the database
if($stmt = $con->prepare("SELECT room,type FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($froom, $ftype);
	while($stmt->fetch())
	{
		$bed=$froom;
		$type=$ftype;
	}
	$stmt->close();
}

/* while($row=mysqli_fetch_array($sql))
{
    $bed=$row['room'];
    $type=$row['type'];
} */

echo "<html>
    <head>
        <style>.container{
        border-width: 3px;
        border-spacing: 5px;
        border-style: inset;
        border-color: blue;
        border-collapse: collapse;
        border-radius: 5px;
        margin:auto; width:300px; height: 100px; background-color: rgb(204,204,255);} body{background-image:url('background.jpg');}
        input[type=submit] {
        border-radius: 5px;
        background-color: rgb(200, 200, 255);
        border-color: blue;
        color: black;
        text-align: center;
        font-size: 15px;
        padding: 10px;
        width: 120px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
        font:Times New Roman;
        }

        input[type=submit] span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        }

        input[type=submit] span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
        }

        input[type=submit]:hover span {
        padding-right: 25px;
        }

        input[type=submit]:hover span:after {
        opacity: 1;
        right: 0;
        }
        
        input[type=select]{
            border-radius: 10px;
        }

        </style>
        <title>Room Selection</title>
    </head>
    <body>
    <br><br><br><br>
    <form method='post' action='room1.php'>
        <div class = 'container'>
            <center>
                <h3>Select Room Number</h3>
                <select name='room_no'>";

/* $sql=mysqli_query($con,"SELECT block from data WHERE reg='$reg'");  // Get the block selected from the database
while($row=mysqli_fetch_array($sql))
{
    $block=$row['block'];
} */
if($stmt = $con->prepare("SELECT block FROM data WHERE reg=?"))
{
	$stmt->bind_param("s",$reg);
	$stmt->execute();
	$stmt->bind_result($fblock);
	while($stmt->fetch())
	{
		$block = $fblock;
	}
	$stmt->close();
}

/* $sql=mysqli_query($con,"SELECT room FROM rooms WHERE alloted='0' AND bed='$bed' AND type='$type' AND block='$block'"); // Get the desired room which are not alloted from the database and display them
while($row=mysqli_fetch_array($sql))
{
    $room_no=$row['room'];
} */
$alloted=0;
if($stmt = $con->prepare("SELECT room FROM rooms WHERE alloted=? AND bed=? AND type=? AND block=?"))
{
	$stmt->bind_param("isss",$alloted, $bed, $type, $block);
	$stmt->execute();
	$stmt->bind_result($froom);
	while($stmt->fetch())
	{
        $room_no = strtoupper($froom);
        echo "<option value='$room_no'>$room_no</option>";
	}
	$stmt->close();
}
echo "</select>
    </center></div><br><center><input type='submit' name='submit' value='Submit'></center></form></body></html>";

?>