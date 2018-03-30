<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql))
{
    $bed=$row['room'];
    $type=$row['type'];
}

echo "<html><head><title>Room Selection</title></head><body><p align='center'><h3>Select Room Number</h3><form method='post' action='room1.php'><select name='room_no'>";

$sql=mysqli_query($con,"SELECT * FROM rooms WHERE alloted='0' AND bed='$bed' AND type='$type'");
while($row=mysqli_fetch_array($sql))
{
    $room_no=$row['room'];
    echo "<option value='$room_no'>$room_no</option>";
}

echo "</select><br>
    <input type='submit' name='submit' value='Submit'></form></p></body></html>";

?>