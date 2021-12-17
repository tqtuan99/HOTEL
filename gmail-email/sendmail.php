<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once('../../../gmail-email/vendor/phpmailer/src/Exception.php');
    require_once('../../../gmail-email/vendor/phpmailer/src/PHPMailer.php');
    require_once('../../../gmail-email/vendor/phpmailer/src/SMTP.php');

function sendmail($email, $firstname,$verification){
    // random verification
    
    
    // passing true in constructor enables exceptions in PHPMailer
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->Username = 'klthotel2021@gmail.com'; // YOUR gmail email
        $mail->Password = 'KLThotel2021'; // YOUR gmail password
    
        // Sender and recipient settings
        $mail->setFrom('klthotel2021@gmail.com', 'Hotel KLT');
        $mail->addAddress($email, $firstname);
        $mail->addReplyTo('klthotel2021@gmail.com', 'Hotel KLT'); // to set the reply to
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = "Confirm Email";
        $mail->Body = '
        Hey '.$firstname.',<br>
        <br> 
        Thank you for your interest in our hotel, to complete the registration process please enter the following confirmation code into your device.
        <br><br> 
        Verification code: <b>'.$verification.'</b> <br><br> 
        Thanks,<br>
        KLT Hotel
        ';

        $mail->AltBody = '
        Hey '.$firstname.',

        Thank you for your interest in our hotel, to complete the registration process please enter the following confirmation code into your device.

        Verification code: '.$verification.'
        Thanks,
        KLT Hotel
        ';
    
        $mail->send();
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
