<?php
require('sql_connect.php');
$reg=$_COOKIE['reg'];
$sql1=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg'");
$sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row1=mysqli_fetch_array($sql1))
{
	if($row1['alloted']==0)
	{
		header('Location: roomselection.htm');
		exit();
	}
	else
	{
		while($row=mysqli_fetch_array($sql))
		{
			if(empty($row['mess']))
			{
				echo("<script>alert('You have already been registered for room but not mess');
					location.href='mess1.htm';
					</script>");
				exit();
			}
			else
			{
				echo("<script language='JavaScript'>
					window.alert('You have already registered for room and mess')
					window.location.href='main.html'
					</script>");
				exit();
			}
		}			
	}
}

?>