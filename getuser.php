
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require('sql_connect.php');
$q = intval($_GET['q']);

$sql="SELECT * FROM login WHERE reg = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th></th>
<th>Roommate</th>
<th>Rank</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['reg'] . "</td>";
    echo "<td>" . $row['rank'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 