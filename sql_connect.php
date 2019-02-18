<?php

    $con=mysqli_connect("localhost", "root", "") or die("mysql connection is failure.");    // Required to connect to the localhost
    mysqli_select_db($con,"project") or die("Database does not exists.");   // Required to connect to the database
    
?>