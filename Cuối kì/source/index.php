<?php 
	session_start();
	require "head.php";
	require "common/navbar.php";
	require "connect.php";
?>

<section class="relative banner-area">
	<div class="overlay overlay-bg"></div>				
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-between">
			<div class="col-lg-6 col-md-6 banner-left">
				<h6 class="text-white">Rời xa cuộc sống đơn điệu</h6>
				<h1 class="text-white animated slideInDown">Du lịch kỳ diệu</h1>
				<p class="text-white">Cùng GOLD DRAGON đến với những nơi tuyệt vời tại Việt Nam</p>
				<a href="#" class="primary-btn text-uppercase">Bắt đầu</a>
			</div>
			<div class="col-lg-4 col-md-6 banner-right">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item"><a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true" > Tìm chuyến bay <i class="fa fa-plane"></i></a></li>			
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
						<form action="check-flight.php" method="post" class="form-wrap">
							<div class="mb-2">
								<input type="radio" name="type" value="khứ hồi" <?php echo isset($type) && $type == "khứ hồi" ? "checked" : "" ?> onclick="showDIV()"> Khứ hồi  
								<input type="radio" name="type" value="một chiều" <?php echo isset($type) && $type == "một chiều" ? "checked" : "" ?> onclick="hideDIV()" > Một chiều		
							</div>
							<div class="travel-select-icon">
								<select name="origin" id="origin" class="selectpicker form-control" data-size="5" title="Select Origin" name="origin" required>
								<?php 
									$result = $conn->query("SELECT * FROM airport order by id asc");
									while($row = $result->fetch_assoc()):
								?>
								<option value="<?php echo $row['id']?>"><?php echo isset($origin) && $origin == $row['id'] ? "selected" : '' ?><?php echo "(".$row['code'].") ".$row['airport']?></option>
								<?php endwhile; ?>
    							</select>	
							</div>
							<div class="travel-select-icon">
								<select id= "destination" data-live-search="true" class="selectpicker form-control" data-size="5" title="Select Destination" name="destination" required>
								<?php 
									$result = $conn->query("SELECT * FROM airport order by id asc");
									while($row = $result->fetch_assoc()):
								?>
								<option value="<?php echo $row['id']?>"><?php echo isset($destination) && $destination == $row['id'] ? "selected" : '' ?><?php echo "(".$row['code'].") ".$row['airport']?></option>
								<?php endwhile; ?>
      							</select>
							</div>
							<div class="travel-select-icon">
                                <input type="date" class="form-control input-sm datetimepicker2" name="departure_datetime" autocomplete="off" value="<?php echo isset($departure_datetime) && !empty($departure_datetime) ? date("Y-m-d",strtotime($departure_datetime)) : "" ?>">
							</div>
							<div class="travel-select-icon" id="return">
                                <input type="date" class="form-control input-sm datetimepicker2" name="arrival_datetime" autocomplete="off" value="<?php echo isset($arrival_datetime) && !empty($arrival_datetime) ? date("Y-m-d",strtotime($arrival_datetime)) : "" ?>">
							</div>
							<div class="mb-4 form-group d-sm-flex margin text-light">
								<input type="number" min="1" max="20" class="form-control" name="guests" placeholder="Số hành khách " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số hành khách'">
							</div>
							<button type="submit" name="search" class="primary-btn">Tìm kiếm</button>		
						</form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>					
</section>

<!-- Start Why choose we -->
<section class="price-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
		    <div class="menu-content pb-70 col-lg-8">
		        <div class="title text-center">
		            <h1 class="mb-10">Tại sao nên chọn chúng tôi?</h1>
		            <p></p>
		        </div>
	        </div>
		</div>						
		<div class="row">
			<div class="col-lg-4">
				<div class="single-price">
					<ul>
						<li>
							<h4>Hỗ trợ 24/7</h4>
							<p>GOLD DRAGON luôn săn sàng tư vấn và giải đáp thắc mắc của Khách hàng 24/7</p>
						</li>
					<ul>					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-price">
					<ul>
						<li>
							<h4>Giá vé tốt nhất</h4>
							<p> Đảm bảo giá vé máy bay tốt nhất cho nhu cầu đặt mua vé máy bay theo các chặng khác nhau của Khách hàng</p>
						</li>					
					<ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-price">
					<ul>
						<li>
							<h4>Dịch vụ đa dạng</h4>
							<p>Ngoài dịch vụ vé máy bay chung tôi còn có dịch vụ thuê xe và khách sạn phục vụ Khách hàng.</p>
						</li>
					<ul>
				</div>
			</div>												
		</div>				
	</div>	
</section>
		
