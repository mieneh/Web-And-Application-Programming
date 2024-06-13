<header id="header">
	<div class="container main-menu">
		<div class="row align-items-center justify-content-between d-flex">
        <div id="name-logo"><a href="index.php"><large><b class="nameLogo">Gold Dragon</b></large></a></div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
				    <li><a href="index.php">Trang chủ</a></li>
				    <li><a href="about.php">Giới thiệu</a></li>
				    <li><a href="ticket.php">Vé máy bay</a></li>
				    <li><a href="payment.php">Hình thức thanh toán</a></li>
				    <li><a href="contact.php">Liên hệ</a>
			    </ul>
	        </nav>
			<?php
            if(isset($_SESSION['user_name'])) {
                echo '
                <div class="dropdown " style="margin-right: 20px">
                    <button class="btn bb-btn dropdown-toggle ;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="lnr lnr-user"></span>                          
                    </button>
                    <div class="dropdown-menu w-75" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item " href="user/profile.php">'.$_SESSION['user_name'].'</a>
                        <a class="dropdown-item " href="logout.php">Đăng xuất</a>
                    </div>
                </div>';
            } else {
                echo '
                <div class="dropdown " style="margin-right: 20px">
                    <button class="btn bb-btn dropdown-toggle ;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="lnr lnr-user"></span>                          
                    </button>
                    <div class="dropdown-menu w-75" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item " href="login.php">Đăng nhập</a>
                        <a class="dropdown-item " href="register.php">Đăng ký</a>
                    </div>
                </div>';
            }
            ?>
		</div>
	</div>
</header>