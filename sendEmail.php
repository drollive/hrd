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
    $mail->Username = 'hrdelysium@gmail.com';
    $mail->Password = 'elysium123'; 
    $mail->SMTPSecure = "tls";            
    $mail->Port       = 587;   

    $mail->setFrom('hrdelysium@gmail.com'); 
    $mail->addAddress('hrdelysium@gmail.com'); 

    $mail->isHTML(true);
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
      