<?php session_start();

//Import PHPMailer classes into the global namespace

//These must be at the top of your script, not inside a function

require 'mail/PHPMailer.php';

require 'mail/SMTP.php';

require 'mail/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;





//Load Composer's autoloader

// require 'vendor/autoload.php';



//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);



try {

    //Server settings

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

    $mail->isSMTP();                                            //Send using SMTP

    $mail->Host       = 'smtp.mail.ru';                     //Set the SMTP server to send through

    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Username   = 'почта отправителя';                     //SMTP username

    $mail->Password   = 'Пароль от почты отправителя';                               //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`



    //Recipients

    $mail->setFrom('почта отправителя', 'Mailer');

    $mail->addAddress('Почта получателя');

    // $mail->addReplyTo('info@example.com', 'Information');

    // $mail->addCC('cc@example.com');

    // $mail->addBCC('bcc@example.com');



    //Attachments

    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments

    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


    $message='Заказал: Имя:'.$_POST['name'].' email:'.$_POST['email'].' telephone'.$_POST['tel'].'Товар: '.$_POST['prouctName'];



    

    unset($value);



    //Content

    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = 'Test task';

    $mail->Body    = $message;

    $mail->AltBody = '';



    $mail->send();

//     echo '<h1 style="text-align:center;">Письмо отправлено</h1>';

} catch (Exception $e) {

//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}