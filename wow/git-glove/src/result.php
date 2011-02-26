<?php
session_start();
include('inc/common.inc.php');
$user_name = $_SESSION['logged_user']['name'];
$boss_name = $_SESSION['logged_user'][''];
$sql = "select users.hp as user_hp, boss.hp as boss_hp from users, boss where $_SESSION['logged_user']";
$result = mysql_query($sql);
$arr = mysql_fetch_array($result);
print_r($arr);
$arr[user_hp]/$arr[boss_hp] + rndom(0)(1);
?>

<html>
<head>
<title>PK:</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>

<h1>看看结果：</h1>
</br>

