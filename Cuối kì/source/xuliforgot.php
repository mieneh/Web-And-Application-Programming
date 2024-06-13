<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

require 'connect.php';
$errors = '';
$email = '';
if(isset($_POST['send'])){
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<script language="javascript">alert("Please enter right email!"); window.location="forgot.php";</script>';
    }

    if(empty($email)){
        echo '<script language="javascript">alert("Enter email"); window.location="forgot.php";</script>';

    }
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 0) {
        echo '<script language="javascript">alert("Your email is not register"); window.location="forgot.php";</script>';

    }
   
    if(isset($_POST["send"])){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dangnhuquynh2403@gmail.com';
        $mail->Password = 'mmxborldbmvntfmf';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('dangnhuquynh2403@gmail.com');
        $mail->addAddress($_POST["email"]);
        $mail ->isHTML(true);
        $randPassword = randstring(8);
        $mail->Subject = "Forgot password";
        $mail->Body = $randPassword;
        $newPassword = md5($randPassword);
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            
         } else {

             $sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'" ;
            $result = mysqli_query($conn, $sql);
            
         }
    }
}

?>