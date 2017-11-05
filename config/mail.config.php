<?php
global $mail;
$mail = new \PHPMailer();

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$env = ENVIROMENT;

$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->isHTML(true);
$mail->Host = getenv('MAIL_HOST');
$mail->SMTPAuth = true;
$mail->Username = getenv('MAIL_USERNAME');
$mail->Password = getenv('MAIL_PASSWORD');
$mail->SMTPSecure = getenv('MAIL_SECURE');
$mail->Port = getenv('MAIL_PORT');

if ($env === 'prod') {
  $mail->setFrom('soporte@gestoresenmexico.com', 'Soporte');
} else {
  $mail->setFrom(getenv('MAIL_USERNAME'), 'Soporte');
}
