<?php
require('sql_connect.php');

$reg=strtoupper($_COOKIE['reg']);

echo('<html>
<head>
<title>Roommates Selection</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
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
  content: "\00bb";
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
<form id="f1" name="form1" action="r2.php" method="post">
<table align="center" class="sample1">
<col width="300">
<tr><td></td></tr>
<tr><th><font size="4">Select registration number of the roommate :</font></th></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr align="center"><td>
<select name="s1" class="selectpicker" data-live-search="true">');
$sql=mysqli_query($con,"SELECT reg FROM login WHERE alloted=0");
while($row=mysqli_fetch_array($sql))
{
    $s1=$row['reg'];
    echo("<option value='$s1'>$s1</option>");
}
echo('
</select>
</td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
</table>

<p align="center"><button class="button"><span>SUBMIT </span></button>


</body>
</html>
');

?>