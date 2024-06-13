<!-- head, navbar section -->
<?php 
	session_start();
    require "head.php";
    require "common/navbar.php";
?>

<section class="relative about-banner" style="background-image: url(img/bg-contact.png)">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white animated slideInDown">Liên hệ với chúng tôi</h1>	
				<p class="text-white link-nav"><a href="index.php">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php">Liên hệ </a></p>
			</div>	
		</div>
	</div>
</section>
	
<!-- contact-page -->
<section class="contact-page-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon"><span class="lnr lnr-home"></span></div>
					<div class="contact-details">
						<h5>Quận 7, Thành phố Hồ Chí Minh</h5>
						<p>19 Nguyễn Hữu Thọ, Tân Phong</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon"><span class="lnr lnr-phone-handset"></span></div>
					<div class="contact-details">
						<h5>0126399999</h5>
						<p>9:00 - 17:00 Thứ 2 - Thứ 6</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon"><span class="lnr lnr-envelope"></span></div>
					<div class="contact-details">
						<h5>gold_dragon@gmail.com</h5>
						<p>Gửi cho chúng tôi bất cứ khi nào</p>
					</div>
				</div>														
			</div>
			<div class="col-lg-8">
				<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
					<div class="row">	
						<div class="col-lg-6 form-group">
							<input name="name" placeholder="Nhập họ và tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập họ và tên'" class="common-input mb-20 form-control" required="" type="text">						
							<input name="email" placeholder="Nhập địa chỉ email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập địa chỉ email'" class="common-input mb-20 form-control" required="" type="email">
							<input name="subject" placeholder="Nhập chủ đề" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập chủ đề'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group"><textarea class="common-textarea form-control" name="message" placeholder="Nội dung tin nhắn..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nội dung tin nhắn...'" required=""></textarea></div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button class="genric-btn primary" style="float: right;">Gửi tin nhắn</button>											
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>	
</section>
			
<!-- footer section -->
<?php 
    require "common/footer.php";
?>

</html>