
<DOCTYPE html>
<html lang="en">
<head>
    <title>Đặt lại mật khẩu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php

    $error = '';
    $email = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['email']) && isset($_POST['pass']) &&
        isset($_POST['pass-confirm'])) {

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];

        if (empty($email)) {
            $error = 'Vui lòng nhập email của bạn';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'Đây không phải là một địa chỉ email hợp lệ';
        }
        else if (empty($pass)) {
            $error = 'Vui lòng nhập mật khẩu của bạn';
        }
        else if (strlen($pass) < 6) {
            $error = 'mật khẩu phải có ít nhất 6 ký tự';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Mật khẩu không hợp lệ';
        }
        else {
            echo '';
        }
    }
    else {
        //print_r($_POST);
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Đặt lại mật khẩu</h3>
            <form novalidate method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input readonly value="sample@gmail.com" name="email" id="email" type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="pass">Mật khẩu</label>
                    <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Mật khẩu" id="pass">
                    <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                </div>
                <div class="form-group">
                    <label for="pass2">Nhập lại mật khẩu</label>
                    <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Đặt lại mật khẩu" id="pass2">
                    <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button class="btn btn-success px-5">Đổi mật khẩu</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
