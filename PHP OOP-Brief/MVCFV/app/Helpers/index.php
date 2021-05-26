<?php
require_once 'mail.php';

$mail->setFrom('ttestest336@gmail.com', 'Mailer');
$mail->addAddress('ttestest336@gmail.com');               //Name is optional
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->send();
