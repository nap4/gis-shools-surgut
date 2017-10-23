<?php

require("config.php");
$time_start = $_POST['time_start'];
$time_end = $_POST['time_end'];


$query = "SELECT * FROM schools WHERE time_start >= '".$time_start."' AND time_end <= '".$time_end."'";

 
$result = mysql_query($query);
 
 
if (!$result) {
  die("Invalid query: " . mysql_error());
}

echo "<html> <head> </head> <body>";
echo "<table width='100%'>";
echo "<tr>";
echo "<th>";
echo "Имя школы:";
echo "</th> <th>";
echo "Время начала работы:";
echo "</th><th>";
echo "Время окончания работы:";
echo "</th>";
echo "</tr>";

while ($row = mysql_fetch_array($result)){

echo "<tr><td>";


echo $row['name'];
echo "&nbsp";
echo $row['id'];
echo "</td> <td>";


echo $row['time_start'];
echo "<td>";


echo "</td><td>";

echo $row['time_end'];
echo "</td></tr>"; 


}
 
echo "</table>";
echo "</body> </html>";





?>
