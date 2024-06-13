<?php 
    require "head.php";
    require "common/navbar.php";
    include 'connect.php';
    $errors = [];
    if (isset($_POST['register'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        if (empty($username)) {
            $errors['username'] = 'Tên đăng nhập là bắt buộc';
        }
        if (strlen($username) < 4 || strlen($username) > 20) {
            $errors['password_len'] = 'Tên đăng nhập phải từ 4 đến 20 ký tự';
        }
        if (empty($password)) {
            $errors['password'] = 'Mật khẩu là bắt buộc';
        }
        if (strlen($password) < 8 || strlen($password) > 20) {
            $errors['password_len'] = 'Mật khẩu phải từ 8 đến 20 ký tự';
        }
        if ($password != $password_confirm) {
            $errors['password_confirm'] = 'Mật khẩu không hợp lệ';
        }
        if (empty($email)) {
            $errors['email'] = 'Email là bắt buộc';
        }
        if (count($errors) == 0) {
            if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'")) > 0) {
                echo '<script language="javascript">
                        alert("Tên đăng nhập đã tồn tại!"); 
                        window.location="register.php";
                    </script>';
                die ();
            } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'")) > 0)  {
                echo '<script language="javascript">
                        alert("Tài khoản email đã tồn tại!"); 
                        window.location="register.php";
                    </script>';
                die ();
            }else {
                $sql = sprintf("INSERT into users values(null,'%s','%s','%s','%s','%s','%s','%s','%s','%s', default)", $username, md5($password), $email, $fullname, $phone, '', '','', '');
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header('Location: login.php?registersuccess=1');
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
    }
?>
<head>
	<title>Đăng ký</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <section class="limiter">   
        <div class="container-login100" style="background-image: url('img/bglogin.jpg');">
			<div class="wrap-login100">
                    <div class="form-title">ĐĂNG KÝ</div>
                    <form id="check-register" method="post">
                        <?php
                            foreach ($errors as $error) {
                                echo '<div class="alert alert-danger">' . $error . '</div>';
                            }
                        ?>
                        <div class="form-group">
                            <input class="form-input" type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <input class="form-input" type="text" name="username" placeholder="Tên đăng nhập" required minlength="4" maxlength="20">
                        </div>
                        <div class="form-group">
                            <input class="form-input" type="email" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input pattern="[0-9]{10,11}" class="form-input" type="text" pattern="[0-9]{10,11}"name="phone" id="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Mật khẩu" required minlength="4" maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password_confirm" id="password_confirm" placeholder="Nhập lại mật khẩu" required minlength="4" maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="aggree"/>Bằng việc xác nhận, tôi đồng ý chia sẻ thông tin cá nhân với <a href="index.php">Golden Dragon</a> và tất cả các <a href="#" class="term-service">điều khoản của chương trình</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="register" class="form-submit" name="register" >Đăng ký</button>
                        </div>
                        <p class="registerhere">Bạn đã có tài khoản? <a href="login.php">Đăng nhập tại đây</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#password_confirm').on('keyup', function(e) {
            if ($('#password').val() != $('#password_confirm').val()) {
                $('#password_confirm').addClass('is-invalid');
            } else {
                $('#password_confirm').removeClass('is-invalid');
            }
        });

        $('#check-register').on('submit', function(e) {
            e.preventDefault();
            form = e.target;
            if ($('input[name=aggree]').is(':checked')) {
                if ($('#password').val() == $('#password_confirm').val()) {
                    form.submit();
                } else {
                    alert('Mật khẩu không khớp.');
                }
            } else {
                alert('Bạn phải đồng ý với các điều khoản của chương trình.');
            }
        });
    </script>
</body>

<?php 
    require "common/footer.php"
?>	
</html>