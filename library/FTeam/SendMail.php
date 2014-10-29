<?php

class FTeam_SendMail {
    public function send_mail($email , $title , $html){
        if($email !== NULL){
            try{
            $host = 'mail.decode.com.vn';
		$config = array('auth'=>'login',
                                'username'=>EMAIL_INFO,
				'password'=>EMAIL_INFO_PASSWORD);
		$transport = new Zend_Mail_Transport_Smtp($host,$config);
		$mail = new Zend_Mail();
		$mail->setFrom(EMAIL_INFO,'Decode');
		$mail->addTo($email,'You');
                $mail->addBcc(EMAIL_INFO,'Decode');
		$mail->setSubject($title);
		$mail->setBodyHtml($html);
		$mail->send($transport);
            }catch(Exception $ex){
                
            }
        }
    }
}
