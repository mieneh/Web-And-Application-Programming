<?php include '../connect.php' ?>
<div class="container-fluid">
	<div class="row"><div class="col-lg-12"></div></div>
	<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<large class="card-title"><b>Danh sách khách hàng</b></large>
					<!-- <button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_user"><i class="fa fa-plus"></i> Add</button> -->
				</div>
				<div class="card-body">
		<table class="table table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">STT</th>
					<th class="text-center">Tên người dùng</th>
					<th class="text-center">Họ và tên</th>
					<th class="text-center">Giới tính</th>
					<th class="text-center">Email</th>
					<th class="text-center">Số điện thoại</th>
					<th class="text-center">Địa chỉ</th>
					<th class="text-center">Lựa chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$users = $conn->query("SELECT * FROM users order by uid asc");
					while($row= $users->fetch_assoc()):
				?>
				<tr>
					<td><?php echo $row['uid'] ?></td>
					<td><?php echo $row['username'] ?></td>
					<td><?php echo $row['fullname'] ?></td>
					<td><?php echo $row['gender'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['phone'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td>
						<button class="btn btn-outline-primary btn-sm edit_user" type="button" data-id="<?php echo $row['username'] ?>"><i class="fa fa-edit"></i></button>
						<button class="btn btn-outline-danger btn-sm delete_user" type="button" data-id="<?php echo $row['username'] ?>"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	
$('.edit_user').click(function(){
	uni_modal('Chỉnh sửa thông tin','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_user').click(function(){
		_conf("Bạn có chắc chắn xóa khách hàng này?","delete_user",[$(this).attr('data-id')])
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Dữ liệu đã xóa thành công.",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>