<html>
<head>
<title>PK:</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<h1>副本信息</h1>
<?php

include('inc/common.inc.php');

$query = "SELECT 
		copy.copy_id, copy.name as copy_name,
		boss.boss_id, boss.name as boss_name
	FROM
		copy, boss
	WHERE
		copy.copy_id = boss.copy_id

	ORDER BY
		copy.copy_id asc, boss.boss_id
	";


$result = mysql_query($query);	//$result = $db->query($query);

if(!$result){
	echo "fuck~";	
}


$row_num = mysql_num_rows($query);
$copy_flag = 0;
$boss_flag = 0;
$copy_name_now = array();
$count = mysql_num_rows($result);

if ($result)
{
	for($i = 0; $i < $count; $i++)
	{	
		$row = mysql_fetch_array($result);
		if($copy_name_now[$i - 1] == $row['copy_name'])
		{
			$copy_flag = 1;
		}
		else
		{
			$copy_flag = 0;
		}
		if($copy_flag == 0)
		{
			echo '<form action="pk.php" method="post">';
			echo "<h2>".$row['copy_name']."</h2>".'</p>';
		}
		/*	echo "<html>";
			echo "<input type=\"radio\" name=\"kk\" value=\"\">";
			echo "</html>";
		*/
		echo '<input type="radio" name="boss_name" value="'.$row['boss_name'].'" />'.$row['boss_name'].'</p>';	
		$copy_name_now[$i] = $row['copy_name'];
		$copy_name_now[$i] = $row['copy_name'];
		$boss_flag = 1;
	}
	echo '<input type="submit" name="go" value="开始战斗!" />';
	echo '</form>';
	echo "</p>\n";
}
?>
<br>
<h3><a class="button" href="index.php">回去看看</a></h3>


</body>
</html>


