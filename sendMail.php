<?php

    require("../../mailer/PHPMailer.php");
    require("../../mailer/SMTP.php");

    require("../../mailer/Exception.php");

    use PHPMailer\PHPMailer\PHPMailer;

    use PHPMailer\PHPMailer\Exception;
    
    define("HOST_MAILER_MAIL_ID","floralmeadows123@gmail.com");
    define("HOST_MAILER_MAIL_PASSWORD","7558801917");
    define("HOST_APP_NAME","FACTORY MANAGEMENT SYSTEM");
    
    //sendMail('merinsunnyovelil@gmail.com','123','123');
    //send mail to the selected email
    function sendMail($email,$message,$subject)
	{
		if(!parseEmail($email)) {
			return false;
		}
		$mail = new PHPMailer(true);
		try{
			$mail->IsSMTP();
			$mail->SMTPDebug  = 0;
			$mail->SMTPAuth   = true;
			$mail->SMTPSecure = "tls";
			$mail->Host       = "smtp.gmail.com";
			$mail->Port       = 587;
			$mail->AddAddress($email);
			$mail->Username   = HOST_MAILER_MAIL_ID;
			$mail->Password   = HOST_MAILER_MAIL_PASSWORD;
			$mail->SetFrom(HOST_MAILER_MAIL_ID,HOST_APP_NAME);
			$mail->Subject    = $subject;
			$mail->Body       = $message;
			$mail->IsHTML(true);
			$mail->Send();
			return true;
		}
		catch(Exception $ex){
				//$er=new ErrorMsg('EMAILER');
				//$this->lastError=$er->toString($ex->getMessage());
				echo $ex->getMessage();
		}
    }
    
    
    //checks whether the mail address is in preferred format
	function parseEmail($email) {
			if(preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email)){
				return true;
			}
			return false;
	}
	
