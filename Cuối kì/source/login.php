<?php 
    session_start();
    require "head.php";
    require "common/navbar.php";
    require "connect.php";
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";
      
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            if($row['isAdmin'] == 1){
                $_SESSION['admin_name'] = $row['username'];
                echo '<script language="javascript">alert("Đăng nhập thành công"); window.location="./admin/index.php";</script>';
                $_SESSION['logged'] = true;
                $log = $_SESSION['logged'];
      
            } else if($row['isAdmin'] == 0){
                $_SESSION['user_name'] = $row['username'];
                echo '<script >alert("Đăng nhập thành công"); window.location="user/profile.php";</script>';
                $_SESSION['logged'] = true;
                   
                exit();
            }
        } else {
            $error[] = 'Sai tên đăng nhập hoặc mật khẩu!';
        }
    }
?>
<head>
	<title>Đăng nhập</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<style>
 
    </style>
<body>
    <section class="limiter">
		<div class="container-login100" style="background-image: url('img/bglogin.jpg');">
			<div class="wrap-login100">
                <form method="POST" id="login" class="login">
                    <div class="form-title"><p>ĐĂNG NHẬP</p></div>
                    <?php 
                        if (isset($_GET['registersuccess'])) {
                            echo '<div class="alert alert-success" role="alert">Bạn đã đăng ký tài khoản thành công.</div>';
                        }
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<div class="alert alert-danger">'.$error.'</div>';
                            }
                        }
                    ?>
                    <div class="form-group">
                        <input type="text" class="form-input" id ="username" name ="username" placeholder="Tên đăng nhập" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" id="password"  name="password" placeholder="Mật khẩu" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
                    </div> 
                    <div class="form-group d-flex">
                        <div class="w-50"><input type="checkbox" id="savelogin" class="inputText" name="savelogin"/> Lưu thông tin</div>
                        <div class="w-50 text-right"><a href="forgot.php">Quên mật khẩu</a></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="login" class="form-submit" name="login">Đăng nhập</button>
                    </div>
                    <p class="loginhere">Bạn chưa có tài khoản? <a href="register.php" class="loginhere-link">Đăng ký tại đây</a></p>
                </form>
			</div>
		</div>
    </section>
</body>

<?php 
    require "common/footer.php"
?>	
</html>