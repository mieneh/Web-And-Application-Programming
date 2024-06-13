<?php 
    session_start();
    require "head.php";
    include("common/navbar.php"); 
    require "connect.php";
    if(isset($_POST['search'])) {
        $type = $_POST["type"];
		$origin = $_POST["origin"];
		$destination = $_POST["destination"];
		$departure_datetime = $_POST["departure_datetime"];
		$arrival_datetime = $_POST["arrival_datetime"];
        $airport = $conn->query("SELECT * FROM airport");
		while($row = $airport->fetch_assoc()){
			$name[$row['id']] = ucwords($row['airport']);
            $code[$row['id']] = ucwords($row['code']);
		}
?>
<head>
  	<title>Tìm kiếm chuyến bay | Gold Dragon</title>
	<link href="css/styleFindTicket.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<section class="relative about-banner" style="background-image: url(img/rung.jpg)">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12"></div>	
		</div>
	</div>
</section>

<section class="searchFlights" id="flight" >
    <hr>
    <div class="row">
		<div class="col-md-12 text-center">
            <h2><b><?php echo isset($type) && $type == "khứ hồi" ? "Kết quả tìm kiếm chuyến bay ngày đi..." : ( !isset($type)? " Chuyến bay khả dụng " :"Kết quả của chuyến bay bạn đã tìm kiếm...")  ?></b></h2>
        </div>
	</div>
    <hr class="divider">
    <?php
		$where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
		if($_SERVER['REQUEST_METHOD'] == "POST" )
		$where .= " and f.origin ='$origin' and f.destination = '$destination' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($departure_datetime))."'  ";
		$flight = $conn->query("SELECT f.* FROM flights f $where order by rand()");
		if($flight->num_rows > 0):
		    while($row=$flight->fetch_assoc()):
				$booked = $conn->query("SELECT * FROM booking WHERE flight_id = ".$row['flight_id'])->num_rows;
                ?>
                <div class="listItemMenuContainer">
                    <div class="col-sm-2 text-center"><div class="headings">Chuyến bay</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Khởi hành</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Đến</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Giá</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Số lượng ghế</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Còn trống</div></div>
                    </div> 
                </div>
                <div class="spacerLarge">.</div>
                <div class="searchFlights">        
                    <div class="listItem">
                        <form action="booking.php" method="POST">
                            <div class="col-sm-2 text-center">
                                <div class="values flightOperator text-center">
                                <?php echo $row['code'] ?></div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values departs"><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></div>
                                <div class="departsSubscript"><?php echo $code[$row['origin']]?></div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values arrives"><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('h:i A',strtotime($row['arrival_datetime'])) ?></div>
                                <div class="arrivesSubscript"><?php echo $code[$row['destination']] ?></div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values fare"><?php echo number_format($row['price'],0)?></div>
                                <div class="fareSubscript">đã bao gồm phí dịch vụ</div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values type"><?php echo $row['seats']?></div>
                                <div class="typeSubscript">đã có <?php echo $booked ?> ghế đã đặt</div>
                            </div>
                            <?php if($row['seats'] - $booked >= (int)$_POST["type"]): ?>
                            <div class="col-sm-2 text-center" style="border-right: none;"> 
                                <div class="values availabilityGreen"><?php echo $row['seats'] - $booked?></div>                        
                                <div class="availabilitySubscript"><input type="submit" class="availabilityBookingButton" value="Đặt vé ngay"></div>
                            </div>
                            <?php else:  ?>
                            <div class="col-sm-2 text-center" style="border-right: none;">
                                <div class="values availabilityRed">Không có sẵn</div>
                                <div class="unavailabilitySubscript">Hết chỗ</div>
                            </div>		
                            <?php endif;?>
                        </form>
                    </div>
                    <hr class="divider" style="max-width: 60vw">
            <?php endwhile; ?>
        <?php else: ?>
        <div class="searchFlights">
            <div class="noFlights">Không tìm thấy vé nào phù hợp.</div>
        </div>
        <?php endif; ?>
					
    <!-- khứ hồi -->
	<?php if(isset($type) && $type =="khứ hồi"): ?>
	<hr>
		<div class="row">
			<div class="col-md-12 text-center">
				<h2><b><?php echo isset($type) && $type == "khứ hồi" ? "Kết quả tìm kiếm chuyến bay ngày về..." : ( !isset($type)? " Chuyến bay khả dụng  " :"Kết quả của chuyến bay bạn đã tìm kiếm...")  ?></b></h2>
			</div>
	</div>
	<hr class="divider">
	<?php 
		$where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
		if($_SERVER['REQUEST_METHOD'] == "POST" )
		$where .= " and f.origin ='$destination' and f.destination = '$origin' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($departure_datetime))."'  ";				
		$flight = $conn->query("SELECT f.* FROM flights f $where order by rand()");
		if($flight->num_rows > 0):
    		while($row=$flight->fetch_assoc()):
				$booked = $conn->query("SELECT * FROM booking where flight_id = ".$row['flight_id'])->num_rows;
                ?>
                <div class="listItemMenuContainer">
                    <div class="col-sm-2 text-center"><div class="headings">Chuyến bay</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Khởi hành</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Đến</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Giá</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Số lượng ghế</div></div>
                        <div class="col-sm-2 text-center"><div class="headings">Còn trống</div></div>
                    </div> 
                </div>
                <div class="spacerLarge">.</div>
                <div class="searchFlights">        
                    <div class="listItem">
                        <form action="booking.php" method="POST">
                            <div class="col-sm-2 text-center">
                                <div class="values flightOperator text-center">
                                <?php echo $row['code'] ?></div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values departs"><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></div>
                                <div class="departsSubscript"><?php echo $code[$row['origin']]?></div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values arrives"><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('h:i A',strtotime($row['arrival_datetime'])) ?></div>
                                <div class="arrivesSubscript"><?php echo $code[$row['destination']] ?></div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values fare"><?php echo number_format($row['price'],0)?></div>
                                <div class="fareSubscript">đã bao gồm phí dịch vụ</div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <div class="values type"><?php echo $row['seats']?></div>
                                <div class="typeSubscript">đã có <?php echo $booked ?> ghế đã đặt</div>
                            </div>
                            <?php if($row['seats'] - $booked >= (int)$_POST["type"]): ?>
                            <div class="col-sm-2 text-center" style="border-right: none;"> 
                                <div class="values availabilityGreen"><?php echo $row['seats'] - $booked?></div>                        
                                <div class="availabilitySubscript"><input type="submit" class="availabilityBookingButton" value="Đặt vé ngay"></div>
                            </div>
                            <?php else:  ?>
                            <div class="col-sm-2 text-center" style="border-right: none;">
                                <div class="values availabilityRed">Không có sẵn</div>
                                <div class="unavailabilitySubscript">Hết chỗ</div>
                            </div>		
                            <?php endif;?>
                        </form>
                    </div>
                </div>
                <hr class="divider" style="max-width: 60vw">
            <?php endwhile; ?>
        <?php else: ?>
        <div class="searchFlights">
            <div class="noFlights">Không tìm thấy vé nào phù hợp.</div>
        </div>
        <?php endif; ?>
    <?php endif; 
    }?> 
</section>
<script>
    $('[name="type"]').on("keypress change keyup",function() {
        if($(this).val() == 1) {
            $('#rdate').hide()
        } else {
            $('#rdate').show()
        }
    })
</script>
<?php include("common/footer.php"); ?>				
</html>