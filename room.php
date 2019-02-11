<?php
require('sql_connect.php');

//$reg=$_COOKIE['reg'];
$reg = strtoupper($_SESSION['user']);

$sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row=mysqli_fetch_array($sql))
{
    $bed=$row['room'];
    $type=$row['type'];
}

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

$sql=mysqli_query($con,"SELECT * from data WHERE reg='$reg'");
while($row=mysqli_fetch_array($sql))
{
    $block=$row['block'];
}

$sql=mysqli_query($con,"SELECT * FROM rooms WHERE alloted='0' AND bed='$bed' AND type='$type' AND block='$block'");
while($row=mysqli_fetch_array($sql))
{
    $room_no=$row['room'];
    echo "<option value='$room_no'>$room_no</option>";
}

echo "</select>
    </center></div><br><center><input type='submit' name='submit' value='Submit'></center></form></body></html>";

?>
