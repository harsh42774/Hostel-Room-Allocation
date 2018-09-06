<?php
require('sql_connect.php');
$reg=strtoupper($_COOKIE['reg']);
$sql1=mysqli_query($con,"SELECT * FROM login WHERE reg='$reg'");
$sql=mysqli_query($con,"SELECT * FROM data WHERE reg='$reg'");

while($row1=mysqli_fetch_array($sql1))
{
	if($row1['alloted']==0)
	{
		header('Location: blockselection.htm');
		exit();
	}
	else
	{
		while($row=mysqli_fetch_array($sql))
		{
			if(empty($row['mess']))
			{
				$r1=strtoupper($row['r1']);
				$r2=strtoupper($row['r2']);
				$r3=strtoupper($row['r3']);
				$r4=strtoupper($row['r4']);
				$r5=strtoupper($row['r5']);
				if(!empty($row['r5']))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2, $r3, $r4, $r5 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}	
				else if(!empty($row['r3']))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2, $r3 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!empty($row['r2']))
				{
					echo("<script>alert('You have already been registered for room with $r1, $r2 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
				else if(!empty($row['r1']))
				{
					echo("<script>alert('You have already been registered for room with $r1 but your mess selection is pending ');
						location.href='mess1.htm';
						</script>");
					exit();
				}
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