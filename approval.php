<html>
    <head>
        <title>Block Selection</title>
    </head>
    <style type="text/css">
    	body
    	{	
    		background-image:url("background.jpg");
    	}
    	table
    	{
    		border:2px solid blue;
    		border-collapse:collapse;
    	}
      
    
        table.sample1 th {
            border-width: 2px;
            padding: 3px;
            border-style: inset;
            border-color: blue;
            background-color: rgb(204, 204, 255);
        }
    
        table.sample1 td {
            text-align: center;
            border-width: 2px;
            padding: 3px;
            border-style: inset;
            border-color: blue;
            background-color: rgb(204, 204, 255);
        }
    
        input[type=submit] 
        {
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

		input[type=submit] span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		input[type=submit] span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		}

		input[type=submit]:hover span {
		  padding-right: 25px;
		}

		input[type=submit]:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		
    </style>

    <body>
        <p align="center">
            <font size="6" face="Times New Roman">
                <u>
                    <b>Roommate Approval</b>
                </u>
            </font>
        </p>
        <br>
        <br>
        <div class = "centered">
        <form name="f1" method="post" action="approval1.php">
            <table align="center" class="sample1">
                <col width="200">
                <tr><th colspan="3"> 
						<?php 
							require('sql_connect.php');
							$reg=$_COOKIE['reg'];
							$sql=mysqli_query($con, "SELECT r1 FROM data WHERE reg='$reg'");
							while($row=mysqli_fetch_array($sql))
							{
								$lead=$row['r1'];
							}
							echo $lead;
						?> has chosen you as his roommate.
                </th></tr>
                <tr>
                    <td><input type="radio" name="choice" value="a">Agree</td>
                </tr>
                <tr>
                    <td><input type="radio" name="choice" value="d">Disagree</td>
                </tr>
            </table>
            <section class="flat">
                <p align="center">
                    <input type="submit" name="submit" value="Submit">
                </p>
            </section>
        </form>
        </div>
    </body>
</html>
