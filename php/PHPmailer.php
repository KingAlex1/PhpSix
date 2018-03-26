<?php

require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function mailer($mailTo, $subject, $message)
{
    try {

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.mail.ru";
        $mail->SMTPAuth = true;
        $mail->Username = "alex_loft90@mail.ru";
        $mail->Password = "loft900";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom("alex_loft90@mail.ru", 'Mailer');
        $mail->addAddress("$mailTo");
        $mail->addReplyTo('alex_loft90@mail.ru');
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = "$subject";
        $mail->Body = "$message";
        $mail->send();

        echo "Сообщение отправлено на почту : $mailTo";
    } catch (Exception $e) {
        echo 'Сообщение не отправлено, ошибка : ', $mail->ErrorInfo;
    }
}