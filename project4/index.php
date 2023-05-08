<?php 
include './includes/header-user.php';
?>

<!-- Slider -->
<section class="section-slide">
<?php	print_r($_SESSION['user']); ?>
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url('img/background/os.jpg');">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									 Collection 2022
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                 Start Shopping
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="test.php?category=all" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url('img/jess-bailey-l3N9Q27zULw-unsplash.jpg');">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
                                Collection 2022
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Enjoy your shopping
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="test.php?category=all" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url('img/back3.jpg');">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
                                
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="test.php?category=all" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Banner -->
<?php 
	$result = $conn->query("SELECT * FROM categories") or die($conn->error);
	 ?>
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="img/Capturegggg-removebg-preview.png" alt="IMG-BANNER" style="width:200px">

						<a href="product.php?category=19" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8" style="padding-left: 180px">
									Note Books
								</span>

								<span class="block1-info stext-102 trans-04" style="padding-left: 180px">
									Collection 2022
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="img/Capture1-removebg-preview.png" alt="IMG-BANNER" style="width:200px">

						<a href="product.php?category=18" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8" style="padding-left: 180px">
									Pens
								</span>

								<span class="block1-info stext-102 trans-04" style="padding-left: 180px">
								Collection 2022
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="img/Capture-removebg-preview.png" alt="IMG-BANNER"  style="width:200px">

						<a href="product.php?category=20" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8" style="padding-left: 180px">
									Bags
								</span>

								<span class="block1-info stext-102 trans-04" style="padding-left: 180px">
								Collection 2022
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5 m-5">
					Product on Sale!
				</h3>
			</div>

			

	  <!-- End section -->

	  <div class="col-md-8 col-lg-12 p-b-80">
					<div class="row d-flex flex-wrap">
			         <?php 
					 $result = $conn->query("SELECT * FROM products WHERE product_sale_status= 1 ") or die($conn->error);
					while ($row = $result->fetch_assoc()) : ?>
					
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women d-flex"> 
					<!-- Block2 -->
					 <div class="block2"> 
						<div class="block2-pic hov-img0">
							<img src="./group-project4/uploads/<?php echo $row['product_main_img'] ?>" alt="IMG-PRODUCT">

							<a href="product-detail.php?product=<?php echo $row['product_id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
							  View
							</a>
						</div>

						 <div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?product=<?php echo $row['product_id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $row['product_name'] ?>
								</a>

								<span class="stext-105 cl3">
								   <h4 class="d-inline text-danger font-weight-bold"> $<?php echo $row['product_sale_price'] ?> </h4> 
								   <del>$<?php echo $row['product_price'] ?> </del>
								</span>
								
							</div>
						</div> 
					 </div>
				    </div> 
				
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php 
include './includes/footer-user.php';
?>