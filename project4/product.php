<?php 
	include 'includes/header-user.php'
	?>
		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="search.php">
					<button type="submit" class="flex-c-m trans-04" name="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	

				
				
				

			<!-- section -->

			<!-- Content page -->
	<section class="bg0 p-t-120 p-b-60 mt-5">
		<div class="container">
			<div class="row">
			<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
						<form action="search.php" method="post">
								<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">
							
								<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04" name="submit">
									<i class="zmdi zmdi-search"></i>
								</button>
							</form>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
			                <li class="bor18">
							
							<button type="submit" name="all-product-btn">
						    <a href="test.php?category=all" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
								All Products
							</a>
						   </button>
							
					        
					
						   
						
			       </li>
				 
				
							<?php 
					            $result = $conn->query("SELECT * FROM categories") or die($conn->error);
					            while ($row = $result->fetch_assoc()) : ?>
								
								<li class="bor18">
								
									<button type="submit" name="submit-product">
									   <a href="product.php?category=<?php echo $row['category_id'] ?>" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									     <?php echo $row['category_name'] ?>
									   </a>
									</button>
								
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				  </div>
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="row d-flex flex-wrap">

					<?php 
					
						$id_category_product = $_GET['category'];
						$result = $conn->query("SELECT * FROM products WHERE category_id='$id_category_product' ") or die($conn->error);
					   while ($row = $result->fetch_assoc()) : ?>
					   <div class="col-sm-6 col-md-3 col-lg-4 p-b-35 isotope-item women"> 
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
								   <a href="product-detail.php?product=<?php echo $row['product_id'] ?>" class="font-weight-bold stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								   <?php echo $row['product_name'] ?>
								   </a>
   
								   
								   <span class="stext-105 cl3"> 
									  
									  <?php if ($row['product_sale_status'] == 1) {  ?>
										<h4 class="font-weight-bold text-danger d-inline"> $<?php echo $row['product_sale_price'] ?>  </h4> 
										<del class="text-secondary"> $<?php echo $row['product_price'] ?> </del>
									<?php  } else { ?>
										<h4> $<?php echo $row['product_price'] ?> </h4>
									 <?php } ?>
									
								   </span>
								   
							   </div>
						   </div> 
						</div>
				      </div> 
				   <?php endwhile;  ?>
				  </div>
				</div>
			</div>
		</div>
	</section>	
			<!-- end section -->
		</div>
	</div>
		

	<?php 
	include 'includes/footer-user.php';
	?>