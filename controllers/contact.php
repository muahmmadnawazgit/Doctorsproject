<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


  $name=$_POST["name"];
  $subject=$_POST["subject"];
  $email=$_POST["email"];
  $message=$_POST["message"];




//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'muhammadnawaz110002@gmail.com';                     //SMTP username
    $mail->Password   = 'nafycyjyukkrbvcu';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;        //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('muhammadnawaz110002@gmail.com');
    $mail->addAddress($email, $name);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = 'Name : '.$name.'<br>email : '.$email.'<br>subject  : '.$subject.'<br>message : '.$message;

    $mail->send();
    ?><script>
    alert("Mail has been sent");
    document.location.href="../routes/main.php"</script>;
    <?php
} catch (Exception $e) {
    ?><script>alert("Error in sending Mail");
    document.location.href="../routes/main.php"</script>;
    <?php
}


$conn->close();



?>
