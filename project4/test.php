<?php 
	include 'includes/header-user.php'
	?>
		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
			<!-- section -->

			<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60 mt-5">
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

					  <!-- start products -->
				   <?php 
				   if (isset($_GET['category'])) {
					  
				   
						$result = $conn->query("SELECT * FROM products ") or die($conn->error);
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
								   <a href="product-detail.php?product=<?php echo $row['product_id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								   <?php echo $row['product_name'] ?>
								   </a>
   
								   
								   <span class="stext-105 cl3"> 
									  
									  <?php if ($row['product_sale_status'] == 1) {  ?>
										<h4 class="d-inline"> $<?php echo $row['product_sale_price'] ?>  </h4> 
										<del style="color:red"> $<?php echo $row['product_price'] ?> </del>
									<?php  } else { ?>
										<h4> $<?php echo $row['product_price'] ?> </h4>
									 <?php } ?>
									
								   </span>
								   
							   </div>
						   </div> 
						</div>
				      </div> 
				   <?php endwhile; } ?>	

				   <!-- products -->

	
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


