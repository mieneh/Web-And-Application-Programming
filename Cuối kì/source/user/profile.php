<?php
session_start();
require "../connect.php";
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
        if(isset($_POST['edit-btn'])){

            $birthday = $_POST['birthday-input'];
            $address = $_POST['address-input'];
            $gender = $_POST['gender-input'];
            $sql = "UPDATE users SET  birthday='$birthday', address='$address', gender='$gender', phone='$phone' where username='$username'";
        
            if ($conn->query($sql) === TRUE) {
                echo '<script >alert("Hồ sơ cập nhật thành công"); </script>';
            } else {
                $error[] = 'Cập nhật thất bại!';
            }

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
</head>
<body>
<header class="header">
<nav class="nav navbar navbar-expand-lg navbar-light" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		
      <div class="name-logo float-left text-white">
        <a href="../index.php"><large><b class="nameLogo">Gold Dragon</b></large></a>
      </div>
	  	<div class="name-logo float-right text-white">
	  		<a href="../logout.php" class="text-white"><?php echo $_SESSION['user_name'] ?> <i class="fa fa-power-off"></i></a>
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
                            <h3 > THÔNG TIN TÀI KHOẢN CỦA TÔI</h3>
                        </div>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <h5>Thông tin cá nhân</h5>
                        </div>
                        <form method="post" id="personal_info" action="">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Họ tên: </p>
                            
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <h6><?php echo $fullname?></h6>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Email: </p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <h6><?php echo $email?></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Địa chỉ: </p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <input id="address-input" class="input-text" type="text" name="address-input" placeholder="Địa chỉ của bạn"  value="<?php echo $address; ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                        
                                <div class="col-md-6 col-12">
                                
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Giới tính: </p>
                            
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <select name="gender-input" class="input-text">
                                                <option selected="selected" value="" >Chọn giới tính</option>
                                                <option value="female"> Nữ </option>
                                                <option value="male"> Nam </option>
                                                <option value="none"> Không xác định </option>

                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Ngày tháng năm sinh: </p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <input type="date" name="birthday-input" class="input-text"
                                            placeholder="dd-mm-yyyy" value="<?php echo $birthday; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <p>Số điện thoại: </p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <h6><?php echo $phone?></h6>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-12 d-flex justify-content-center" >
                                    <div class="btn centerhover ">
                                        <button  type="submit" class="btn btn-success" id = "edit-btn" name="edit-btn">Cập nhật</button>
                                    </div>
                                   
                                </div>
                          
                            </form>
                            
                        
                </div>
            

            </div>
           
        </div>
        
    </div>
</div>
</section>
</body>
<?php 
        require "../common/footer.php"; ?>

</html>