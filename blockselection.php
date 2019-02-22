<?php
require('sql_connect.php');

$reg=$_COOKIE['reg'];
$block=$_POST['block'];

// update the block to the database based on the radio value selected and re-direct to room selection page
if($block=='a')
{
    if($stmt = $con->prepare("UPDATE data SET block=? where reg=?"))       // This statement instead of directly updating the value it passes the value as a string parameter to avoid SQL injection
    {
        $stmt->bind_param("ss", $block, $reg);  // Bind the variables to the parameter as strings
        $stmt->execute();   // Execute the statement
        $stmt->close();     // Close the prepared statement
        header("Location: roomselection1.htm");     // Redirect to room type selection page
    }
}
else if($block=='c')
{
    if($stmt = $con->prepare("UPDATE data SET block=? WHERE reg=?"))        // This statement instead of directly updating the value it passes the value as a string parameter to avoid SQL injection
    {
        $stmt->bind_param("ss", $block, $reg);  // Bind the variables to the parameter as strings
        $stmt->execute();   // Execute the statement
        $stmt->close();     // Close the prepared statement
        header("Location: roomselection1.htm");     // Redirect to room type selection page
    }
}
else
{
    echo("<script language='JavaScript'>
    window.alert('Please select hostel block')
    window.location.href='blockselection.htm'
    </script>");
}
?>