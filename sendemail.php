<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'frontend.elsheikh@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'A0125376663%%%a'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('frontend.elsheikh@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('frontend.elsheikh@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>First Name : $fname <br> Last Name : $lname <br>Email: $email <br>Phone Number : $number</h3> Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span style="background-color:var(--skin-color); padding:15px; line-height: 55px; "></span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span style="background-color:var(--skin-color); padding:15px; line-height: 55px; ">'.$e->getMessage().'</span>
              </div>';
  }
}
?>
