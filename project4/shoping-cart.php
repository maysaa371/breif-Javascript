<?php
include 'includes/header-user.php';
//include 'group-project4/includes/process.php';
if (isset($_GET['delete-cart'])) {
	unset($_SESSION['cart']);
}
?>
<?php

if (isset($_SESSION['cart'])) { ?>

	<form class="bg0 p-t-150 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-5"></th>
								</tr>
								<?php
								if (!empty($_SESSION['cart'])) {

									foreach ($_SESSION['cart'] as $key => $value) {

								?>
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="./group-project4/uploads/<?php echo @$value['img'] ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2 font-weight-bold"><?php echo @$value['name'];
																					?></td>
											<td class="column-3 font-weight-bold text-danger">$<?php echo @$value['price']; ?></td>
											<td class="column-4 font-weight-bold text-danger">
												<b><?php echo $value['num-product'] ?></b>
											</td>
											<!-- cal to price -->
											<td class="column-5 font-weight-bold">$<?php echo @$value['price'] * @$value['num-product']  ?></td>
											<!-- end cal to price -->

											<td class="column-5">
												<a href="group-project4/includes/process.php?cart_product=<?php echo $value['id'] ?>" class="item  text-white bg-danger rounded p-1" data-toggle="tooltip" data-placement="top" name="Delete">
													delete
												</a>
											</td>
										</tr>

										<?php @$total += $value['price'] * $value['num-product']; ?>
								<?php }
								} ?>
							</table>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
							</div>
							<form method="get">
								<button name="delete-cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									Delete Cart
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals

						</h4>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2 font-weight-bold">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2 text-danger font-weight-bold">
									<?php echo "$" . @$total; ?>
								</span>
							</div>
						</div>

						<form method="post" action="./group-project4/includes/process.php">
							<button name="Proceed-to-Checkout" type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Proceed to Checkout
							</button>
						</form>
						<div class="flex-c-m stext-101 cl2 size-116 b ">
							" CASH ON DELEVRY "
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php } else if ( isset($_SESSION['ordered']) && ($_SESSION['ordered']['status'] == 1)) {  ?>
	<div style="margin-bottom:200px" class="d-flex justify-content-center"> </div>
	<h1 class="d-flex justify-content-center"> Thank you for your order!</h1>
	<h3 class="d-flex justify-content-center text-center m-t-50"> we received your order and we are working on it now.<br> Your order id is <?php echo $_SESSION['ordered']['order_id']?> </h3>
	<h1 class="d-flex justify-content-center pt-5"><i class="fas fa-shopping-cart"></i></h1>
	<div style="margin-bottom:400px" class="d-flex justify-content-center"> </div>
	
<?php 
unset($_SESSION['ordered']);
} else { ?>
	<div style="margin-bottom:200px" class="d-flex justify-content-center"> </div>
	<h2 class="d-flex justify-content-center"> There isn't any item in your cart!</h2>
	<h1 class="d-flex justify-content-center pt-5"><i class="fas fa-shopping-cart"></i></h1>
	<div style="margin-bottom:400px" class="d-flex justify-content-center"> </div>
	

<?php } ?>




<?php
include 'includes/footer-user.php';

?>