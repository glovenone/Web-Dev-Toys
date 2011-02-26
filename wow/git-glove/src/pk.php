<html>
<head>
<title>PK:</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<?php
session_start();
include('inc/common.inc.php');

echo '<h1>PK结果</h1>';
$user_name = $_SESSION['logged_user']['name'];

$boss_name = $_POST['boss_name'];
$sql = "select 
		boss.hp as boss_hp, users.hp as users_hp,equip.equip_id, 
		equip.name as equip_name,level, rate, rel_boss_equip.boss_id, 
		rel_boss_equip.equip_id
	from
		boss, users, equip, rel_boss_equip
	where 
		users.name = '$user_name' and boss.name = '$boss_name'
		and boss.boss_id = rel_boss_equip.boss_id 
		and equip.equip_id = rel_boss_equip.equip_id
	order by
		equip.equip_id
	";
$equ_cou = 	"select
			 equip_name 
		from
			rel_boss_equip, equip, boss
		where 
			equip.equip_id = rel_boss_equip.equip_id
			and boss.boss_id = rel_boss_equip.boss_id
		";
$res_cou = mysql_query($equ_cou);
$count = mysql_num_rows($res_cou);

print_r(mysql_fetch_array($res_cou));
$result = mysql_query($sql);
for($i = 0; $i < 3; $i++)
{

if($result)
	$data = mysql_fetch_array($result);
else
	echo '好像出错了～';
}

$pk = ((float)$data['users_hp'] / (float)$data['boss_hp']) + (float)rand(0, 10000)/10000;
srand();
if($pk > 0.8)
{
	echo '恭喜你战胜了'.$boss_name.'</p>';
	echo '你得到了装备'.'"'.$data['equip_name'].'"';
}
else
	echo '很遗憾，你被'.$boss_name.'无情的虐待了~';

?>
<br>
<a class="button" href="index.php">回到首页</a>
<br>
<a class="button" href="choose.php">再找个boss挑战一下</a>
</body>
</html>
