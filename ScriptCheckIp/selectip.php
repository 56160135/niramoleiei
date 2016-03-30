<html>
<head>
<title>TEST</title>
</head>
<body>
<?php
$hostname="localhost";   // โฮศ
$user="root";            // ชื่อผู้ใช้
$pass="12345678";        // รหัสผ่าน
$database="iptest";      // ชื่อฐานข้อมูล
$table="save";           // ชื่อตาราง

$objConnect = mysql_connect($hostname,$user,$pass) or die("Error");
$objDB = mysql_select_db($database);
$strSQL = "SELECT * FROM $table";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Hostname</div></th>
    <th width="98"> <div align="center">IP</div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{

?>
  <tr>
    <td><div align="center"><?php echo $objResult["host_name"];?></div></td>
    <td><?php echo $objResult["ip_number"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
</body>
</html>
