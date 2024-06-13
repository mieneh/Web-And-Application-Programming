<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .bg {
            background: #eceb7b;
        }
    </style>
</head>
<body>
<?php
    $error = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email'])
    && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm']))
    {
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];

        if (empty($first_name)) {
            $error = 'Vui lòng nhập họ của bạn';
        }
        else if (empty($last_name)) {
            $error = 'Vui lòng nhập tên của bạn';
        }
        else if (empty($email)) {
            $error = 'Vui lòng nhập email của bạn';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'Đây không phải là một địa chỉ email hợp lệ';
        }
        else if (empty($user)) {
            $error = 'Hãy điền tên đăng nhập';
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
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border my-5 p-4 rounded mx-3">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Tạo tài khoản</h3>
                <form method="post" action="" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">Họ</label>
                            <input value="<?= $first_name?>" name="first" required class="form-control" type="text" placeholder="Họ" id="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Tên</label>
                            <input value="<?= $last_name?>" name="last" required class="form-control" type="text" placeholder="Tên" id="lastname">
                            <div class="invalid-tooltip">Tên là bắt buộc</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $email?>" name="email" required class="form-control" type="email" placeholder="Email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="user">Tên đăng nhập</label>
                        <input value="<?= $user?>" name="user" required class="form-control" type="text" placeholder="Tên đăng nhập" id="user">
                        <div class="invalid-feedback">Hãy điền tên đăng nhập</div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Mật khẩu" id="pass">
                        <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Nhập lại mật khẩu</label>
                        <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Nhập lại mật khẩu" id="pass2">
                        <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                    </div>

                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button type="submit" class="btn btn-success px-5 mt-3 mr-2">Đăng ký</button>
                        <button type="reset" class="btn btn-outline-success px-5 mt-3">Đặt lại</button>
                    </div>
                    <div class="form-group">
                        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a> ngay.</p>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>
</html>

