<?php 
  session_start();
  require "head.php";
  require "common/navbar.php";
  require 'vendor/autoload.php';
  require 'connect.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $errors = '';
    $email = '';
    if(isset($_POST['send'])){
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '<script language="javascript">alert("Vui lòng nhập đúng email!"); window.location="forgot.php";</script>';
        }

        if(empty($email)){
            echo '<script language="javascript">alert("Nhập email!"); window.location="forgot.php";</script>';

        }
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            echo '<script language="javascript">alert("Tài khoản của bạn chưa đăng ký"); window.location="forgot.php";</script>';
        }
  
        function randstring($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
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
            $mail->Subject = "Cap mat khau moi";
            $mail->Body = $randPassword;
            $newPassword = md5($randPassword);
            if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                
            } else {
                echo '<script language="javascript">alert("Mật khẩu mới đã được gửi đến email của bạn! "); window.location="forgot.php";</script>';
                $sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'" ;
                $result = mysqli_query($conn, $sql);
                
            }
        }
    }
?>
<head>
  
    <title>Quên mật khẩu</title>
     <link rel="stylesheet" href="vendor/registration/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/login.css"> 
    
</head>
<style>

</style>

<section class="limiter">
		<div class="container-login100" style="background-image: url('img/bglogin.jpg');">
			<div class="wrap-login100">
                <form method="POST" id="form" class="frm-forgot" action="">
                    <div class="form-title"><h3>Quên mật khẩu</h3></div>
                    <h6 style="margin-bottom: 10%">Vui lòng nhập email được liên kết với tài khoản của bạn</h6>

                    <div class="form-group ">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group ">
                           
                        <div class="w-100 text-right">
                            <a href="login.php" style="font-size:16px; font-weight:500"><strong>Trở lại</strong></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="form-submit" name="send" >Đồng ý</button>
                    </div>
                </form>
			</div>
		</div>
    </section>


<?php 
    require "common/footer.php"
?>
	
</html>