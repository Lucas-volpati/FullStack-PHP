<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

$phpmailer = new PHPMailer();

var_dump($phpmailer instanceof PHPMailer);

/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->setLanguage("br");
    $mail->isHTML("true");
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->CharSet = "utf-8";

    //Auth

    $mail->Host = "smtp.sendgrid.net";
    $mail->Username = "apikey";
    $mail->Password = "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";
    $mail->Port = "587";

    //Mail

    $mail->setFrom("site@fenixcaldeiras.com.br", "Lucas Volpati");
    $mail->Subject = "Este é um e-mil teste via SendGrid.";
    $mail->msgHTML("<h1>Olá, meu primeiro disparo de e-mail</h1>");
    
    //Send
    
    $mail->addAddress("comercial@fenixcaldeiras.com.br", "Herminio");
    $send = $mail->send();

    var_dump($send);


} catch (MailException $th) {
    echo message()->error($th->getMessage());
}