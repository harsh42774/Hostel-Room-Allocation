<?php
//require()
$reg_from_invi_await_room = $_COOKIE['reg_from_invi_await_room']
?>


<!DOCTYPE html>
<html>

	<head>
		<style>
			*
			{
				font-family:Times New Roman;
			}
			a:hover
			{
				text-decoration:none;
			}
			h1,h3
			{
				text-align:center;
			}
			.alltext
			{
				background-color: #baefed;
				border-radius:10px;
				border: 1px solid blue;
			}
			body
			{
				background-image:url("background.jpg");
			}
		</style>
	</head>
   <body>
   <div class = "alltext">
   		<h1><font color="#000099">Welcome to Room allotment</font></h1>
   		<h3>Please wait for room selection completion by <?php echo "$reg_from_invi_await_room"; ?>.</h3>
      <h3>Reload when room is selected by <?php echo "$reg_from_invi_await_room"; ?>.</h3>

   </div>
   </body>

</html>
