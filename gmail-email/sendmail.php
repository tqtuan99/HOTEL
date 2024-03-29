<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once('../../../gmail-email/vendor/phpmailer/src/Exception.php');
    require_once('../../../gmail-email/vendor/phpmailer/src/PHPMailer.php');
    require_once('../../../gmail-email/vendor/phpmailer/src/SMTP.php');

function sendmail($email, $firstname,$verification, $check){
    $tokenEmail = md5($email);
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
        
        if($check==1){
            $mail->Subject = "Confirm Email";
            $mail->Body = '
            Hey '.$firstname.',<br>
            <br> 
            Thank you for your interest in our hotel, to complete the registration process please enter the following confirmation code into your device.
            <br><br> 
            Verification code: <b>'.$verification.'</b>  (valid for 2 minutes)<br>
            Please do not share this code with others.
            <br><br> 
            Thanks,<br>
            KLT Hotel
            ';
        }
        else
        {
            $mail->Subject = "New Password";
            $mail->Body = '
            Hey '.$firstname.',<br>
            <br> 
            Thank you for your interest in our hotel, we have reset a new password for you.
            <br><br> 
            Your new password: <b>'.$verification.'</b> <br><br> 
            If you want to change your password, <a href="http://localhost:8080/HOTEL/assets/components/forgotPass/newForgot.php?q='.$tokenEmail.'">Click here</a>!<br>
            Thanks,<br>
            KLT Hotel
            ';
        }
        

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
