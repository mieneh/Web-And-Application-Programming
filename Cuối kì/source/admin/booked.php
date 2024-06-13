<?php include '../connect.php' ?>
<div class="container-fluid">
	<div class="row"><div class="col-lg-12"></div></div>
	<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<large class="card-title"><b>Danh sách đơn hàng</b></large>
				</div>
				<div class="card-body">		
					<table class="table table-bordered">	
						<thead>
							<tr>
					<th class="text-center">STT</th>
					<th class="text-center">Thông tin khách hàng</th>
					<th class="text-center">Thông tin chuyến bay</th>
					<th class="text-center">Lựa chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$airport = $conn->query("SELECT * FROM airport ");
					while($row = $airport->fetch_assoc()){
						$aname[$row['id']] = ucwords($row['airport']." (".$row['code'].")");
					}
					$sql = "SELECT * FROM booking, flights WHERE booking.flight_id = flights.flight_id";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td><?php echo $row['id'] ?></td>
							<td>
								<p>Họ và tên: <b><?php echo $row['fullname'] ?></b></p>
								<p><small>Giới tính: <b><?php echo $row['gender'] ?></small></b></p>
								<p><small>SĐT: <b><?php echo $row['phone'] ?></small></b></p>
								<p><small>Email: <b><?php echo $row['email'] ?></small></b></p>
								<p><small>Địa chỉ: <b><?php echo $row['address'] ?></small></b></p>
							</td>
							<td>
								<p>Mã chuyến bay: <b><?php echo $row['code'] ?></b></p>
								<p><small>Điểm khởi hành: <b><?php echo $aname[$row['origin']]?></small></b></p>
								<p><small>Thời gian khởi hành: <b><?php echo date('h:i A', strtotime($row['departure_datetime'])) ?></small></b></p>
								<p><small>Điểm đến: <b><?php echo $aname[$row['destination']] ?></small></b></p>
								<p><small>Thời gian đến: <b><?php echo date('h:i A', strtotime($row['arrival_datetime'])) ?></small></b></p>
							</td>
							<td class="text-center">
								<button class="btn btn-outline-primary btn-sm edit_booked" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
								<button class="btn btn-outline-danger btn-sm delete_booked" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td {
		vertical-align: middle !important;
	}
</style>	
<script>
	$('.edit_booked').click(function(){
		uni_modal("Chỉnh sửa thông tin","manage_booked.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_booked').click(function(){
		_conf("Bạn có chắc chắn xóa đơn hàng này?","delete_booked",[$(this).attr('data-id')])
	})
	
	function delete_booked($id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_booked',
				method:'POST',
				data:{id:$id},
				success:function(resp){
					if(resp==1){
						alert_toast("Dữ liệu đã xóa thành công",'success')
						setTimeout(function(){
							location.reload()
						},1500)

					}
				}
			})
		}
</script>