<!-- Start blog Area -->
<section class="recent-blog-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-9">
				<div class="title text-center">
					<h1 class="mb-10">Những điểm đến nổi tiếng</h1>
					<p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.</p>
				</div>
			</div>
		</div>							
		<div class="row">
			<div class="active-recent-blog-carusel">
				<div class="single-recent-blog-post item">
					<div class="thumb"><img class="img-fluid" src="img/hanoi1.jpg" alt="" ></div>
					<div class="details">
						<div class="tags">
							<ul>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Life Style</a></li>											
							</ul>
						</div>
						<a href="#"><h4 class="title">Hà Nội</h4></a>
						<p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.</p>
						<div class="packages-review special-offer-review">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span>2998 review</span>
							</p>
							<p class="bottom-area d-flex">
								<span><i class="icon-map-o"></i> San Franciso, CA</span> 
								<span class="ml-auto"><a href="#">Discover</a></span>
							</p>
						</div>
					</div>	
				</div>
				<div class="single-recent-blog-post item">
					<div class="thumb"><img class="img-fluid" src="img/danang.jpg" alt=""></div>
					<div class="details">
						<div class="tags">
							<ul>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Life Style</a></li>											
							</ul>
						</div>
						<a href="#"><h4 class="title">Hà Nội</h4></a>
						<p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.</p>
						<div class="packages-review special-offer-review">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span>2998 review</span>
							</p>
							<p class="bottom-area d-flex">
								<span><i class="icon-map-o"></i> San Franciso, CA</span> 
								<span class="ml-auto"><a href="#">Discover</a></span>
							</p>
						</div>
					</div>	
				</div>
				<div class="single-recent-blog-post item">
					<div class="thumb"><img class="img-fluid" src="img/cantho.jpeg" alt=""></div>
						<div class="details">
						<div class="tags">
							<ul>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Life Style</a></li>											
							</ul>
						</div>
						<a href="#"><h4 class="title">Hà Nội</h4></a>
						<p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.</p>
						<div class="packages-review special-offer-review">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span>2998 review</span>
							</p>
							<p class="bottom-area d-flex">
								<span><i class="icon-map-o"></i> San Franciso, CA</span> 
								<span class="ml-auto"><a href="#">Discover</a></span>
							</p>
						</div>
					</div>		
				</div>	
				<div class="single-recent-blog-post item">
					<div class="thumb"><img class="img-fluid" src="img/nhatrang.jpeg" alt="">\</div>
						<div class="details">
						<div class="tags">
							<ul>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Life Style</a></li>											
							</ul>
						</div>
						<a href="#"><h4 class="title">Hà Nội</h4></a>
						<p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.</p>
						<div class="packages-review special-offer-review">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span>2998 review</span>
							</p>
							<p class="bottom-area d-flex">
								<span><i class="icon-map-o"></i> San Franciso, CA</span> 
								<span class="ml-auto"><a href="#">Discover</a></span>
							</p>
						</div>
					</div>	
				</div>
				<div class="single-recent-blog-post item">
					<div class="thumb"><img class="img-fluid" src="img/phuquoc1.jpg" alt=""></div>
					<div class="details">
						<div class="tags">
							<ul>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Life Style</a></li>											
							</ul>
						</div>
						<a href="#"><h4 class="title">Hà Nội</h4></a>
						<p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.</p>
						<div class="packages-review special-offer-review">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span>2998 review</span>
							</p>
							<p class="bottom-area d-flex">
								<span><i class="icon-map-o"></i> San Franciso, CA</span> 
								<span class="ml-auto"><a href="#">Discover</a></span>
							</p>
						</div>
					</div>	
				</div>														
			</div>
		</div>
	</div>	
</section>

<!-- Start testimonial Area -->
		    <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Đánh giá từ khách hàng</h1>
		                        <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Tôi đã có những trải nghiệm tuyệt vời trên chuyến bay này. Nhân viên phục vụ tận tình và chu đáo.
		                            </p>
		                            <h4>Minh An</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Chuyến bay của tôi bị delay 1 giờ, tôi không hài lòng nhưng bên hãng bay đã xin lỗi và tặng thêm hành lý cho khách hàng.
		                            </p>
		                            <h4>Huy Nguyễn</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Woa... tôi rất hài lòng về cách làm việc của hãng bay. Mọi thứ đều perfect!
		                            </p>
		                            <h4>Ngọc Giàu Nguyễn</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Thủ tục nhanh gọn, giá cả phải chăng. Tôi rất thích!!!
		                            </p>
		                            <h4>Kim Nguyễn</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>			
									</div>	
		                        </div>
		                    </div>
		                  
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Dịch vụ và đồ ăn trên chuyến bay làm tôi khá hài lòng. 
		                            </p>
		                            <h4>Văn Hòa Trần</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>		                    		                    
		                </div>
		            </div>
		        </div>
		    </section>
<!-- End testimonial Area -->

				

<!-- footer  -->		
<?php require "common/footer.php"?>


<script>
    function showDIV(){
        document.getElementById('return').style.display="block";
    }
    function hideDIV(){
        document.getElementById('return').style.display="none";
    }
</script>

</body>
</html>