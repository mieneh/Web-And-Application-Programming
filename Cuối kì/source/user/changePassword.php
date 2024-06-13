<?php
session_start();
require "../connect.php";
$errors = [];
if($_SESSION['logged']=true) {
    $username = $_SESSION['user_name'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $uid=$row['uid'];
        $username = $row['username'];
        $email = $row['email'];
        $fullname = $row['fullname'];
        $birthday = $row['birthday'];
        $address = $row['address'];
        $gender = $row['gender'];
        $avater=$row['avatar'];
        $phone = $row['phone'];
    
    }if(isset($_POST['change'])){

    
        $password = md5($_POST['password']);
    
        $newPassword = ($_POST['newPassword']);
        $newPassword2 = ($_POST['newPassword2']);
        $newpassword = md5($_POST['newPassword']);
        $newpassword2 = md5($_POST['newPassword2']);
        if ( empty($password) || empty($newpassword) || empty($newpassword2)){
            $errors['full'] = 'Chưa đủ thông tin';
    
        }
        $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if (strlen($newPassword)<8){
            $errors['password_len'] = 'Mật khẩu phải từ 8 ký tự bao gồm chữ hoa, số và ký tự đặc biệt';
    
        }
        if (!preg_match($partten, $newPassword, $matchs))
        {
            $errors['password_len'] = 'Mật khẩu phải từ 8 ký tự bao gồm chữ hoa, số và ký tự đặc biệt';
    
        }
        
        $sql = <<<EOT
        SELECT *
        FROM users
        WHERE username = '$username' AND password = '$password';
    EOT;
    
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            if ($password == $newpassword){
                echo '<script language="javascript">alert("Mat khau moi khong duoc trung voi mat khau cu"); window.location="changePassword.php";</script>';
    
            }
            else if($newpassword == $newpassword2)
            {
                echo '<script language="javascript">alert("thành công"); window.location="../login.php";</script>';
                $sql = "UPDATE users SET password = '$newpassword' WHERE username = '$username'" ;
                $result = mysqli_query($conn, $sql);
                
            }
            else
            {
                $errors['password_confirm'] = 'Mật khẩu không hợp lệ';
            }
        }
        else {
            echo '<script language="javascript">alert("Sai thông tin"); window.location="changePassword.php";</script>';
            
        }
    
        
    }
    $conn->close();
}


?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- slider stylesheet -->
  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">        
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<!--CSS ============================================= -->
	<link rel="stylesheet" href="../css/linearicons.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">				
	<link rel="stylesheet" href="../css/nice-select.css">							
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="stylesheet" href="../css/owl.carousel.css">				
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/user.css">
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<style>
    .nav {
    background-color: #0b1749;
  }
  .name-logo {
    font-size: 20px;
    padding: 7px 11px;
    font-weight:600;
    
  }
  .nameLogo{
    color: #f8b600;
    text-shadow: 3px 1px 4px #f1f349
  }
</style>
<body>
<header class="header">
<nav class="nav navbar navbar-expand-lg navbar-light" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		
      <div class="name-logo float-left text-white">
        <a href="../index.php"><large><b class="nameLogo">Gold Dragon</b></large></a>
      </div>
	  	<div class="name-logo float-right text-white">
	  		<?php echo $_SESSION['user_name'] ?><a href="../logout.php" class="text-white"><i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
</nav>
</header>
<section class="container profile">
    <div class="containe-fluid">
    <div class="row full-container">
        <div class="col-md-3 col-12 left_panel">
            <div class="card_board">
                <div class="row">
                    <div class="col-12">
                    
                        <h3 class="display_name" id="displayName"> Xin chào, <?php echo $fullname?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-7">
                        <p class="content id">Số hội viên</p>
                        
                    </div>
                    <div class="col-md-5 col-5 pad_lzero">
                        <p class="boldtext" id="displayId">  <?php echo $uid?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-7">
                        <p class="content level">Hạng thẻ hiện tại</p>
                        
                    </div>
                    <div class="col-md-5 col-5 pad_lzero">
                        <p class="boldtext" id="displayLevel">Registered</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-7 ">
                        <p class="content bonus">Điểm thưởng</p>
                        
                    </div>
                    <div class="col-md-5 col-5 pad_lzero">
                        <p class="boldtext" id="displayBonus">1000</p>
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="panel_menu ">
                <div class="row ">
                    <div class="col-md-12 col-12">
                        <ul role="navigation">
                        <li>
                                <a aria-label="profile" id="profile" href="profile.php">
                                    
                                    <i class="fa-solid fa-user" style="margin-right:1.5rem"></i>Thông tin tài khoản
                                </a>
                            </li>

                            <li>
                                <a aria-label="flights" id="flights" href="changePassword.php">
                                    <i class="fa-solid fa-key" style="margin-right:1.5rem"></i>Đổi mật khẩu
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12 right-panel">
            <div class="table-profile">
                <div class="row white-box">
                    <div class="col-12 header-information">
                        <div class="header-info">
                            <h3 >ĐỔI MẬT KHẨU</h3>
                        </div>
                </div>
                <div class="panel-body">
                        
                            <form class="formChange" id="formChange" autocomplete="off" action="" method="post">
                                <div class="row">
                              
                                        <div class="col-12 bottomspacer">
                                            <div class="group">
                                                <label for="password" class="inputLabel">Mật khẩu hiện tại</label>
                                                <input type="password" id="password" class="input-text" name="password" placeholder="Mật khẩu hiện tại">
                                            </div>
                                        </div>
                                        <div class="col-12 bottomspacer">
                                            <div class="group">
                                                <label for="newPassword" class="inputLabel">Mật khẩu mới</label>
                                                <input type="newPassword" id="newPassword" class="input-text" name="newPassword" placeholder="Nhập mật khẩu mới">
                                            </div>
                                        </div>
                                        <div class="col-12 bottomspacer">
                                            <div class="group">
                                                <label for="newPassword2" class="inputLabel">Vui lòng xác nhận mật khẩu mới</label>
                                                <input type="newPassword2" id="newPassword2" class="input-text" name="newPassword2" placeholder="Vui lòng xác nhận mật khẩu mới">
                                        </div>
                                        
                                        <?php
                                            foreach ($errors as $error) {
                                                echo '<div class="alert alert-danger">' . $error . '</div>';
                                            }
                                        ?>
                                    <div class="col-md-12 d-flex justify-content-center" >
                                       
                                        <div class="btn centerhover ">
                                            <button type="submit" class="btn btn-success" name="change" >Cập nhật</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                            </form>
                </div>
            </div>
           
        </div>
        
    </div>
</div>
</section>

<script>
    $('#newPassword2').on('keyup', function(e) {
            if ($('#newPassword').val() != $('#newPassword2').val()) {
                $('#newPassword2').addClass('is-invalid');
            } else {
                $('#newPassword2').removeClass('is-invalid');
            }
        });
        $('#formChange').on('submit', function(e) {
            e.preventDefault();
            form = e.target;
            
            if ($('#newPassword').val() == $('#newPassword2').val()) {
                    form.submit();
            } else {
                    alert('Mật khẩu không khớp.');
            }
           
        });
        

 
    </script>


</body>



    
    <?php 
          require "../common/footer.php"; ?>
 
</html>

	

