<?php
namespace Mini\Controller;

use Mini\Libs\Mail;

class ForgotController
{
	public function index($type = 'students')
	{
		$page_title = "Forogot Password";

		require VIEW . '_template/header_guest.php';
		require VIEW . 'home/forgot.php';
		require VIEW . '_template/footer.php';
	}

	public function send($type)
	{
		$mail = new PHPMailer(true);
		try
		{
		    $mail->SMTPDebug = 2;
		    $mail->isSMTP();
		    $mail->Host = 'smtp1.example.com;smtp2.example.com';
		    $mail->SMTPAuth = true;
		    $mail->Username = 'user@example.com';
		    $mail->Password = 'secret';
		    $mail->SMTPSecure = 'tls';
		    $mail->Port = 587;

		    $mail->setFrom('from@example.com', 'Mailer');
		    $mail->addAddress('joe@example.net', 'Joe User');
		    $mail->addAddress('ellen@example.com');
		    $mail->addReplyTo('info@example.com', 'Information');
		    $mail->addCC('cc@example.com');
		    $mail->addBCC('bcc@example.com');

		    $mail->addAttachment('/var/tmp/file.tar.gz');
		    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

		    $mail->isHTML(true);
		    $mail->Subject = 'Here is the subject';
		    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		}

		catch (Exception $e)
		{
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	}
}
