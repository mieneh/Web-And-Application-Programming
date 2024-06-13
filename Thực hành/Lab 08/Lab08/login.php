<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }

    $error = '';

    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else if ($user == 'admin' && $pass == '123456') {
            // success

            $_SESSION['user'] = 'admin';
            $_SESSION['name'] = 'Mai Van Manh';

            header('Location: index.php');
            exit();
        }else {
            $error = 'Invalid username or password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Đăng nhập</h3>
            <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input value="<?= $user ?>" name="user" id="user" type="text" class="form-control" placeholder="admin">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input name="pass" value="<?= $pass ?>" id="password" type="password" class="form-control" placeholder="123456">
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <div class="w-50">
                        <input <?= isset($_POST['remember']) ? 'checked' : '' ?> name="remember" type="checkbox" class="custom-control-input" id="remember">
                        <label class="custom-control-label" for="remember">Nhớ đăng nhập</label>
                    </div>
					<div class="w-50"><a href="forgot.php">Quên mật khẩu?</a></div>
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button class="btn btn-success px-5">Đăng nhập</button>
                </div>
                <div class="form-group">
                    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>.</p>
                </div>
            </form>
            <p class="text-danger">Đăng nhập bằng tài khoản: <strong>admin</strong> - <strong>123456</strong></p>
        </div>
    </div>
</div>

</body>
</html>
