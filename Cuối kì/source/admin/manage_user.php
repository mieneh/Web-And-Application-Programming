<?php 
include('../connect.php');
if(isset($_GET['username'])){
$qry = $conn->query("SELECT * FROM users where username=".$_GET['username']);
foreach($qry->fetch_array() as $k => $v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<form action = "" id="manage-user">
		<input type="hidden" name="username" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>">
		<div class="form-group">
			<label for="username">Tên đăng nhập</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required?>
		</div>
		<div class="form-group">
			<label for="fullname">Họ và tên</label>
			<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo isset($meta['fullname']) ? $meta['fullname']: '' ?>" required?>
		</div>
		<div class="form-group">
			<label for="gender">Giới tính</label>
			<input type="radio" name="gender" id = "gender" value="<?php echo isset($meta['Nam']) ? $meta['Nam']: '' ?>" required> Nam
            <input type="radio" name="gender" id = "gender"  value="<?php echo isset($meta['Nữ']) ? $meta['Nữ']: '' ?>" required> Nữ
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required?>
		</div>
		<div class="form-group">
			<label for="phone">Số điện thoại</label>
			<input type="text" name="phone" id="phone" class="form-control" pattern="[0-9]{10,11}" value="<?php echo isset($meta['phone']) ? $meta['phone']: '' ?>" required?>
		</div>
		<div class="form-group">
			<label for="address">Địa chỉ</label>
			<input type="text" name="address" id="address" class="form-control" value="<?php echo isset($meta['address']) ? $meta['address']: '' ?>" required?>
		</div>
	</form>
</div>
<script>
	$('#manage-user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=update_user',
			method:"POST",
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1 ){
					$('.modal').modal('hide')
					alert_toast("Đã cập nhật dữ liệu thành công.","success")
					setTimeout(function(){
						location.reload();
					},1500)
				}
			}
		})
	})
</script>