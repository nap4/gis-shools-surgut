<?php
require("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Открываем соединение с MySQL-сервером
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
die('Нет соединения : ' . mysql_error());
}

// Устанавливаем соединение с БД
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
die ('Невозможно использовать БД : ' . mysql_error());
}

// Выборка всех записей из таблицы markers
$query = "SELECT * FROM schools WHERE 1";
$result = mysql_query($query);
if (!$result) {
die('Неверный запрос: ' . mysql_error());
}

header("Content-type: text/xml");

// Создание XML-кода, вывод родительского элемента
echo '<markers>';

// Цикл прохода по всем выбранным записи; создание узла для каждой
while ($row = @mysql_fetch_assoc($result)){
// Вывод нового узла XML
echo '<marker ';
echo 'name="' . parseToXML($row['name']) . '" ';
echo 'address="' . parseToXML($row['address']) . '" ';
echo 'lat="' . $row['lat'] . '" ';
echo 'lng="' . $row['lng'] . '" ';
echo 'type="' . $row['type'] . '" ';
echo '/>';
}

// Конец XML-файла
echo '</markers>';

?>