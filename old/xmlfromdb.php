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

// ��������� ���������� � MySQL-��������
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
die('��� ���������� : ' . mysql_error());
}

// ������������� ���������� � ��
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
die ('���������� ������������ �� : ' . mysql_error());
}

// ������� ���� ������� �� ������� markers
$query = "SELECT * FROM schools WHERE 1";
$result = mysql_query($query);
if (!$result) {
die('�������� ������: ' . mysql_error());
}

header("Content-type: text/xml");

// �������� XML-����, ����� ������������� ��������
echo '<markers>';

// ���� ������� �� ���� ��������� ������; �������� ���� ��� ������
while ($row = @mysql_fetch_assoc($result)){
// ����� ������ ���� XML
echo '<marker ';
echo 'name="' . parseToXML($row['name']) . '" ';
echo 'address="' . parseToXML($row['address']) . '" ';
echo 'lat="' . $row['lat'] . '" ';
echo 'lng="' . $row['lng'] . '" ';
echo 'type="' . $row['type'] . '" ';
echo '/>';
}

// ����� XML-�����
echo '</markers>';

?>