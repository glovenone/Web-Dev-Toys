<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
include "inc/common.inc.php";

$name = $_SESSION['logged_user']['name'];
$sql = "
	select hp from users where name = '$name';
	";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
echo '你现在的攻击力是:'.$data[0];
?>

<html>
<head>
<title>玩家属性</title>
<body>
	<br>
	<a href="index.php">回到首页</a>
</body>
</head>
</html>
