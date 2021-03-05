<?php
$file="base.log";    //куда пишем логи
$col_zap=4999;        //строк в файле не более

function getRealIpAddr() {
  if (!empty($_SERVER['HTTP_CLIENT_IP']))        // Определяем IP
  { $ip=$_SERVER['HTTP_CLIENT_IP']; }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    // Если IP идёт через прокси
  { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }
  else { $ip=$_SERVER['REMOTE_ADDR']; }
  return $ip;
}

if (strstr($_SERVER['HTTP_USER_AGENT'], 'YandexBot')) {$bot='YandexBot';}
elseif (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {$bot='Googlebot';}
else { $bot=$_SERVER['HTTP_USER_AGENT']; }

$ip = getRealIpAddr();
$date = date("H:i:s d.m.Y");        //дата события
$home = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];    //какая страница сайта
$lines = file($file);
while(count($lines) > $col_zap) array_shift($lines);
$lines[] = $date."|".$bot."|".$ip."|".$home."|\r\n";
file_put_contents($file, $lines);
?>
<? session_start ();  ?>
<html>
<head>
<title>Выход</title>
<meta http-equiv='Refresh' content='3; URL=index.php'>
<meta charset="utf-8">
<?
if(!$_SESSION['admin_example'])
{
	echo 'Для того, чтобы выйти – надо сперва войти!';
}
else
{
	unset($_SESSION['admin_example']);
	if(!$_SESSION['admin_example']) {echo 'Вы вышли';}
}
?>
</body>
</html>