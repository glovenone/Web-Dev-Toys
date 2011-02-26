<?php

//连接到数据库服务器
$link = mysql_connect('localhost', 'root', '');

//选择数据库

mysql_select_db('wow1', $link);

//设置utf8编码
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=uft8");

?>
