<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'plugins/PHPMailer/src/Exception.php';
require_once 'plugins/PHPMailer/src/PHPMailer.php';
require_once 'plugins/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    # Simple Mail Transfer Protocol (STMP)
    # TO send and receive email
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true; #  extension of the Simple Mail Transfer Protocol (SMTP) 
                            # whereby a client may log in using any authentication mechanism 
                            # supported by the server
    $mail->Username = 'hrdelysium@gmail.com';
    $mail->Password = 'elysium123'; 

    $mail->SMTPSecure = "tls"; # Transport Layer Security (TLS) encrypts data sent over 
                              # the Internet to ensure that eavesdroppers and hackers are 
                              # unable to see what you transmit which is particularly useful 
                              #for private and sensitive information such as passwords, 
                              #credit card numbers, and personal correspondence.           
    $mail->Port       = 587;   # The standard secure SMTP port usually fo modern smtp port

    $mail->setFrom('hrdelysium@gmail.com'); 
    $mail->addAddress('hrdelysium@gmail.com'); 

    $mail->isHTML(true); # HTML formatted.
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert" > <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h5 class="text-center">Message Sent!</h5>
              </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
      