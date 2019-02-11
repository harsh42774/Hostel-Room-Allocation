<?php
require('sql_connect.php');
require('login_middleware.php');
 ?>

<html>
<head>
<title>Roomate request accept</title>
<style>
body
{
	background-image:url("background.jpg");
}
table.sample1 {
	border-width: 3px;
	border-spacing: 5px;
	border-style: inset;
	border-color: blue;
  border-radius: 5px;
	background-color: rgb(204, 204, 255);
}
table.sample1 th {
	border-width: 0px;
	padding: 3px;
	border-style: none;
	border-color: blue;
	background-color: rgb(204, 204, 255);
	-moz-border-radius: ;
}
table.sample1 td {
	border-width: 0px;
	padding: 3px;
	border-style: none;
	border-color: blue;
	background-color: rgb(204, 204, 255);
	-moz-border-radius: ;
}
section.flat button {
  color: #051b73;
  background-color: #b3c2fc;
  text-shadow: 0px 0px #417cb8;
  border: outset;
}

.button {
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

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
<<?php
//$reg = strtoupper($_COOKIE['reg']);

$reg = strtoupper($_SESSION['user']);

$sql = mysqli_query($con, "SELECT * FROM invite WHERE ito = '$reg'");

?>

</style>
<SCRIPT type="text/javascript">
	window.history.forward();
	function noBack() { window.history.forward(); }
</SCRIPT>
</head>
<body onload="noBack();"
  onpageshow="if (event.persisted) noBack();" onunload="">
<br>
<br>
<br>
<br>

<?php
$flag1 = 0;
$flag2 = 0;
while($row = mysqli_fetch_array($sql))
{
	$flag1 = $flag1 + 1;
	$to_reg = strtoupper($row['ito']);
	$from_reg = strtoupper($row['ifrom']);
	$accept_inv = $row['invite_true'];
  $accept_reject = $row['invite_reject'];

	// if any of the invite accepted we redirect to check.php

	if ($accept_inv == 1) {

		header("Location: check.php");
		exit();

	}

	// else we dynamically display all request
// only if the reuest is not accepted or rejected and awaits response from user
	elseif ($accept_inv == 0 && $accept_reject == 0) {

		echo ("<div class = 'centered'>
		<form id='f1' name='f1' method='post' action='approval1.php'>
				<table align='center' class='sample1'>
						<col width='200'>
						<tr><th colspan='3'>
								<font>Do you approve to be the roomate with $from_reg
						</th></tr>
						<tr>
								<td><input type='radio' name='invi_accept' value = 'accept' >Accept</td>
						</tr>
						<tr>
								<td><input type='radio' name='invi_accept' value='reject'>Reject</td>
						</tr>
						<tr>
						<!-- giving registration number with which user as accepted to be roomate as hidden filed-->
								<td><input type='hidden' name='reg_from_to' value='$from_reg'></td>
						</tr>
				</table>
				<section class='flat'>
						<p align='center'>
								<input type='submit' name='submit' value='Submit' class='button'>
						</p>
				</section>
		</form>
		</div>");

	}
	// if the request has been merked as rejected
	elseif ($accept_reject == 1) {
		$flag2 = $flag2 + 1;
	}

}
// if all requests marked as rejected we redirect to block selection welcome page
if ($flag1 == $flag2) {
	header("Location: main.html");
	exit();
}

?>

</body>
</html>
