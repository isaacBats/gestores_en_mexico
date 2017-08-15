<?php
global $mail;
$mail = new \PHPMailer();

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$env = ENVIROMENT;

if ($env === 'prod') {
  $mail->setFrom('soporte@gestoresenmexico.com', 'Soporte');
  $mail->isHTML(true);
} else {
  $mail->IsSMTP();
  $mail->isHTML(true);
  $mail->SMTPAuth = true;

  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;
  $mail->Username = getenv('MAIL_USERNAME');
  $mail->Password = getenv('MAIL_PASSWORD');
}
