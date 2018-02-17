<?php
    require($fullRoot.'phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(true);
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'mail.devilsden-bangkok-escorts.com';
    $mail->Port = 587;
    $mail->Username = 'mail@devilsden-bangkok-escorts.com'; //$cf->get('mailUsername');
    $mail->Password = 'ds9JYkB9L'; //$cf->get('mailPassword');
    $mail->CharSet = 'UTF-8';

    $mail->SetFrom('mail@devilsden-bangkok-escorts.com', $cf->get['mailName']);
    $mail->ClearReplyTos();
    $mail->AddAddress('nopphasin.arayasirikul@gmail.com', $cf->get('siteName'));

    $mail->Subject = 'Test SSL';

    $mail_content = '
        Dear DDBE,
        <br /><br />
        You have new booking from '.$xss['first_name'].' '.$xss['last_name'].' see details below:<br /><br />

        <p style="color: #777;">Sincerely,<br />
        <strong>'.$cf->get('siteName').'</strong></p>
    ';

    $message = $cf->get('mailMessage');
    $message = str_replace('{mail_subject}', $mail->Subject, $message);
    $message = str_replace('{mail_content}', $mail_content, $message);
    $message = str_replace('{fullUrl}', $fullUrl, $message);

    $mail->AltBody = $mail_content;
    $mail->WordWrap = 50;

    $mail->MsgHTML($message);

    if(!$mail->Send()) {
        die('Cannot send email.');
    } else {
        die('Message sent.');
    }
?>