<?php
$file="base.log";    //куда пишем логи
$col_zap=999999999;        //строк в файле не более

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
<? session_start ();   
if($_SESSION['admin_example'])
{
$info = '<h1>HI THIS IS ADMIN PAGE!</h1>';
}
else
{
	echo 'У вас недостаточно прав для просмотра данной информации! ';
	echo '<html> <head> <meta http-equiv="Refresh" content="2; URL=index.php"> </head> <body> </body> </html>'; 
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin panel</title>
</head>
<body>
	<? echo $info; ?>
	<p><a href="logout.php">Выйти</a>
	<p><a href="exploit.php">EXPLOIT!</a>
	<p><a href="chat.db" download>Скачать лог чата</a>
	<p><a href="log.php">Лог сайта</a>
	<p><a href="chat.php">Чат</a>
</body>
</html>