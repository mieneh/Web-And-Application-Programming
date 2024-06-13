<style>
	.nav-item {
        height: 50px;
		color: white
	}
	span {
		padding: 50px 11px;
	}
</style>
<nav id="sidebar" class='mx-lt-6 bg-dark' >
	<div class="sidebar-list">
		<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Trang chủ</a>
		<a href="index.php?page=booked" class="nav-item nav-booked"><span class='icon-field'><i class="fa fa-shopping-cart "></i></span> Đơn hàng</a>
		<a href="index.php?page=flights" class="nav-item nav-flights"><span class='icon-field'><i class="fa fa-plane"></i></span> Chuyến bay</a>
		<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Khách hàng</a>		
		<a href="index.php?page=statics" class="nav-item nav-statics"><span class='icon-field'><i class="fa fa-building"></i></span> Thống kê</a>		
	</div>
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
