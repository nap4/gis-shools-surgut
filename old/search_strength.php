<?php

require("config.php");

$strength_start =  $_POST['strength_start'];
$strength_end = $_POST['strength_end'];

$query = "SELECT * FROM schools WHERE strength >= '".$strength_start."' AND strength <= '".$strength_end."'";

 
$result = mysql_query($query);
 
 
if (!$result) {
  die("Invalid query: " . mysql_error());
}

echo "<html> <head> </head> <body>" ;
echo "<table width='100%'>";
echo "<tr><th>";
echo "Имя школы:";
echo "</th>";
echo "<th>";
echo "Численность:";
echo "</th></tr>";

while ($row = mysql_fetch_array($result)){

echo "<tr><td>";

echo $row['name'];
echo "&nbsp";
echo $row['id'];
echo "</td> <td>";

echo $row['strength'];
echo "</td></tr>"; 


}
 
echo "</table>";
echo "</body> </html>";



?>