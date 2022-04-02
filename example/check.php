<?php

//print_r($_POST);


$email = $_POST['email'];
$message = $_POST['message'];
$subject = 'Сообщение с сайта';
$error = '';
if(trim($email) == '')
	$error = 'Введите email адрес';
else if(trim($message)== '')
	$error = 'Введите сообщение';
else if(strlen($message)<10)
	$error = 'Сообщение должно быть более 10 символов';

if(error != ''){
	echo $error;
	exit;
}
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
$mail->setFrom('SELLsite', 'Sell.ru');

// Кому
$mail->addAddress('egkirill07082@gmail.com', 'Иван Петров');


$mail->Subject = $subject;

$body = 'Сообщение от '. $email . '<br> Сообщение ---      '.$message;
$mail->msgHTML($body);

$mail->send();
echo '<h3>Сообщение оправленно</h3>';
?>