<?php 

// composer require phpmailer/phpmailer

require_once APPROOT . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {

	public static function send_email($email, $subject, $body) {

		$mail = new PHPMailer;                          
		$mail->isSMTP();
		$mail->SMTPDebug = SMTP_DEBUG;                            
		$mail->Host = SMTP_HOST;
		$mail->SMTPAuth = SMTP_AUTH;
		$mail->Port = SMTP_PORT;                  
		$mail->SMTPSecure = SMTP_SECURE;  

		$mail->Username = SMTP_USER;            
		$mail->Password = SMTP_PASS;         

		$mail->From = SMTP_FROM; 
		$mail->FromName = SMTP_FROM_NAME; 
		$mail->addAddress($email); 
		// $mail->addAddress($email, 'Nombre de Usuario');    //Nombre usuario es opcional
    // $mail->addCC('cc@example.com'); // carbon copy. 
    // $mail->addBCC('bcc@example.com'); // blind carbon copy. the other recipients won’t be able to see that someone else has been sent a copy of the email.
		$mail->isHTML(true); 
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $body;
		$mail->CharSet = SMTP_CHARSET;


    try {
			$mail->send();
			return true;
		} catch (Exception $e) {
			return null;
		  // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

}
