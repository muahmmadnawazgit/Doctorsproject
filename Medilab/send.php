<?php
include db.php;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"])){


$name=mysqli_real_escape_string($conn,$_POST["name"]);
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$date=mysqli_real_escape_string($conn,$_POST["date"]);
$phone=mysqli_real_escape_string($conn,$_POST["phone"]);
$doctor=mysqli_real_escape_string($conn,$_POST["doctor"]);
$department=mysqli_real_escape_string($conn,$_POST["department"]);
$message=mysqli_real_escape_string($conn,$_POST["message"]);


    $db="INSERT INTO patients(name,email,phone,date,doctor,department,message)
    VALUES('$name','$email','$phone','$date','$doctor','$department','$message')";

    if($conn->query($db)===TRUE){
       

//Load Composer's autoloader
require 'php_mailer/Exception.php';
require 'php_mailer/PHPMailer.php';
require 'php_mailer/SMTP.php';


  $name=$_POST["name"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $date=$_POST["date"];
  $doctor=$_POST["doctor"];
  $department=$_POST["department"];
  $message=$_POST["message"];




//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'muhammadnawaz110002@gmail.com';                     //SMTP username
    $mail->Password   = 'rjfnoduggjagvaos';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;        //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('muhammadnawaz110002@gmail.com', 'Appointment');
    $mail->addAddress($email, $name);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Name'.$name.'<br>email'.$email.'<br>phone'.$phone.'<br>date'.$date.'<br> doctor'.$doctor.'<br>department'.$department;
  

    $mail->send();
    echo '<script>alert("Mail has been sent");
    document.location.href="index.php"</script>';
} catch (Exception $e) {
    echo '<script>alert("Error in sending Mail");
    document.location.href="index.php"</script>';
}
    }else{
        echo "database not created";
    }

}

$conn->close();
