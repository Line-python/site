<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$num4 = $_POST['num4'];
$num5 = $_POST['num5'];
$num6 = $_POST['num6'];
$num7 = $_POST['num7'];
$num8 = $_POST['num8'];
$num9 = $_POST['num9'];
$num10 = $_POST['num10'];
$num11 = $_POST['num11'];
$point = $_POST['text'];
$phone = $_POST['phone'];




$subject = 'Покупка на сайте';
$error = '';
if(trim($phone) == '')
	$error = '<h5>Введите номер телефона</h5>';
else if(trim($point)== '')
	$error = '<h5>Введите адрес доставки</h5>';
else if(strlen($point)<10)
	$error = '<h5>Введите более точный адрес</h5>';
else if(strlen($phone)<10)
	$error = '<h5>Введите правильной номер телефона для связи</h5>';
/*if(error != ''){
	echo $error;
	exit();
}*/

if($num1 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num1.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num2 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num2.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num3 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num3.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num4 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num4.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num5 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num5.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num6 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num6.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num7 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num7.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num8 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num8.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num9 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num9.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num10 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num10.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
if($num11 != '')
	$mess = 'Куплен торвар --- в колчестве '.$num11.'<br>Доставить по адресу --- '.$point.'<br>Номер телефона покупателя --- '. $phone;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'egkirill07082';
$mail->Password = 'Hacker1qr';
// От кого
$mail->setFrom('Сайт', 'site.ru');
// Кому
$mail->addAddress('egkirill07082@gmail.com', 'Иван Петров');
$mail->Subject = $subject;
if ($mess != '')
	$body = $mess;
$mail->msgHTML($body);
$mail->send();

echo '<h3>Сообщение оправленно</h3>';
?>