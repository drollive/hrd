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
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hrdelysium@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'elysium123'; // Gmail address Password
    $mail->SMTPSecure = "tls";            
    $mail->Port       = 587;   

    $mail->setFrom('hrdelysium@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('hrdelysium@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert" > <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h5 class="text-center">Message Sent! Thank you for contacting us!</h5>
              </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
      