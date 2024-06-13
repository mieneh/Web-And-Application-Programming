<?php 
include('../connect.php');
$qry = $conn->query("SELECT * FROM booking where id = ".$_GET['id']);
foreach($qry->fetch_array() as $k => $v){
	$$k = $v;
}
?>
<div class="container-fluid">
	<div class="col-lg-12">
	<form action="" id="book-flight">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<div class="row">
			<div class="col-md-6">
				<label class="control-label">Họ và tên</label>
				<input type="text" name="fullname" class="form-control" value="<?php echo $fullname ?>">
			</div>
			<div class="col-md-6">
				<label class="control-label">Số điện thoại</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $phone ?>">
			</div>
		</div>

		<div class="row">
		<div class="form-group col-md-12">
			<label class="control-label">Địa chỉ</label>
			<textarea name="address" id="" cols="30" rows="2" class="form-control"><?php echo $address ?></textarea>
		</div>
		</div>
		<div id="row-field">
			<div class="row ">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary btn-sm " >Lưu</button>
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Hủy</button>
				</div>
			</div>
		</div>
		
	</form>
	</div>
</div>
<script>
	$('#book-flight').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=update_booked',
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
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>