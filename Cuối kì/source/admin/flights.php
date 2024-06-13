<?php include '../connect.php' ?>
<div class="container-fluid">
	<div class="row"><div class="col-lg-12"></div></div>
	<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<large class="card-title"><b>Danh sách chuyến bay</b></large>
					<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_flight"><i class="fa fa-plus"></i> Add</button>
				</div>
				<div class="card-body">		
					<table class="table table-bordered">	
						<thead>
							<tr>
								<th class="text-center">Ngày</th>
								<th class="text-center">Thông tin</th>
								<th class="text-center">Chỗ ngồi</th>
								<th class="text-center">Đã đặt</th>
								<th class="text-center">Còn trống</th>
								<th class="text-center">Giá</th>
								<th class="text-center">Lựa chọn</th>
							</tr>
						</thead>
						<tbody>
							<tr> 
								<?php
									$airport = $conn->query("SELECT * FROM airport");
									while($row = $airport->fetch_assoc()){
										$aname[$row['id']] = ucwords($row['airport']);
									}
									$sql = $conn->query("SELECT * FROM flights ORDER BY departure_datetime");
									while($row = $sql->fetch_assoc()) {
										$booked = $conn->query("SELECT * FROM booking WHERE flight_id = ".$row['flight_id'])->num_rows;
								?>
								<td><?php echo date('d/m', strtotime($row['departure_datetime']))?></td>
								<td>
									<p>Mã chuyến bay: <b><?php echo $row['code'] ?></b></p>
									<p><small>Điểm khởi hành: <b><?php echo $aname[$row['origin']]?></small></b></p>
									<p><small>Thời gian khởi hành: <b><?php echo date('h:i A', strtotime($row['departure_datetime'])) ?></small></b></p>
									<p><small>Điểm đến: <b><?php echo $aname[$row['destination']] ?></small></b></p>
									<p><small>Thời gian đến: <b><?php echo date('h:i A', strtotime($row['arrival_datetime'])) ?></small></b></p>
								</td>
								<td class="text-right"><?php echo $row['seats'] ?></td>
								<td class="text-right"><?php echo $booked ?></td>
								<td class="text-right"><?php echo $row['seats'] - $booked?></td>
								<td class="text-right"><?php echo number_format($row['price']) ?></td>
								<td class="text-center">
									<button class="btn btn-outline-primary btn-sm edit_flight" type="button" data-id="<?php echo $row['flight_id'] ?>"><i class="fa fa-edit"></i></button>
									<button class="btn btn-outline-danger btn-sm delete_flight" type="button" data-id="<?php echo $row['flight_id'] ?>"><i class="fa fa-trash"></i></button>
								</td>
							<tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
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
	$('#new_flight').click(function(){
		uni_modal("Thêm chuyến bay mới","manage_flight.php",'mid-large')
	})
	$('.edit_flight').click(function(){
		uni_modal("Chỉnh sửa chuyến bay","manage_flight.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_flight').click(function(){
		_conf("Bạn có chắc xóa chuyến bay này không?","delete_flight",[$(this).attr('data-id')])
	})

	function delete_flight($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_flight',
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