<?php


function checkEmailServer(){

    //obteniendo los valores de las variables del sistema relacionado con el servidor de correo
    $mail_host = config('mail.mailers.smtp.host');
    $mail_port = config('mail.mailers.smtp.port');
    $mail_encryption = config('mail.mailers.smtp.encryption');
    $mail_username = config('mail.mailers.smtp.username');
    $mail_password = config('mail.mailers.smtp.password');
    try{
        $transport = new Swift_SmtpTransport($mail_host, $mail_port, $mail_encryption);
        $transport->setUsername($mail_username);
        $transport->setPassword($mail_password);
        $mailer = new Swift_Mailer($transport);
        $mailer->getTransport()->start();
        $retorna = 'ok';
    }catch (\Exception $e) {
        //print_r('Exception: '.$e->getMessage());
        $retorna = 'nook';
    }
    return $retorna;
}


