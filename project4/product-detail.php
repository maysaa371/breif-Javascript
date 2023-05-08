<?php
// session_unset();
include 'includes/header-user.php';
$product_id = $_GET['product'];
$products = $conn->query("SELECT * FROM products WHERE product_id=$product_id") or die($conn->error);
if (isset($_POST['add-btn'])) {
	$comment_content = $_POST['review'];
	$comment_user = $_POST['name'];
	$a = $_SESSION['user'];
	// Return date/time info of a timestamp; then format the output
	$mydate = getdate(date("U"));
	$date = "$mydate[year]-$mydate[mon]-$mydate[mday]";
	$query = "INSERT INTO comments(user_id , product_id, comment_content , comment_date , comment_user )
		                       VALUES ($a,'$product_id' ,'$comment_content' , '$date' , '$comment_user')";
	$admin_query = mysqli_query($conn, $query);
	@header('location:product-detail.php');
}

$comments = $conn->query("SELECT comments.comment_id, comments.comment_content, comments.comment_date,comments.comment_user, 
											                      users.user_name, products.product_id 
									                             FROM comments
									                             INNER JOIN users    ON comments.user_id    = users.user_id
									                             INNER JOIN products ON comments.product_id = products.product_id 
																 WHERE comments.product_id=$product_id") or die($conn->error);
if (isset($_POST['add-to-cart'])) {
	if (isset($_SESSION['cart'])) {
		$item = array_column($_SESSION['cart'], 'id');
		if (in_array($_POST['product_id'], $item)) {
			$_SESSION['cart'][$_POST['product_id']]['num-product'] += $_POST['num-product'];
		} else {
			$all = array(
				"name"         => $_POST['product_name'],
				"price"        => $_POST['product_price'],
				"img"          => $_POST['product_img'],
				"id"           => $_POST['product_id'],
				"num-product"  => $_POST['num-product']
			);
			$_SESSION['cart'][$_POST['product_id']] = $all;
		}
	} else {
		$all = array(
			"price"           => $_POST['product_price'],
			"img"             => $_POST['product_img'],
			"id"              => $_POST['product_id'],
			"num-product"     => $_POST['num-product']
		);
		$_SESSION['cart'][$_POST['product_id']] = $all;
	}
} ?>
<?php

while ($row = $products->fetch_assoc()) : ?>
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg mb-5 mt-5">
				<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>
				<?php
				$categoryID =  $row['category_id'];
				?>
				<a href="product.php?category=<?php echo $categoryID ?>" class="stext-109 cl8 hov-cl1 trans-04">
					<?php
					$result = $conn->query("SELECT * FROM categories WHERE category_id=$categoryID") or die($conn->error);
					$row2 = $result->fetch_assoc();
					echo $row2['category_name'];
					?>
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>
				<span class="stext-109 cl4">
					<?php echo $row['product_name'] ?>
				</span>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots "></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w "></div>
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="./group-project4/uploads/<?php echo $row['product_main_img'] ?>">
									<div class="wrap-pic-w pos-relative w-75">
										<img src="./group-project4/uploads/<?php echo $row['product_main_img'] ?>" alt="IMG-PRODUCT">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="./group-project4/uploads/<?php echo $row['product_main_img'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<div class="item-slick3" data-thumb="./group-project4/uploads/<?php echo $row['product_sub1_img'] ?>">
									<div class="wrap-pic-w pos-relative w-75">
										<img src="./group-project4/uploads/<?php echo $row['product_sub1_img'] ?>" alt="IMG-PRODUCT">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="./group-project4/uploads/<?php echo $row['product_sub1_img'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<div class="item-slick3" data-thumb="./group-project4/uploads/<?php echo $row['product_sub2_img'] ?>">
									<div class="wrap-pic-w pos-relative w-75">
										<img src="./group-project4/uploads/<?php echo $row['product_sub2_img'] ?>" alt="IMG-PRODUCT">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="./group-project4/uploads/<?php echo $row['product_sub2_img'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End product detail -->
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14 font-weight-bold">
							<?php echo $row['product_name'] ?>
						</h4>

						<span class="mtext-106 cl2">
							<?php if ($row['product_sale_status'] == 1) {  ?>
								<h4 class="text-danger"> $<?php echo $row['product_sale_price'] ?> </h4>
								<del class="text-secondary"> $<?php echo $row['product_price'] ?> </del>
							<?php  } else { ?>
								<h4 class="font-weight-bold"> $<?php echo $row['product_price'] ?> </h4>
							<?php } ?>
						</span>
						<p class="stext-102 cl3 p-t-23 w-100">
							<?php echo $row['product_description'] ?>
						</p>
						<form method="post">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>
										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
									<input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
									<input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>">
									<input type="hidden" name="product_img" value="<?php echo $row['product_main_img'] ?>">
									<button name="add-to-cart" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
						</form>
					</div>
				</div>
			</div>

			<!-- comment  -->
			<div class="flex-w flex-m p-l-100 p-t-40 respon7">

			</div>
		</div>
		</div>
		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
					</li>
					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content p-t-43">
					<div class="tab-pane fade show active" id="description" role="tabpanel">
						<div class="how-pos2 p-lr-15-md">
							<p class="stext-102 cl6">
								Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
							</p>
						</div>
					</div>
					<div class="tab-pane fade" id="reviews" role="tabpanel">
						<div class="row">
							<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
								<div class="p-b-30 m-lr-15-sm scroll">
									<!-- Review -->
									<div class="flex-w flex-t p-b-68">
										<form class="w-full" method="POST">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>
											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

											</div>
											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>
												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>
											</div>
											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="add-btn">
												Submit
											</button>
										</form>

										<?php

										while ($row = $comments->fetch_assoc()) :
										?>
											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?php echo @$row['comment_user'] ?>
													</span>

												</div>
												<p class="stext-102 cl6">
													<?php echo @$row['comment_content'];
													?>
												</p>
											</div>
									</div>
								<?php
										endwhile;
								?>
								<!-- Add review -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	<?php endwhile; ?>
	</div>
	</section>

	<?php


	include 'includes/footer-user.php';
	?>