<?php
// Here is the code for loggin authentication middleware to be used on very page accept login page
// make use of sessions

session_start();
if ($_SESSION['user'] == NULL) {
  header("Location: login.html");
}

?>
