<?php

require('sql_connect.php');
require('login_middleware.php');

if ($_SESSION['user'] != NULL) {
  session_unset();
  session_destroy();
  header("Location: login.html");
}

elseif ($_SESSION['user'] == NULL)
{
  header("Location: login.html");
}

elseif ($_COOKIE['reg'] != NULL) {

  setcookie("reg", "", time() - 3600);
  if ($_COOKIE['room'] != NULL) {
    setcookie("room", "", time() - 3600);
  }
  header("Location: login.html");

}

?>
