<?php
    require('sql_connect.php');
    date_default_timezone_set("Asia/Kolkata");
    $reg='16BCE1001';
    $sql=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg'");
    while($row=mysqli_fetch_array($sql))
	{
		$start_time = $row['start'];
		$end_time = $row['end'];
		$start=$row['start'];
		$end = $row['end'];
    }
    $date = date('Y-m-d H:i:s');
    echo "$start_time $date ";
    $start_time = strtotime($start_time);
    $date = strtotime($date);
    echo "$start_time $date";
?>
