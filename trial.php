<?php

require('sql_connect.php');
$reg="16BCE1008";
$pass="student8";
$flag=0;
$start_time=NULL;
if($stmt = $con->prepare("SELECT start,end FROM login WHERE reg=? and pass=?"))
{
    $stmt->bind_param("ss",$reg,$pass);
    $stmt->execute();
    $stmt->bind_result($fstart,$fend);
    while($stmt->fetch())
    {
        $start_time = $fstart;
        $flag=1;
        $end_time = $fend;
    }
    $stmt->close();
}
    
echo($flag);

?>