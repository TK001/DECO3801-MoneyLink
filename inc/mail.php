<?php
function sendmail($from,$usr_email,$subject,$message) {

// Downloaded from https://github.com/PHPMailer/PHPMailer
  include_once('inc/class.phpmailer.php');

  $mail = new phpmailer();

  $mail->SMTPDebug = 0;                            // debugging: 1 = errors and messages, 2 = messages only, 0 = off
  $mail->IsSMTP();                                 // Set mailer to use SMTP
  $mail->Host = 'localhost';                  // Specify server
  $mail->Port = 25;                               // Server port: 465 ssl OR  587 tls
  //$mail->SMTPSecure = 'tls';                       // Enable encryption, 'ssl' also accepted
  //$mail->SMTPAuth = false;                          // Enable SMTP authentication
  //$mail->Username = 's4326120@student.uq.edu.au';             // SMTP username
  //$mail->Password = 'passwordhere';    // SMTP password
  $mail->SetFrom($from,'MoneyLink');                   // Sender
  $mail->AddReplyTo($from,'Support');              // Set an alternative reply-to address
  $mail->AddAddress($usr_email,'User');                   // Set who the message is to be sent to
  $mail->Subject = $subject;                       // Set the subject line

// Prepares message for html (see doc for details http://phpmailer.worxware.com/?pg=tutorial)
  $mail->MsgHTML($message);

// Send the message, check for errors
  $ok = $mail->Send();

  return $ok;
}

function sendQRmail($from,$to,$subject,$msg, $qrcodeImage,$cid,$name) {

  include_once('inc/class.phpmailer.php');

  $mail = new phpmailer();

  $mail->SMTPDebug = 0;                            // debugging: 1 = errors and messages, 2 = messages only, 0 = off
  $mail->IsSMTP();                                 // Set mailer to use SMTP
  $mail->Host = 'mailhub.eait.uq.edu.au';                  // Specify server
  $mail->Port = 25;                               // Server port: 465 ssl OR  587 tls
  //$mail->SMTPSecure = 'tls';                       // Enable encryption, 'ssl' also accepted
  $mail->SMTPAuth = false;                          // Enable SMTP authentication
  $mail->Username = 's4329663@student.uq.edu.au';             // SMTP username
  $mail->Password = 'hongzhe123999';    // SMTP password
  $mail->SetFrom($from,'QRappi');                   // Sender
  $mail->AddReplyTo($from,'Support');              // Set an alternative reply-to address
  $mail->AddAddress($to,'User');                   // Set who the message is to be sent to
  $mail->Subject = $subject;                       // Set the subject line

// Prepares message for html (see doc for details http://phpmailer.worxware.com/?pg=tutorial)
  $mail->MsgHTML($msg);

// Add the image to the email as an inline element (i.e. not as an attachment)
  $mail->AddStringEmbeddedImage($qrcodeImage,$cid,$name);

// Send the message, check for errors
  $ok = $mail->Send();

  return $ok;
}
?>
