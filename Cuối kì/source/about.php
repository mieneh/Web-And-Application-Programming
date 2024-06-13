<!-- head, navbar section -->
<?php 
	session_start();
    require "head.php";
    require "common/navbar.php";
?>

<section class="relative about-banner" style ="background-image: url(img/bg2.jpg)">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white animated slideInDown">Giới thiệu</h1>	
				<p class="text-white link-nav"><a href="index.php">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.php">Giới thiệu</a></p>
			</div>	
		</div>
	</div>
</section>
	
<!-- footer section -->
<?php 
    require "common/footer.php";
?>

</html>