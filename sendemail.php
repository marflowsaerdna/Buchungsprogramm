<?php
require_once('./common/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
	$mail->From = 'Buchung@wvfischbach.de';
  $mail->SMTPDebug  = 2;                        // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                     // enable SMTP authentication
  $mail->Host       = 'smtp.strato.de';          // sets the SMTP server
  $mail->Port       = 587;                      // set the SMTP port for the GMAIL server
  $mail->Username   = 'Buchung@wvfischbach.de';         // SMTP account username
  $mail->Password   = 'Buchung03';               // SMTP account password
  $mail->AddReplyTo('Buchung@wvfischbach.de', 'Buchungssystem');
  $mail->AddAddress('wolfram.andreas@freenet.de', 'Andreas Wolfram');
//  $mail->SetFrom('wvf-buchung@freenet.de', 'First Last');
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
//  $mail->MsgHTML(file_get_contents('contents.html'));
//  $mail->AddAttachment('images/phpmailer.gif');      // attachment
  if ($mail->Send() == false)
  	echo "Message Sent ERROR<p></p>\n";
  else 
  	echo "Message Sent OK<p></p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>