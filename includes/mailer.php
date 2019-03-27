<?php
require_once 'PHPMailer-master/PHPMailerAutoload.php';

class Mailer {
    private static $instance = NULL;
    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
		$mail = new PHPMailer;	
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'garbys.matos@gmail.com';                 // SMTP username
		$mail->Password = '';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to		
        self::$instance = $mail;
      }
      return self::$instance;
    }
  }
  
?>
