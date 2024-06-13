<?php include '../connect.php' ?>
<?php 

if(isset($_GET['flight_id'])){
	$qry = $conn->query("SELECT * FROM flights where flight_id=".$_GET['flight_id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-flight">
			<input type="hidden" name="flight_id" value="<?php echo isset($_GET['flight_id']) ? $_GET['flight_id'] : '' ?>">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="">Mã chuyến bay</label>
						<textarea name="code" id="" cols="30" rows="2" class="form-control"><?php echo isset($code) ? $code : '' ?></textarea>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Điểm khởi hành</label>
						<select name="origin" id="origin" class="custom-select browser-default select2">
							<option value=""></option>
							<?php 
								$result = $conn->query("SELECT * FROM airport order by id asc");
								while($row = $result->fetch_assoc()):
							?>
								<option value="<?php echo $row['id'] ?>" <?php echo isset($origin) && $origin == $row['id'] ? "selected" : '' ?>><?php echo $row['airport']." (".$row['code'].")"?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Điểm đến</label>
						<select name="destination" id="destination" class="custom-select browser-default select2">
						<option value=""></option>
						<?php 
							$result = $conn->query("SELECT * FROM airport order by id asc");
							while($row = $result->fetch_assoc()):
							?>
								<option value="<?php echo $row['id'] ?>" <?php echo isset($destination) && $destination == $row['id'] ? "selected" : '' ?>><?php echo $row['airport']." (".$row['code'].")" ?></option>
							<?php endwhile; ?>
						</select>

					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Ngày đi</label>
						<input type="text" name="departure_datetime" id="departure_datetime" class="form-control datetimepicker" value="<?php echo isset($departure_datetime) ? date("Y-m-d H:i",strtotime($departure_datetime)) : '' ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Ngày đến</label>
						<input type="text" name="arrival_datetime" id="arrival_datetime" class="form-control datetimepicker" value="<?php echo isset($arrival_datetime) ? date("Y-m-d H:i",strtotime($arrival_datetime)) : '' ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="">
						<label for="">Ghế</label>
						<input name="seats" id="seats" type="number" step="any" class="form-control text-right" value="<?php echo isset($seats) ? $seats : '' ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Giá</label>
						<input name="price" id="price" type="number" step="any" class="form-control text-right" value="<?php echo isset($price) ? $price : '' ?>">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.select2').each(function(){
		$(this).select2({
		    placeholder:"Vui lòng lựa chọn",
		    width: "100%"
		  })
	})
	})
	 $('.datetimepicker').datetimepicker({
      format:'Y-m-d H:i',
  })
	 $('#manage-flight').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_flight',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Đã thêm chuyến bay thành công.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	 })
	 $('.datetimepicker').attr('autocomplete','off')
</script>